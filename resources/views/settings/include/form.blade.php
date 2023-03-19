<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="aplication-name">{{ __(' Application Name') }}</label>
            <input type="text" name="aplication_name" id="aplication-name"
                class="form-control @error('aplication_name') is-invalid @enderror"
                value="{{ isset($setting) ? $setting->aplication_name : old('aplication_name') }}"
                placeholder="{{ __('Aplication Name') }}" required />
            @error('aplication_name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="endpoint-nm">{{ __('Endpoint Nms') }}</label>
            <input type="text" name="endpoint_nms" id="endpoint-nm"
                class="form-control @error('endpoint_nms') is-invalid @enderror"
                value="{{ isset($setting) ? $setting->endpoint_nms : old('endpoint_nms') }}"
                placeholder="{{ __('Endpoint Nms') }}" required />
            @error('endpoint_nms')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="endpoint-nm">{{ __('Token') }}</label>
            <input type="text" name="token" id="endpoint-nm"
                class="form-control @error('token') is-invalid @enderror"
                value="{{ isset($setting) ? $setting->token : old('token') }}" placeholder="{{ __('Endpoint Nms') }}"
                required />
            @error('token')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="is-notif-tele">{{ __('Is Notif Tele') }}</label>
            <select class="form-select @error('is_notif_tele') is-invalid @enderror" name="is_notif_tele"
                id="is-notif-tele" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select is notif tele') }} --</option>
                <option value="0"
                    {{ isset($setting) && $setting->is_notif_tele == '0' ? 'selected' : (old('is_notif_tele') == '0' ? 'selected' : '') }}>
                    {{ __('True') }}</option>
                <option value="1"
                    {{ isset($setting) && $setting->is_notif_tele == '1' ? 'selected' : (old('is_notif_tele') == '1' ? 'selected' : '') }}>
                    {{ __('False') }}</option>
            </select>
            @error('is_notif_tele')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-2">
        <div class="avatar avatar-xl mb-3">
            @if ($setting->logo == null)
                <img style="width:180px" src="{{ asset('assets/not-available.png') }}" alt="Logo Apps">
            @else
                <img style="width:180px" src="{{ Storage::url('public/img/setting_app/') . $setting->logo }}"
                    alt="Logo Apps">
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="file">{{ __('Logo Apps') }}</label>
            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror"
                id="logo">
            <span style="color:red; font-size:10px">Size suggestion : 660x220 pixels </span>
            @error('logo')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    {{-- favicon --}}
    <div class="col-md-2">
        <div class="avatar avatar-xl mb-3">
            @if ($setting->favicon == null)
                <img style="width:70px" src="{{ asset('assets/not-available.png') }}" alt="Favicon">
            @else
                <img style="width:70px" src="{{ Storage::url('public/img/setting_app/') . $setting->favicon }}"
                    alt="Favicon">
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="file">{{ __('Favicon') }}</label>
            <input type="file" name="favicon" class="form-control @error('favicon') is-invalid @enderror"
                id="favicon">
            <span style="color:red; font-size:10px">Size suggestion : 128x128 pixels </span>
            @error('favicon')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>
