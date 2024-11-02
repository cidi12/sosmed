<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="{{ asset('js/htmx.min.js') }}"></script>
        <title>Login</title>
    </head>

    <body class="credential-layout">

        <header>
            <div class="login-container">
                <div class="logo">
                    <img src="{{ asset('img/logo.jpg') }}">
                </div>
                <div class="credential-text">
                    <p>Welcome to Fesnuk!</p>
                </div>

                <form action="login" method="post">
                    @csrf
                    <div class="input-login">
                        @if (!empty($regSucc))
                            <div class="success-box"> {{ $regSucc }}</div>
                        @endif
                        <fieldset>
                            <legend>Email</legend>
                            <input type="email" name="login-email" required>
                        </fieldset>
                        <fieldset>
                            <legend>Password</legend>
                            <input type="password" name="login-password" required>
                        </fieldset>
                        <button class="button-login" type="submit">Sign in</button>
                    </div>
                </form>
                <div class="helper-text">
                    <p>Don't have account? <span><a hx-boost="true" href="signup">register here</a></span></p>
                </div>



            </div>
        </header>
    </body>

</html>
