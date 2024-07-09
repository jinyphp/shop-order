<?php

namespace Jiny\Shop\Order\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ShopTransactions extends Component
{
    public $transactions;

    public function mount()
    {
        $this->loadTransactions();
    }

    public function loadTransactions()
    {
        $this->transactions = DB::table('shop_transactions')->get();
    }


    public function updateStatus($transactionId, $status)
    {
        DB::table('shop_transactions')
            ->where('id', $transactionId)
            ->update(['status' => $status]);

        $this->loadTransactions();
    }

    public function render()
    {
        $viewFile = 'jiny-shop-order::shop.transaction.list';
        return view($viewFile, [
            'transactions' => $this->transactions
        ]);
    }
}
