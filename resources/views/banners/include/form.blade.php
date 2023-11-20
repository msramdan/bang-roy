<div class="row mb-2">
    @isset($banner)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($banner->banner == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Banner" class="rounded mb-2 mt-2" alt="Banner" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/banners/' . $banner->banner) }}" alt="Banner" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="banner">{{ __('Banner') }}</label>
                        <input type="file" name="banner" class="form-control @error('banner') is-invalid @enderror" id="banner">

                        @error('banner')
                          <span class="text-danger">
                                {{ $message }}
                           </span>
                        @enderror
                        <div id="bannerHelpBlock" class="form-text">
                            {{ __('Leave the banner blank if you don`t want to change it.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-6">
            <div class="form-group">
                <label for="banner">{{ __('Banner') }}</label>
                <input type="file" name="banner" class="form-control @error('banner') is-invalid @enderror" id="banner" required>

                @error('banner')
                   <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
    @endisset
    <div class="col-md-6">
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ isset($banner) ? $banner->title : old('title') }}" placeholder="{{ __('Title') }}" required />
            @error('title')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="deksripsi">{{ __('Deksripsi') }}</label>
            <textarea name="deksripsi" id="deksripsi" class="form-control @error('deksripsi') is-invalid @enderror" placeholder="{{ __('Deksripsi') }}" required>{{ isset($banner) ? $banner->deksripsi : old('deksripsi') }}</textarea>
            @error('deksripsi')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>