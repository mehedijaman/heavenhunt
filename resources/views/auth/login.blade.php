@include('/layouts/head')

<!-- Login section start -->
<div class="login-section">
    <div class="form-content-box">
        <!-- details -->
        <div class="details">
            <div class="logo">
                <a href="/">
                    <img src="/img/logos/logo.png" alt="logo">
                </a>
            </div>
            <div class="clearfix"></div>
            <h3>Sign into your account</h3>
            <form method="POST" action="{{ route('login') }}">
                        @csrf
                <div class="form-group">
                    <input id="email" type="email" class="input-text form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="input-text form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="checkbox">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">

                    <button type="submit" class="button-md button-theme btn-block">
                        {{ __('Login') }}
                    </button>

                    
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Login section end -->
