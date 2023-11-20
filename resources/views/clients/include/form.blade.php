<div class="row mb-2">
    @isset($client)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($client->logo == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Logo" class="rounded mb-2 mt-2" alt="Logo" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/logos/' . $client->logo) }}" alt="Logo" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="logo">{{ __('Logo') }}</label>
                        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="logo">

                        @error('logo')
                          <span class="text-danger">
                                {{ $message }}
                           </span>
                        @enderror
                        <div id="logoHelpBlock" class="form-text">
                            {{ __('Leave the logo blank if you don`t want to change it.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-6">
            <div class="form-group">
                <label for="logo">{{ __('Logo') }}</label>
                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="logo" required>

                @error('logo')
                   <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
    @endisset
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama-client">{{ __('Nama Client') }}</label>
            <input type="text" name="nama_client" id="nama-client" class="form-control @error('nama_client') is-invalid @enderror" value="{{ isset($client) ? $client->nama_client : old('nama_client') }}" placeholder="{{ __('Nama Client') }}" required />
            @error('nama_client')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>