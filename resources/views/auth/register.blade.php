@include('components.auth-components.header')
    <section class="login-title">
        <h1 class="title-clinic">CLINIC MANAGEMENT SYSTEM</h1>

        <div class="auth-form">
            <div class="form-title">
                <h2 class="text">{{ __('Register') }}</h2>
            </div>
            <form class="form" action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group">
                   <input id="name" type="text" placeholder="Full Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  autofocus>
                     @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  autofocus>
                     @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="phone" type="text" placeholder="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required  autofocus>
                    <span id="valid-msg" class="hide">✓ Valid</span>
                    <span id="error-msg" class="hide"></span>
                     @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required >
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required >
                   
                </div>
                <div class="form-group">
                    <button type="submit" id="submit" class="btn btn-primary btn-lg btn-block">
                        {{ __('Register') }}
                    </button>
                </div>
                <div class="form-group">
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </div>
            </form>
        </div>
    </section>

    @include('components.auth-components.footer')


