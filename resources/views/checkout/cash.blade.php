<div>
    <div>
        내가 보유한 캐쉬 <span class="text-yellow-500 font-bold">{{$myCash}}</span> 원
    </div>

    <div class="flex space-y-2">
        <input class="text-right block border border-gray-200 rounded py-2 leading-5 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
        type="number"
        name="use_cash" placeholder="0원" wire:model="useCash">

        <button class="w-40">
            전액사용
        </button>

    </div>

</div>
