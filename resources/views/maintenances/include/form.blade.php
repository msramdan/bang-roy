<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="instance-id">{{ __('Instance') }}</label>
            <select class="form-select @error('instance_id') is-invalid @enderror" name="instance_id" id="instance-id"
                class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select instance') }} --</option>

                @foreach ($instances as $instance)
                    <option value="{{ $instance->id }}"
                        {{ isset($maintenance) && $maintenance->instance_id == $instance->id ? 'selected' : (old('instance_id') == $instance->id ? 'selected' : '') }}>
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
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">{{ __('Date') }}</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror"
                value="{{ isset($maintenance) && $maintenance->date ? $maintenance->date->format('Y-m-d') : old('date') }}"
                placeholder="{{ __('Date') }}" required />
            @error('date')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="start-time">{{ __('Start Time') }}</label>
            <input type="time" name="start_time" id="start-time"
                class="form-control @error('start_time') is-invalid @enderror"
                value="{{ isset($maintenance) && $maintenance->start_time ? $maintenance->start_time->format('H:i') : old('start_time') }}"
                placeholder="{{ __('Start Time') }}" required />
            @error('start_time')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="end-time">{{ __('End Time') }}</label>
            <input type="time" name="end_time" id="end-time"
                class="form-control @error('end_time') is-invalid @enderror"
                value="{{ isset($maintenance) && $maintenance->end_time ? $maintenance->end_time->format('H:i') : old('end_time') }}"
                placeholder="{{ __('End Time') }}" required />
            @error('end_time')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" id="user-id" readonly>
</div>
