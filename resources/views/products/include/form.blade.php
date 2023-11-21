<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama">{{ __('Nama') }}</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ isset($product) ? $product->nama : old('nama') }}" placeholder="{{ __('Nama') }}" required />
            @error('nama')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="harga">{{ __('Harga') }}</label>
            <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ isset($product) ? $product->harga : old('harga') }}" placeholder="{{ __('Harga') }}" required />
            @error('harga')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    @isset($product)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($product->photo == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Photo" class="rounded mb-2 mt-2" alt="Photo" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/photos/' . $product->photo) }}" alt="Photo" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
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
            <label for="keterangan">{{ __('Keterangan') }}</label>
            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="{{ __('Keterangan') }}" required>{{ isset($product) ? $product->keterangan : old('keterangan') }}</textarea>
            @error('keterangan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="categoryproducts-id">{{ __('Categoryproduct') }}</label>
            <select class="form-select @error('categoryproducts_id') is-invalid @enderror" name="categoryproducts_id" id="categoryproducts-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select categoryproduct') }} --</option>
                
                        @foreach ($categoryproducts as $categoryproduct)
                            <option value="{{ $categoryproduct->id }}" {{ isset($product) && $product->categoryproducts_id == $categoryproduct->id ? 'selected' : (old('categoryproducts_id') == $categoryproduct->id ? 'selected' : '') }}>
                                {{ $categoryproduct->category_name }}
                            </option>
                        @endforeach
            </select>
            @error('categoryproducts_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>