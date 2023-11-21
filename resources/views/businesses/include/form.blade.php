<div class="row mb-2">
    @isset($business)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($business->photo == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Photo" class="rounded mb-2 mt-2" alt="Photo" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/photos/' . $business->photo) }}" alt="Photo" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="photo">{{ __('Photo') }}</label>
                        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo">

                        @error('photo')
                          <span class="text-danger">
                                {{ $message }}
                           </span>
                        @enderror
                        <div id="photoHelpBlock" class="form-text">
                            {{ __('Leave the photo blank if you don`t want to change it.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-6">
            <div class="form-group">
                <label for="photo">{{ __('Photo') }}</label>
                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo" required>

                @error('photo')
                   <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
    @endisset
    <div class="col-md-6">
        <div class="form-group">
            <label for="title-business">{{ __('Title Business') }}</label>
            <input type="text" name="title_business" id="title-business" class="form-control @error('title_business') is-invalid @enderror" value="{{ isset($business) ? $business->title_business : old('title_business') }}" placeholder="{{ __('Title Business') }}" required />
            @error('title_business')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="keterangan">{{ __('Keterangan') }}</label>
            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="{{ __('Keterangan') }}" required>{{ isset($business) ? $business->keterangan : old('keterangan') }}</textarea>
            @error('keterangan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>