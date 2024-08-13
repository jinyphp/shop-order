<?php
namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartItems extends Component
{
    public $cartItems = [];
    public $viewfile;
    private $email;

    public function mount()
    {
        // $email = 'aaa';
        $user = Auth::user();
        if($user){
            $this->email = $user->email;
        } else {
            $this->email = null;
        }

        $this->loadCartItems();
        if(!$this->viewfile){
            $this->viewfile = 'jiny-shop-order::cartzilla.cart.cart-items';
        }
    }

    public function loadCartItems()
    {
       if($this->email){
        $this->cartItems = DB::table('shop_cart')
            ->where('email', $this->email)
            ->get()
            ->toArray();
       }
    }

    public function removeFromCart($id)
    {
        DB::table('shop_cart')
            ->where('id', $id)
            ->delete();

        $this->loadCartItems();
        $this->dispatch('cartUpdated');
    }

    public function incrementQuantity($id)
    {
        DB::table('shop_cart')->where('id', $id)->increment('quantity');
        $this->loadCartItems();
        $this->dispatch('cartUpdated');
    }

    public function decrementQuantity($id)
    {
        $item = DB::table('shop_cart')->where('id', $id)->first();
        if ($item->quantity > 1) {
            DB::table('shop_cart')->where('id', $id)->decrement('quantity');
            $this->loadCartItems();
            $this->dispatch('cartUpdated');
        }
    }

    public function updateQuantity($id, $quantity)
    {
        if ($quantity > 0) {
            DB::table('shop_cart')->where('id', $id)->update(['quantity' => $quantity]);
            $this->loadCartItems();
            $this->dispatch('cartUpdated');
        }
    }

    public function removeItem($id)
    {
        DB::table('shop_cart')->where('id', $id)->delete();
        $this->loadCartItems();
        $this->dispatch('cartUpdated');
    }

    public function clearCart()
    {
        DB::table('shop_cart')->where('email', 'aaa')->delete();
        $this->loadCartItems();
        $this->dispatch('cartUpdated');
    }

    public function render()
    {

        ## blade에서 하거나 else로 return하거나
        ## blade에서 하면 디자이너가 공부해야함
        if($this->email){
            return view($this->viewfile, [
                'cartItems' => $this->cartItems
            ]);
        } else {
            return view();
        }
    }
}
