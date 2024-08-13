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

    // public $user_email = 'aaa';
    public $user_email;

    public $rows = [];
    public $selected = [];

    // 카트 주문정보
    public $cartidx;

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

        $this->checkExistingCart();
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
            $this->rows = []; // 초기화
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

    public function removeItems()
    {
        //dd($this->selected);
        DB::table('shop_wish')
            ->whereIn('id', $this->selected)
            ->delete();
    }

    public function reload()
    {
        // 화면 갱신용
        // 작업 내용 없음.
    }

    // public function addCart()
    // {
    //     // wish 상품을 장바구니로 이동
    // }

    public function generateUniqueCartId()
    {
        // 고유의 ID를 생성
        $id = uniqid(mt_rand(), true);
        $code = substr(hash('sha256',$id),0,15); // 10자리 추출
        return date("Ymd-his")."-".$code;
    }

    public function checkExistingCart(){
        // 이전에 장바구니가 있는 경우 확인
        $check = DB::table('shop_cart')
            ->where('email',$this->user_email)
            ->orderBy('id', "desc") // 가장 최신
            ->first();
        if ($check) {
            // 카트번호 저장
            $this->cartidx = $check->cartidx;
        }

        if(!$this->cartidx) {
            $this->cartidx = $this->generateUniqueCartId();
        }

    }

    public function addCart()
{
    // 선택된 상품들에 대해 반복 처리
    foreach ($this->selected as $wishItemId) {
        // 위시리스트에서 해당 상품 가져오기
        $wishItem = DB::table('shop_wish')->where('id', $wishItemId)->first();

        if ($wishItem) {
            // 장바구니에 이미 동일한 상품이 있는지 확인
            $existingCartItem = DB::table('shop_cart')
                ->where('cartidx', $this->cartidx)
                ->where('product_id', $wishItem->product_id)
                ->first();

            if ($existingCartItem) {
                // 이미 존재하는 상품의 수량을 +1
                DB::table('shop_cart')
                    ->where('id', $existingCartItem->id)
                    ->increment('quantity');
            } else {
                // 장바구니에 상품 추가하기
                DB::table('shop_cart')->insert([
                    'cartidx' => $this->cartidx, // 기존 또는 고유 카트 생성번호
                    'email' => $this->user_email, // 사용자 이메일
                    'product_id' => $wishItem->product_id, // 제품 번호
                    'product' => $wishItem->product, // 제품명
                    'image' => $wishItem->image, // 제품 이미지
                    'price' => $wishItem->price, // 제품 가격
                    'quantity' => 1, // 기본 수량 1로 설정
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // 위시리스트에서 해당 항목 제거하기
            DB::table('shop_wish')->where('id', $wishItemId)->delete();
        }
    }
}





}
