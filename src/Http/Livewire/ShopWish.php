<?php
namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * 관심상품 목록
 */
class ShopWish extends Component
{
    public $wishes;
    public $viewFile;
    public $viewCell;

    public $user_email;

    public $rows = [];

    public function mount()
    {
        // 회원 이메일 확인
        if($user = Auth::user()) {
            $this->user_email = $user->email;
        }

        if(!$this->viewFile){
            $this->viewFile = 'jiny-shop-order::cartzilla.wishlist.wish-items';
        }

        if(!$this->viewCell){
            $this->viewCell = 'jiny-shop-order::cartzilla.wishlist.cell';
        }
    }

    public function render()
    {
        // 사용자 wish 목록 조회
        $rows = $this->getUserWish();

        $this->loadRatings();

        return view($this->viewFile, [
            //'wishes' => $this->wishes,
            //'rows' => $this->rows
        ]);
    }

    public function getUserWish()
    {
        //$email = 'aaa'; // 이메일이 'aaa'인 사용자의 위시리스트 불러옴
        if($this->user_email) {
            $rows = DB::table('shop_wish')
            ->where('email', $this->user_email)
            ->get();

            // 배열 변환
            foreach ($rows as $item) {
                $temp = [];
                $id = $item->id;
                foreach ($item as $key => $value) {
                    $temp[$key] = $value;
                }

                $temp['average_rating'] = 0; // 초기화
                $this->rows[$id] = $temp;

            }

            // return $rows;
        }

        // 비회원인 경우, wish 기능 사용할 수 없음
        // 빈 배열 반환
        //return [];
    }

    public function loadRatings()
    {
        $ids = [];
        foreach($this->rows as $item) {
            $ids []= $item['id'];
        }

        // 평균 리뷰 점수 계산
        $rating = DB::table('reviews')
            ->select('order_item_id', DB::raw('AVG(rating) as average_rating'))
            ->whereIn('order_item_id', $ids)
            ->groupBy('order_item_id')
            ->get();

        //dump($rating);
        foreach($rating as $review) {
            $id = $review->order_item_id;
            // 소수점 반올림
            $this->rows[$id]['average_rating'] = round($review->average_rating);
        }

        //dd($this->rows);

        /*
        // 상품 데이터 가져오기
        // $products = DB::table('shop_wish')->get();
        $rows = [];

        // 각 상품에 대한 리뷰 평균 점수 계산
        foreach ($products as $product) {
            $temp = [];
            foreach ($product as $key => $value) {
                $temp[$key] = $value;
            }

            // 평균 리뷰 점수 계산
            $averageRating = DB::table('reviews')
                ->where('order_item_id', $product->id)
                ->avg('rating');

            // 평균 리뷰 점수를 temp 배열에 추가
            $temp['average_rating'] = $averageRating ?? 0; // Null 일 경우 0으로 설정

            // rows 배열에 추가
            $rows[] = $temp;
        }

        $this->rows = $rows;
        */
    }



}
