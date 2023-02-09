<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="device-id">{{ __('Device') }}</label>
            <select class="form-select @error('device_id') is-invalid @enderror" name="device_id" id="device-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select device') }} --</option>
                
                        @foreach ($devices as $device)
                            <option value="{{ $device->id }}" {{ isset($parsed) && $parsed->device_id == $device->id ? 'selected' : (old('device_id') == $device->id ? 'selected' : '') }}>
                                {{ $device->dev_eui }}
                            </option>
                        @endforeach
            </select>
            @error('device_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="rawdata-id">{{ __('Rawdata') }}</label>
            <select class="form-select @error('rawdata_id') is-invalid @enderror" name="rawdata_id" id="rawdata-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select rawdata') }} --</option>
                
                        @foreach ($rawdatas as $rawdata)
                            <option value="{{ $rawdata->id }}" {{ isset($parsed) && $parsed->rawdata_id == $rawdata->id ? 'selected' : (old('rawdata_id') == $rawdata->id ? 'selected' : '') }}>
                                {{ $rawdata->dev_eui }}
                            </option>
                        @endforeach
            </select>
            @error('rawdata_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="frame-id">{{ __('Frame Id') }}</label>
            <input type="text" name="frame_id" id="frame-id" class="form-control @error('frame_id') is-invalid @enderror" value="{{ isset($parsed) ? $parsed->frame_id : old('frame_id') }}" placeholder="{{ __('Frame Id') }}" required />
            @error('frame_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="temperature">{{ __('Temperature') }}</label>
            <input type="number" name="temperature" id="temperature" class="form-control @error('temperature') is-invalid @enderror" value="{{ isset($parsed) ? $parsed->temperature : old('temperature') }}" placeholder="{{ __('Temperature') }}" required />
            @error('temperature')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="humidity">{{ __('Humidity') }}</label>
            <input type="number" name="humidity" id="humidity" class="form-control @error('humidity') is-invalid @enderror" value="{{ isset($parsed) ? $parsed->humidity : old('humidity') }}" placeholder="{{ __('Humidity') }}" required />
            @error('humidity')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="period">{{ __('Period') }}</label>
            <input type="number" name="period" id="period" class="form-control @error('period') is-invalid @enderror" value="{{ isset($parsed) ? $parsed->period : old('period') }}" placeholder="{{ __('Period') }}" required />
            @error('period')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="rssi">{{ __('Rssi') }}</label>
            <input type="number" name="rssi" id="rssi" class="form-control @error('rssi') is-invalid @enderror" value="{{ isset($parsed) ? $parsed->rssi : old('rssi') }}" placeholder="{{ __('Rssi') }}" required />
            @error('rssi')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="snr">{{ __('Snr') }}</label>
            <input type="number" name="snr" id="snr" class="form-control @error('snr') is-invalid @enderror" value="{{ isset($parsed) ? $parsed->snr : old('snr') }}" placeholder="{{ __('Snr') }}" required />
            @error('snr')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="battery">{{ __('Battery') }}</label>
            <input type="number" name="battery" id="battery" class="form-control @error('battery') is-invalid @enderror" value="{{ isset($parsed) ? $parsed->battery : old('battery') }}" placeholder="{{ __('Battery') }}" required />
            @error('battery')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>