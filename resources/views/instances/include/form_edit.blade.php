<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="instance-name">{{ __('Branche Name') }}</label>
            <input type="text" name="instance_name" id="instance-name"
                class="form-control @error('instance_name') is-invalid @enderror"
                value="{{ isset($instance) ? $instance->instance_name : old('instance_name') }}"
                placeholder="{{ __('Branche Name') }}" required />
            @error('instance_name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="push-url">{{ __('Push Url') }}</label>
            <input type="text" name="push_url" id="push-url"
                class="form-control @error('push_url') is-invalid @enderror"
                value="{{ isset($instance) ? $instance->push_url : old('push_url') }}"
                placeholder="{{ __('Push Url') }}" required />
            @error('push_url')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="text" name="email" id="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ isset($instance) ? $instance->email : old('email') }}" placeholder="{{ __('Email') }}"
                required />
            @error('email')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone">{{ __('Phone') }}</label>
            <input type="text" name="phone" id="phone"
                class="form-control @error('phone') is-invalid @enderror"
                value="{{ isset($instance) ? $instance->phone : old('phone') }}" placeholder="{{ __('Phone') }}"
                required />
            @error('phone')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                placeholder="{{ __('Address') }}" required>{{ isset($instance) ? $instance->address : old('address') }}</textarea>
            @error('address')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="provinsi-id">{{ __('Province') }}</label>
            <select class="form-select @error('provinsi_id') is-invalid @enderror" name="provinsi_id" id="provinsi-id"
                class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select province') }} --</option>

                @foreach ($provinces as $province)
                    <option value="{{ $province->id }}"
                        {{ isset($instance) && $instance->provinsi_id == $province->id ? 'selected' : (old('provinsi_id') == $province->id ? 'selected' : '') }}>
                        {{ $province->provinsi }}
                    </option>
                @endforeach
            </select>
            @error('provinsi_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="kabkot-id">{{ __('Kabkot') }}</label>
            <select class="form-select @error('kabkot_id') is-invalid @enderror" name="kabkot_id" id="kabkot-id"
                class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select kabupaten/kota') }} --</option>

                @foreach ($kabkot as $kabkot)
                    <option value="{{ $kabkot->id }}"
                        {{ isset($instance) && $instance->kabkot_id == $kabkot->id ? 'selected' : (old('kabkot_id') == $kabkot->id ? 'selected' : '') }}>
                        {{ $kabkot->kabupaten_kota }}
                    </option>
                @endforeach
            </select>
            @error('kabkot_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="kecamatan-id">{{ __('Kecamatan') }}</label>
            <select class="form-select @error('kecamatan_id') is-invalid @enderror" name="kecamatan_id"
                id="kecamatan-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select kecamatan') }} --</option>
                @foreach ($kecamatan as $kecamatan)
                    <option value="{{ $kecamatan->id }}"
                        {{ isset($instance) && $instance->kecamatan_id == $kecamatan->id ? 'selected' : (old('kecamatan_id') == $kecamatan->id ? 'selected' : '') }}>
                        {{ $kecamatan->kecamatan }}
                    </option>
                @endforeach
            </select>
            @error('kecamatan_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="kelurahan-id">{{ __('Kelurahan') }}</label>
            <select class="form-select @error('kelurahan_id') is-invalid @enderror" name="kelurahan_id"
                id="kelurahan-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select kelurahan') }} --</option>

                @foreach ($kelurahan as $kelurahan)
                    <option value="{{ $kelurahan->id }}"
                        {{ isset($instance) && $instance->kelurahan_id == $kelurahan->id ? 'selected' : (old('kelurahan_id') == $kelurahan->id ? 'selected' : '') }}>
                        {{ $kelurahan->kelurahan }}
                    </option>
                @endforeach
            </select>
            @error('kelurahan_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="zip-kode">{{ __('Zip Kode') }}</label>
            <input type="text" name="zip_kode" id="zip-kode"
                class="form-control @error('zip_kode') is-invalid @enderror"
                value="{{ isset($instance) ? $instance->zip_kode : old('zip_kode') }}"
                placeholder="{{ __('Zip Kode') }}" required />
            @error('zip_kode')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="longitude">{{ __('Longitude') }}</label>
            <input type="text" name="longitude" id="longitude"
                class="form-control @error('longitude') is-invalid @enderror"
                value="{{ isset($instance) ? $instance->longitude : old('longitude') }}"
                placeholder="{{ __('Longitude') }}" required readonly />
            @error('longitude')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="latitude">{{ __('Latitude') }}</label>
            <input type="text" name="latitude" id="latitude"
                class="form-control @error('latitude') is-invalid @enderror"
                value="{{ isset($instance) ? $instance->latitude : old('latitude') }}"
                placeholder="{{ __('Latitude') }}" required readonly />
            @error('latitude')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    {{-- <div class="col-md-6"> --}}
    <div class="card px-2 py-1">
        <div class="mb-3 search-box">
            <input type="text" class="form-control @error('place') is-invalid @enderror" name="place"
                id="search_place" placeholder="Cari Lokasi" value="{{ old('place') }}" autocomplete="off">
            <span class="d-none" style="color: red;" id="error-place"></span>
            @error('place')
                <span style="color: red;">{{ $message }}</span>
            @enderror
            <ul class="results">
                <li style="text-align: center;padding: 50% 0; max-height: 25hv;">Masukan Pencarian</li>
            </ul>
        </div>
        <div class="map-embed" id="map"></div>
    </div>
    {{-- </div> --}}
</div>
