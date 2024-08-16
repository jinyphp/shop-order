<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartOffcanvas extends Component
{
    public $cart = [];
    public $subtotal = 0;
    public $viewfile;

    // 카트 주문정보
    public $cartidx;

    public function mount()
    {
        if(!$this->viewfile){
            $this->viewfile = 'jiny-shop-order::cartzilla.cart.cart-offcanvas';
        }

        // 사용자 인증 여부 체크
        if ($user = Auth::user()){
            // 이전에 장바구니가 있는지 확인
            $check = $this->isDbCart($user);

            if ($check){
                // 카트 번호 저장
                $this->cartidx = $check->cartidx;
            }
        }

        // 카트 번호가 없는 경우 신규로 생성
        if(!$this->cartidx) {
            $this->cartidx = $this->generateUniqueCartId();
        }

        if($this->cartidx) {
            // 카트 번호를 이용하여 정보를 확인
            $rows = DB::table('shop_cart')
                ->where('cartidx', $this->cartidx)
                ->orderBy('id',"desc")
                ->get();

            // 프로퍼티 배열에 저장
            foreach($rows as $item) {
                $temp = [];
                $id = $item->id;
                foreach($item as $key => $value) {
                    $temp[$key] = $value;
                }

                // Total 계산
                $temp['total'] = ($item->price - $item->discount) * $item->quantity;

                $this->cart[$id] = $temp;
            }
            // Subtotal 계산
            $this->calculateSubtotal();
        }
    }

    private function isDbCart($user)
    {


        return DB::table('shop_cart')
                -> where('email', $user->email)
                ->orderBy('id', "desc")
                ->first();
    }

    public function calculateSubtotal()
    {
        $this->subtotal = array_sum(array_map(function ($item) {
            return ($item['price'] - $item['discount']) * $item['quantity'];
        }, $this->cart));
    }

    public function generateUniqueCartId()
    {
        return generateUniqueCartId();
    }

    public function incrementQuantity($id)
    {
        $this->cart[$id]['quantity']++;
        $this->calculateSubtotal();

        DB::table('shop_cart')->where('id', $id)->increment('quantity');

        $this->dispatch('cartUpdated', $this->cart[$id]);
    }

    public function decrementQuantity($id)
    {
        if($this->cart[$id]['quantity'] > 0) {
            $this->cart[$id]['quantity']--;
            $this->calculateSubtotal();

            DB::table('shop_cart')->where('id', $id)->decrement('quantity');
        }

        $this->dispatch('cartUpdated', $this->cart[$id]);
    }

    public function removeItem($id)
    {
        DB::table('shop_cart')->where('id', $id)->delete();
        unset($this->cart[$id]); // 배열삭제

        $this->calculateSubtotal();

        session()->flash('success_message',"item has been removed");
        $this->dispatch('cartUpdated');
    }

    public function clearCart()
    {
        DB::table('shop_cart')->where('cartidx', $this->cartidx)->delete();
        $this->cart = []; // 초기화

        session()->flash('success_message',"item has been all removed");
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        if($this->cartidx) {
            return view($this->viewfile, [

            ]);
        }
    }
}
