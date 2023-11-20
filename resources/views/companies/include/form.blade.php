<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama-perusahaan">{{ __('Nama Perusahaan') }}</label>
            <input type="text" name="nama_perusahaan" id="nama-perusahaan" class="form-control @error('nama_perusahaan') is-invalid @enderror" value="{{ isset($company) ? $company->nama_perusahaan : old('nama_perusahaan') }}" placeholder="{{ __('Nama Perusahaan') }}" required />
            @error('nama_perusahaan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="telepon">{{ __('Telepon') }}</label>
            <input type="text" name="telepon" id="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ isset($company) ? $company->telepon : old('telepon') }}" placeholder="{{ __('Telepon') }}" required />
            @error('telepon')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="alamat">{{ __('Alamat') }}</label>
            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="{{ __('Alamat') }}" required>{{ isset($company) ? $company->alamat : old('alamat') }}</textarea>
            @error('alamat')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ isset($company) ? $company->email : old('email') }}" placeholder="{{ __('Email') }}" required />
            @error('email')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="akte-notari">{{ __('Akte Notaris') }}</label>
            <input type="text" name="akte_notaris" id="akte-notari" class="form-control @error('akte_notaris') is-invalid @enderror" value="{{ isset($company) ? $company->akte_notaris : old('akte_notaris') }}" placeholder="{{ __('Akte Notaris') }}" required />
            @error('akte_notaris')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="kep-men-kum-ham">{{ __('Kep Men Kum Ham') }}</label>
            <input type="text" name="kep_men_kum_ham" id="kep-men-kum-ham" class="form-control @error('kep_men_kum_ham') is-invalid @enderror" value="{{ isset($company) ? $company->kep_men_kum_ham : old('kep_men_kum_ham') }}" placeholder="{{ __('Kep Men Kum Ham') }}" required />
            @error('kep_men_kum_ham')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="npwp">{{ __('Npwp') }}</label>
            <input type="text" name="npwp" id="npwp" class="form-control @error('npwp') is-invalid @enderror" value="{{ isset($company) ? $company->npwp : old('npwp') }}" placeholder="{{ __('Npwp') }}" required />
            @error('npwp')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nib">{{ __('Nib') }}</label>
            <input type="text" name="nib" id="nib" class="form-control @error('nib') is-invalid @enderror" value="{{ isset($company) ? $company->nib : old('nib') }}" placeholder="{{ __('Nib') }}" required />
            @error('nib')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="sppkp">{{ __('Sppkp') }}</label>
            <input type="text" name="sppkp" id="sppkp" class="form-control @error('sppkp') is-invalid @enderror" value="{{ isset($company) ? $company->sppkp : old('sppkp') }}" placeholder="{{ __('Sppkp') }}" required />
            @error('sppkp')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    @isset($company)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($company->logo == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Logo" class="rounded mb-2 mt-2" alt="Logo" width="150" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/logos/' . $company->logo) }}" alt="Logo" class="rounded mb-2 mt-2" width="150" height="150" style="object-fit: cover">
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
</div>
