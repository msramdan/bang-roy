<div class="row mb-2">
    @isset($team)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($team->photo == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Photo" class="rounded mb-2 mt-2" alt="Photo" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/photos/' . $team->photo) }}" alt="Photo" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
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
            <label for="nama">{{ __('Nama') }}</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ isset($team) ? $team->nama : old('nama') }}" placeholder="{{ __('Nama') }}" required />
            @error('nama')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="jabatan">{{ __('Jabatan') }}</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ isset($team) ? $team->jabatan : old('jabatan') }}" placeholder="{{ __('Jabatan') }}" required />
            @error('jabatan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>