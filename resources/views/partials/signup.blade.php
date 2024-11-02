<header>

    <div class="login-container">
        <div class="logo">
            <img src="{{ asset('img/logo.jpg') }}">
        </div>
        <div class="credential-text">
            <p>Register to Fesnuk!</p>
        </div>

        <form hx-post="register" hx-target="#hx-form" hx-push-url="/">
            @csrf
            <div class="input-login">
                @if (!empty($regErr))
                <div class="error-box"> {{ $regErr }}</div>
            @endif
                <fieldset>
                    <legend>Email</legend>
                    <input type="email" name="regist-email" required>
                </fieldset>
                <fieldset>
                    <legend>Password</legend>
                    <input type="password" name="regist-password" required>
                </fieldset>
                <button class="button-login" type="submit">Register</button>
            </div>
        </form>

        <div class="helper-text">
            <p>Already have an account? <span><a hx-boost="true" href="home">Sign in here</a></span></p>
        </div>



    </div>
</header>
