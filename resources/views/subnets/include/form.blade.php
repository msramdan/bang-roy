<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="subnet">{{ __('Subnet') }}</label>
            <input type="text" name="subnet" id="subnet" class="form-control @error('subnet') is-invalid @enderror" value="{{ isset($subnet) ? $subnet->subnet : old('subnet') }}" placeholder="{{ __('Subnet') }}" required />
            @error('subnet')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>