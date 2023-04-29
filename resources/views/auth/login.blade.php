@include('components.auth-components.header')
    <section class="login-title">
        <h1 class="title-clinic">CLINIC MANAGEMENT SYSTEM</h1>

        <div class="auth-form">
            <div class="form-title">
                <h2 class="text">{{ __('Login') }}</h2>
            </div>
            <form class="form" action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                     @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-check" @style('text-align:left')>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" id="submit" class="btn btn-primary btn-lg btn-block">
                        {{ __('Login') }}
                    </button>
                </div>
                <div class="form-group">
                    <a href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </section>

@include('components.auth-components.footer')