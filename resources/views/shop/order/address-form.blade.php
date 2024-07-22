<div>
    <form wire:submit.prevent="submit">
        <div class="row mb-3">
            <label for="country" class="col-sm-2 col-form-label">나라</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="country" wire:model="country">
                @error('country') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="addr1" class="col-sm-2 col-form-label">주소</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="addr1" wire:model="addr1">
                @error('addr1') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="addr2" class="col-sm-2 col-form-label">상세주소</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="addr2" wire:model="addr2">
                @error('addr2') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="city" class="col-sm-2 col-form-label">도시</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="city" wire:model="city">
                @error('city') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="province" class="col-sm-2 col-form-label">주</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="province" wire:model="province">
                @error('province') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="zipcode" class="col-sm-2 col-form-label">우편번호</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="zipcode" wire:model="zipcode">
                @error('zipcode') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">저장</button>
            </div>
        </div>
    </form>
</div>
