<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="dev-eui">{{ __('Dev Eui') }}</label>
            <input type="text" name="dev_eui" id="dev-eui" class="form-control @error('dev_eui') is-invalid @enderror" value="{{ isset($device) ? $device->dev_eui : old('dev_eui') }}" placeholder="{{ __('Dev Eui') }}" required />
            @error('dev_eui')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>