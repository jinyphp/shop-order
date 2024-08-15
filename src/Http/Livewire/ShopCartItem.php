<?php
namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class ShopCartItem extends Component
{
    // 카트 주문정보
    public $cartidx;
    public $viewFile;

    public $cart = [];

    public function mount()
    {
        if(!$this->viewFile) {
            $this->viewFile = 'jiny-shop-order::shop.cart.table';
        }

        // 회원 인증여부 체크
        if($user = Auth::user()) {
            // 이전에 장바구니가 있는 경우 확인
            $check = DB::table('shop_cart')
                ->where('email',$user->email)
                ->orderBy('id',"desc") // 가장 최신
                ->first();
            if($check) {
                // 카트번호 저장
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
        }
    }

    public function generateUniqueCartId()
    {
        return generateUniqueCartId();
    }

    public function render()
    {
        if($this->cartidx) {
            return view($this->viewFile, [

            ]);
        }

        return view('jiny-shop-order::shop.cart.error',[
            'message'=>"장바구니 주문번호가 존재하지 않습니다. 관리자에게 문의하세요."
        ]);
    }

    private function calculateTotal($id)
    {
        $price = $this->cart[$id]['price'];
        $discount = $this->cart[$id]['discount'];
        $quantity = $this->cart[$id]['quantity'];

        $total = ($price - $discount) * $quantity;
        return $total;
    }

    public function incrementQuantity($id)
    {
        $this->cart[$id]['quantity']++;
        $this->cart[$id]['total'] = $this->calculateTotal($id);

        DB::table('shop_cart')->where('id', $id)->increment('quantity');

        $this->dispatch('cartUpdated', $this->cart[$id]);
    }

    public function decrementQuantity($id)
    {
        if($this->cart[$id]['quantity'] > 0) {
            $this->cart[$id]['quantity']--;
            $this->cart[$id]['total'] = $this->calculateTotal($id);

            DB::table('shop_cart')->where('id', $id)->decrement('quantity');
        }

        $this->dispatch('cartUpdated', $this->cart[$id]);
    }

    // 카트 삭제
    public function removeItem($id)
    {
        DB::table('shop_cart')->where('id', $id)->delete();
        //$this->loadCartItems();
        unset($this->cart[$id]); // 배열삭제

        session()->flash('success_message',"item has been removed");
        $this->dispatch('cartUpdated');
    }

    // 카트 전체 삭제
    public function clearCart()
    {
        // DB::table('shop_cart')->where('email', 'aaa')->delete();
        DB::table('shop_cart')->where('cartidx', $this->cartidx)->delete();
        $this->cart = []; // 초기화

        //$this->loadCartItems();
        session()->flash('success_message',"item has been all removed");
        $this->dispatch('cartUpdated');
    }


    /**
     * 이벤트
     */
    protected $listeners = [
        'requestCartItem' => 'getCartItem'
    ];

    public function getCartItem()
    {
        // Dispatch an event back to the first component with the cart item data
        $this->dispatch('updatedCartItem', $this->cart);
    }

}
