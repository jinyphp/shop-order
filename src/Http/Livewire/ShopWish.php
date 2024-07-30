<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ShopWish extends Component
{
    public $wishes;
    public $viewfile;
    public $rows = [];

    public function mount()
    {
        $this->loadWishes();
        $this->loadRatings();
        if(!$this->viewfile){
            $this->viewfile = 'jiny-shop-order::cartzilla.wishlist.wish-items';
        }
    }

    public function loadWishes()
    {
        $email = 'aaa'; // 이메일이 'aaa'인 사용자의 위시리스트 불러옴
        $this->wishes = DB::table('shop_wish')
            ->where('email', $email)
            ->get();
    }

    public function loadRatings()
    {
        // 상품 데이터 가져오기
        $products = DB::table('shop_wish')->get();
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
    }


    public function render()
    {
        return view($this->viewfile, [
            'wishes' => $this->wishes,
            'rows' => $this->rows
        ]);
    }
}
