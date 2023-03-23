<div class="row mb-2">
    <div class="col-md-12">
        <div class="form-group">
            <label for="instance-id">{{ __('Branch') }}</label>
            <select class="form-select @error('instance_id') is-invalid @enderror" name="instance_id" id="instance-id"
                class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select branch') }} --</option>

                @foreach ($instances as $instance)
                    <option value="{{ $instance->id }}"
                        {{ isset($cluster) && $cluster->instance_id == $instance->id ? 'selected' : (old('instance_id') == $instance->id ? 'selected' : '') }}>
                        {{ $instance->instance_name }}
                    </option>
                @endforeach
            </select>
            @error('instance_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="cluster-kode">{{ __('Cluster Kode') }}</label>
            <input type="text" name="cluster_kode" id="cluster-kode"
                class="form-control @error('cluster_kode') is-invalid @enderror"
                value="{{ isset($cluster) ? $cluster->cluster_kode : old('cluster_kode') }}"
                placeholder="{{ __('Cluster Kode') }}" required />
            @error('cluster_kode')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="cluster-name">{{ __('Cluster Name') }}</label>
            <input type="text" name="cluster_name" id="cluster-name"
                class="form-control @error('cluster_name') is-invalid @enderror"
                value="{{ isset($cluster) ? $cluster->cluster_name : old('cluster_name') }}"
                placeholder="{{ __('Cluster Name') }}" required />
            @error('cluster_name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>
