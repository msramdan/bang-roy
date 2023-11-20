<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="link-facebook">{{ __('Link Facebook') }}</label>
            <input type="text" name="link_facebook" id="link-facebook" class="form-control @error('link_facebook') is-invalid @enderror" value="{{ isset($social) ? $social->link_facebook : old('link_facebook') }}" placeholder="{{ __('Link Facebook') }}" />
            @error('link_facebook')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="link-instagram">{{ __('Link Instagram') }}</label>
            <input type="text" name="link_instagram" id="link-instagram" class="form-control @error('link_instagram') is-invalid @enderror" value="{{ isset($social) ? $social->link_instagram : old('link_instagram') }}" placeholder="{{ __('Link Instagram') }}" />
            @error('link_instagram')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="link-youtube">{{ __('Link Youtube') }}</label>
            <input type="text" name="link_youtube" id="link-youtube" class="form-control @error('link_youtube') is-invalid @enderror" value="{{ isset($social) ? $social->link_youtube : old('link_youtube') }}" placeholder="{{ __('Link Youtube') }}" />
            @error('link_youtube')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="link-twitter">{{ __('Link Twitter') }}</label>
            <input type="text" name="link_twitter" id="link-twitter" class="form-control @error('link_twitter') is-invalid @enderror" value="{{ isset($social) ? $social->link_twitter : old('link_twitter') }}" placeholder="{{ __('Link Twitter') }}" />
            @error('link_twitter')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>