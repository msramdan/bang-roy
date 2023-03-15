<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="app-id">{{ __('Branches') }}</label>
            <select class="form-select @error('instance_id') is-invalid @enderror" name="instance_id" id="instance-id"
                class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select branches') }} --</option>

                @foreach ($instances as $instance)
                    <option value="{{ $instance->id }}"
                        {{ isset($device) && $device->instance_id == $instance->id ? 'selected' : (old('instance_id') == $instance->id ? 'selected' : '') }}>
                        {{ $instance->instance_name }}
                    </option>
                @endforeach
            </select>
            @error('instance_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="cluster-id">{{ __('Cluster') }}</label>
            <select class="form-select @error('cluster_id') is-invalid @enderror" name="cluster_id" id="cluster-id"
                class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select cluster') }} --</option>

                @foreach ($clusters as $cluster)
                    <option value="{{ $cluster->id }}"
                        {{ isset($device) && $device->cluster_id == $cluster->id ? 'selected' : (old('cluster_id') == $cluster->id ? 'selected' : '') }}>
                        {{ $cluster->cluster_name }}
                    </option>
                @endforeach
            </select>
            @error('cluster_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label for="dev-eui">{{ __('Dev Eui') }}</label>
            <input type="text" name="dev_eui" id="dev-eui"
                class="form-control @error('dev_eui') is-invalid @enderror"
                value="{{ isset($device) ? $device->dev_eui : old('dev_eui') }}" placeholder="{{ __('Dev Eui') }}"
                required />
            @error('dev_eui')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="app-eui">{{ __('App Eui') }}</label>
            <input type="text" name="app_eui" id="app-eui"
                class="form-control @error('app_eui') is-invalid @enderror"
                value="{{ isset($device) ? $device->app_eui : old('app_eui') }}" placeholder="{{ __('App Eui') }}"
                required />
            @error('app_eui')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="dev-name">{{ __('Dev Name') }}</label>
            <input type="text" name="dev_name" id="dev-name"
                class="form-control @error('dev_name') is-invalid @enderror"
                value="{{ isset($device) ? $device->dev_name : old('dev_name') }}" placeholder="{{ __('Dev Name') }}"
                required />
            @error('dev_name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="dev-type">{{ __('Dev Type') }}</label>
            <select class="form-select @error('dev_type') is-invalid @enderror" name="dev_type" id="dev-type"
                class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select Dev Type') }} --</option>
                <option value="abp-type"
                    {{ isset($device) && $device->dev_type == 'abp-type' ? 'selected' : (old('dev_type') == 'abp-type' ? 'selected' : '') }}>
                    {{ __('Abp Type') }}</option>
                <option value="otaa-type"
                    {{ isset($device) && $device->dev_type == 'otaa-type' ? 'selected' : (old('dev_type') == 'otaa-type' ? 'selected' : '') }}>
                    {{ __('Otaa Type') }}</option>
            </select>
            @error('dev_type')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <input readonly type="hidden" name="auth_type" id="auth-type"
        class="form-control @error('auth_type') is-invalid @enderror"
        value="{{ isset($device) ? $device->auth_type : old('auth_type') }}" placeholder="" required />
    <div class="col-md-6">
        <div class="form-group">
            <label for="region">{{ __('Region') }}</label>
            <input type="text" name="region" id="region"
                class="form-control @error('region') is-invalid @enderror"
                value="{{ isset($device) ? $device->region : old('region') }}" placeholder="{{ __('Region') }}"
                required />
            @error('region')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="subnet-id">{{ __('Subnet') }}</label>
            <select class="form-select @error('subnet_id') is-invalid @enderror" name="subnet_id" id="subnet-id"
                class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select subnet') }} --</option>

                @foreach ($subnets as $subnet)
                    <option value="{{ $subnet->id }}"
                        {{ isset($device) && $device->subnet_id == $subnet->id ? 'selected' : (old('subnet_id') == $subnet->id ? 'selected' : '') }}>
                        {{ $subnet->subnet }}
                    </option>
                @endforeach
            </select>
            @error('subnet_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="app-key">{{ __('App Key') }}</label>
            <input type="text" name="app_key" id="app-key"
                class="form-control @error('app_key') is-invalid @enderror"
                value="{{ isset($device) ? $device->app_key : old('app_key') }}" placeholder="{{ __('App Key') }}"
                required />
            @error('app_key')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="support-class-b">{{ __('Support Class B') }}</label>
            <select class="form-select @error('support_class_b') is-invalid @enderror" name="support_class_b"
                id="is-notif-tele" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select Support Class B') }} --</option>
                <option value="0"
                    {{ isset($device) && $device->support_class_b == '0' ? 'selected' : (old('support_class_b') == '0' ? 'selected' : '') }}>
                    {{ __('True') }}</option>
                <option value="1"
                    {{ isset($device) && $device->support_class_b == '1' ? 'selected' : (old('support_class_b') == '1' ? 'selected' : '') }}>
                    {{ __('False') }}</option>
            </select>
            @error('support_class_b')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="support-class-c">{{ __('Support Class C') }}</label>
            <select class="form-select @error('support_class_c') is-invalid @enderror" name="support_class_c"
                id="is-notif-tele" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select Support Class C') }} --</option>
                <option value="0"
                    {{ isset($device) && $device->support_class_c == '0' ? 'selected' : (old('support_class_c') == '0' ? 'selected' : '') }}>
                    {{ __('True') }}</option>
                <option value="1"
                    {{ isset($device) && $device->support_class_c == '1' ? 'selected' : (old('support_class_c') == '1' ? 'selected' : '') }}>
                    {{ __('False') }}</option>
            </select>
            @error('support_class_c')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6" id="dev-mac-version">
        <div class="form-group">
            <label for="mac-version">{{ __('Mac Version') }}</label>
            <input type="text" name="mac_version" id="mac-version"
                class="form-control @error('mac_version') is-invalid @enderror"
                value="{{ isset($device) ? $device->mac_version : old('mac_version') }}"
                placeholder="{{ __('Mac Version') }}" />
            @error('mac_version')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6" id="dev-app-s-key">
        <div class="form-group">
            <label for="app-s-key">{{ __('App SKey') }}</label>
            <input type="text" name="app_s_key" id="app-s-key"
                class="form-control @error('app_s_key') is-invalid @enderror"
                value="{{ isset($device) ? $device->app_key : old('app_s_key') }}"
                placeholder="{{ __('App SKey') }}" />
            @error('app_s_key')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6" id="div-nwk-s-key">
        <div class="form-group">
            <label for="nwk-s-key">{{ __('Nwk SKey') }}</label>
            <input type="text" name="nwk_s_key" id="nwk-s-key"
                class="form-control @error('nwk_s_key') is-invalid @enderror"
                value="{{ isset($device) ? $device->nwk_s_key : old('nwk_s_key') }}"
                placeholder="{{ __('Nwk SKey') }}" />
            @error('nwk_s_key')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6" id="div-dev-addr">
        <div class="form-group">
            <label for="dev-addr">{{ __('Dev Addr') }}</label>
            <input type="text" name="dev_addr" id="dev-addr"
                class="form-control @error('dev_addr') is-invalid @enderror"
                value="{{ isset($device) ? $device->dev_addr : old('dev_addr') }}"
                placeholder="{{ __('Dev Addr') }}" />
            @error('dev_addr')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

</div>
