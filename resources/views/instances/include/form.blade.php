<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="app-name">{{ __('App Name') }}</label>
            <input type="text" name="app_name" id="app-name"
                class="form-control @error('app_name') is-invalid @enderror"
                value="{{ isset($instance) ? $instance->app_name : old('app_name') }}" placeholder="{{ __('App Name') }}"
                required />
            @error('app_name')
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
            <label for="instance-name">{{ __('Instance Name') }}</label>
            <input type="text" name="instance_name" id="instance-name"
                class="form-control @error('instance_name') is-invalid @enderror"
                value="{{ isset($instance) ? $instance->instance_name : old('instance_name') }}"
                placeholder="{{ __('Instance Name') }}" required />
            @error('instance_name')
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
                <option value="" selected disabled>-- {{ __('Select kabkot') }} --</option>

                @foreach ($kabkots as $kabkot)
                    <option value="{{ $kabkot->id }}"
                        {{ isset($instance) && $instance->kabkot_id == $kabkot->id ? 'selected' : (old('kabkot_id') == $kabkot->id ? 'selected' : '') }}>
                        {{ $kabkot->provinsi_id }}
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
    <div class="col-md-4">
        <div class="form-group">
            <label for="kecamatan-id">{{ __('Kecamatan') }}</label>
            <select class="form-select @error('kecamatan_id') is-invalid @enderror" name="kecamatan_id"
                id="kecamatan-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select kecamatan') }} --</option>

                @foreach ($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->id }}"
                        {{ isset($instance) && $instance->kecamatan_id == $kecamatan->id ? 'selected' : (old('kecamatan_id') == $kecamatan->id ? 'selected' : '') }}>
                        {{ $kecamatan->kabkot_id }}
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
    <div class="col-md-4">
        <div class="form-group">
            <label for="kelurahan-id">{{ __('Kelurahan') }}</label>
            <select class="form-select @error('kelurahan_id') is-invalid @enderror" name="kelurahan_id"
                id="kelurahan-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select kelurahan') }} --</option>

                @foreach ($kelurahans as $kelurahan)
                    <option value="{{ $kelurahan->id }}"
                        {{ isset($instance) && $instance->kelurahan_id == $kelurahan->id ? 'selected' : (old('kelurahan_id') == $kelurahan->id ? 'selected' : '') }}>
                        {{ $kelurahan->kecamatan_id }}
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
    <div class="col-md-4">
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
            <label for="longitude">{{ __('Longitude') }}</label>
            <input type="text" name="longitude" id="longitude"
                class="form-control @error('longitude') is-invalid @enderror"
                value="{{ isset($instance) ? $instance->longitude : old('longitude') }}"
                placeholder="{{ __('Longitude') }}" required />
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
                placeholder="{{ __('Latitude') }}" required />
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
@push('js')
    <script>
        $(document).ready(function() {
            var i = 1;

            function checkKosongLatLong() {
                if ($('#latitude').val() == '' || $('#longitude').val() == '') {
                    $('.alert-choose-loc').show();
                } else {
                    $('.alert-choose-loc').hide();
                }
            }

            var delay = (function() {
                var timer = 0;
                return function(callback, ms) {
                    clearTimeout(timer);
                    timer = setTimeout(callback, ms);
                };
            })()


            // initialize map
            const getLocationMap = L.map('map');

            // initialize OSM
            const osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
            const osmAttrib = 'Leaflet © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
            const osm = new L.TileLayer(osmUrl, {
                minZoom: 8,
                maxZoom: 50,
                attribution: osmAttrib
            });
            // render map

            getLocationMap.scrollWheelZoom.disable()
            getLocationMap.setView(new L.LatLng('-6.8384545', '108.431134'), 14)
            getLocationMap.addLayer(osm)
            // initial hidden marker, and update on click
            const getLocationMapMarker = L.marker([0, 0]).addTo(getLocationMap);

            function getToLoc(lat, lng, displayname = null) {
                const zoom = 17;

                $.ajax({
                    url: `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`,
                    dataType: 'json',
                    success: function(data) {
                        $('#latitude').val(lat)
                        $('#longitude').val(lng)
                        if (displayname == null) {
                            $('#search_place').val(data.display_name)
                        } else {
                            $('#search_place').val(displayname)
                        }
                    }
                });
                getLocationMap.setView(new L.LatLng(lat, lng), zoom);
                getLocationMapMarker.setLatLng([lat, lng])
                $('.results').hide();
                checkKosongLatLong()

            }

            // listen click on map
            getLocationMap.on('click', function(e) {
                // set default lat and lng to 0,0
                const {
                    lat = 0, lng = 0
                } = e.latlng;
                // update text DOM

                $('#latitude').val(lat)
                $('#longitude').val(lng)
                // update marker position
                getToLoc(lat, lng)
                checkKosongLatLong()

            });



            $(document).on('click', '.resultnya', function() {

                const {
                    lat = 0, lng = 0, dispname = ''
                } = $(this).data();
                getToLoc(lat, lng, dispname)
            })

            function doSearching(elem) {
                $('.results').html(
                    '<li style="text-align: center;padding: 50% 0; max-height: 25hv;">Mengetik...</li>');
                const search = elem.val()
                delay(function() {
                    if (search.length >= 3) {
                        $('.results').html(
                            '<li style="text-align: center;padding: 50% 0; max-height: 25hv;"><i class="fa fa-refresh fa-spin"></i> Mencari...</li>'
                        );
                        const url = 'https://nominatim.openstreetmap.org/search?format=json&q=' + search;
                        $.ajax({
                            url: url,
                            dataType: 'json',
                            success: function(data) {
                                $('.results').empty();
                                if (data.length > 0) {
                                    $.each(data, function(i, item) {
                                        $('.results').append(
                                            '<li><a class="resultnya" href="#" data-lat="' +
                                            item.lat + '" data-lng="' + item.lon +
                                            '" data-dispname="' + item
                                            .display_name + '">' + item
                                            .display_name +
                                            '<br/><i class="fa fa-map-marker"></i><span style="margin-left: 7px;">' +
                                            item.lat + ',' + item.lon +
                                            '</span></a></li>');
                                    })
                                } else {
                                    $('.results').html(
                                        '<li style="text-align: center;padding: 50% 0; max-height: 25hv;">Tidak ditemukan (Mungkin ada yang salah dengan ejaan, typo, atau kesalahan ketik)</li>'
                                    );
                                }
                            }
                        });
                    } else {
                        $('.results').html(
                            '<li style="text-align: center;padding: 50% 0; max-height: 25hv;">Masukan Pencarian (Min. 3 Karakter)</li>'
                        );
                    }
                }, 1000);
            }

            $('#search_place').focus(function() {
                $('.results').show();
            }).keyup(function() {
                doSearching($(this))
            }).blur(function() {
                setTimeout(function() {
                    $('.results').hide();
                }, 1000);
            })
            $('#search_place').on('paste', doSearching($(this)))



        });
    </script>
@endpush
