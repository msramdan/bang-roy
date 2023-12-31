<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="{{ __('Name') }}" value="{{ isset($user) ? $user->name : old('name') }}" required
                autofocus>
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" name="email" id="email"
                class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}"
                value="{{ isset($user) ? $user->email : old('email') }}" required>
            @error('email')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <div class="input-group">
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}"
                    {{ empty($user) ? 'required' : '' }}> &nbsp;
                <button class="btn btn-outline-secondary" type="button" onclick="generatePassword()"
                    id="">Generate</button> &nbsp;
                <button class="btn btn-outline-primary" type="button" onclick="toggleShowPassword()" id=""><i
                        class="fa fa-eye"></i></button>
            </div>
            <span style="color:red; font-size:10px">Password should contain at least 8 characters, 1 uppercase, 1
                lowercase, 1 number, and 1 symbol</span>
            @error('password')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
            @isset($user)
                <div id="passwordHelpBlock" class="form-text">
                    {{ __('Leave the password & password confirmation blank if you don`t want to change them.') }}
                </div>
            @endisset
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="password-confirmation">{{ __('Password Confirmation') }}</label>
            <input type="password" name="password_confirmation" id="password-confirmation" class="form-control"
                placeholder="{{ __('Password Confirmation') }}" {{ empty($user) ? 'required' : '' }}>
        </div>
    </div>

    @empty($user)
        <div class="col-md-6">
            <div class="form-group">
                <label for="role">{{ __('Role') }}</label>
                <select class="form-select" name="role" id="role" class="form-control" required>
                    <option value="" selected disabled>-- Select role --</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                    @error('role')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="avatar">{{ __('Avatar') }}</label>
                <input type="file" name="avatar" id="avatar"
                    class="form-control @error('avatar') is-invalid @enderror">
                @error('avatar')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
    @endempty

    @isset($user)
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="role">{{ __('Role') }}</label>
                    <select class="form-select" name="role" id="role" class="form-control" required>
                        <option value="" selected disabled>{{ __('-- Select role --') }}</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ $user->getRoleNames()->toArray() !== [] && $user->getRoleNames()[0] == $role->name ? 'selected' : '-' }}>
                                {{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-1 text-center">
                <div class="avatar avatar-xl">
                    @if ($user->avatar == null)
                        <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($user->email))) }}&s=500"
                            alt="avatar">
                    @else
                        <img src="{{ asset("uploads/images/avatars/$user->avatar") }}" alt="avatar">
                    @endif
                </div>
            </div>

            <div class="col-md-5 me-0 pe-0">
                <div class="form-group">
                    <label for="avatar">{{ __('Avatar') }}</label>
                    <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror"
                        id="avatar">
                    @error('avatar')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    @if ($user->avatar == null)
                        <div id="passwordHelpBlock" class="form-text">
                            {{ __('Leave the avatar blank if you don`t want to change it.') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endisset
</div>

@push('js')
    <script>
        function toggleShowPassword() {
            const type = $('input#password').attr('type');
            if (type === "password") {
                $('input#password').attr('type', 'text');
                $('input#password-confirmation').attr('type', 'text');
            } else {
                $('input#password').attr('type', 'password');
                $('input#password-confirmation').attr('type', 'password');
            }
        }

        function generatePassword() {
            let password = "";
            let passwordLength = 1;

            const lowerCase = 'abcdefghijklmnopqrstuvwxyz'
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * lowerCase.length);
                password += lowerCase.substring(randomNumber, randomNumber + 1);
            }

            passwordLength = 1;
            const number = '0123456789'
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * number.length);
                password += number.substring(randomNumber, randomNumber + 1);
            }

            passwordLength = 1;
            const upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * upperCase.length);
                password += upperCase.substring(randomNumber, randomNumber + 1);
            }

            passwordLength = 1;
            const character = '!@#$%^&*()'
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * character.length);
                password += character.substring(randomNumber, randomNumber + 1);
            }

            const allChars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            passwordLength = 4;
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * allChars.length);
                password += allChars.substring(randomNumber, randomNumber + 1);
            }

            const shuffled = password.split('').sort(function() {
                return 0.5 - Math.random()
            }).join('');
            $('input#password').val(shuffled);
            $('input#password').attr('type', 'text')

            $('input#password-confirmation').val(shuffled);
            $('input#password-confirmation').attr('type', 'text')
        }
    </script>
@endpush
