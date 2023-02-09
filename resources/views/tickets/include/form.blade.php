<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="subject">{{ __('Subject') }}</label>
            <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ isset($ticket) ? $ticket->subject : old('subject') }}" placeholder="{{ __('Subject') }}" required />
            @error('subject')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Description') }}" required>{{ isset($ticket) ? $ticket->description : old('description') }}</textarea>
            @error('description')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="device-id">{{ __('Device') }}</label>
            <select class="form-select @error('device_id') is-invalid @enderror" name="device_id" id="device-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select device') }} --</option>
                
                        @foreach ($devices as $device)
                            <option value="{{ $device->id }}" {{ isset($ticket) && $ticket->device_id == $device->id ? 'selected' : (old('device_id') == $device->id ? 'selected' : '') }}>
                                {{ $device->dev_eui }}
                            </option>
                        @endforeach
            </select>
            @error('device_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status">{{ __('Status') }}</label>
            <input type="text" name="status" id="status" class="form-control @error('status') is-invalid @enderror" value="{{ isset($ticket) ? $ticket->status : old('status') }}" placeholder="{{ __('Status') }}" required />
            @error('status')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>