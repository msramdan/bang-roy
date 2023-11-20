<div class="row mb-2">
    @isset($testimony)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($testimony->photo == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Photo" class="rounded mb-2 mt-2" alt="Photo" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/photos/' . $testimony->photo) }}" alt="Photo" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
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
            <label for="deskripsi-testimony">{{ __('Deskripsi Testimony') }}</label>
            <textarea name="deskripsi_testimony" id="deskripsi-testimony" class="form-control @error('deskripsi_testimony') is-invalid @enderror" placeholder="{{ __('Deskripsi Testimony') }}" required>{{ isset($testimony) ? $testimony->deskripsi_testimony : old('deskripsi_testimony') }}</textarea>
            @error('deskripsi_testimony')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama-user">{{ __('Nama User') }}</label>
            <input type="text" name="nama_user" id="nama-user" class="form-control @error('nama_user') is-invalid @enderror" value="{{ isset($testimony) ? $testimony->nama_user : old('nama_user') }}" placeholder="{{ __('Nama User') }}" required />
            @error('nama_user')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="jabatan">{{ __('Jabatan') }}</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ isset($testimony) ? $testimony->jabatan : old('jabatan') }}" placeholder="{{ __('Jabatan') }}" required />
            @error('jabatan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>