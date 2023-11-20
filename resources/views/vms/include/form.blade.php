<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="visi">{{ __('Visi') }}</label>
            <textarea name="visi" rows="5" id="visi" class="form-control  @error('visi') is-invalid @enderror" placeholder="{{ __('Visi') }}" required>{{ isset($vm) ? $vm->visi : old('visi') }}</textarea>
            @error('visi')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="misi">{{ __('Misi') }}</label>
            <textarea name="misi" rows="5" id="misi" class="form-control @error('misi') is-invalid @enderror" placeholder="{{ __('Misi') }}" required>{{ isset($vm) ? $vm->misi : old('misi') }}</textarea>
            @error('misi')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>
