<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>Register</title>
    </head>

    <body class="credential-layout">
        <header>
            <div class="login-container">
                <div class="logo">
                    <img src="{{ asset('img/logo.jpg') }}">
                </div>
                <div class="credential-text">
                    <p>Register to Fesnuk!</p>
                </div>

                <form action="">
                    <div class="input-login">
                        <fieldset>
                            <legend>Email</legend>
                            <input type="text" required>
                        </fieldset>
                        <fieldset>
                            <legend>Password</legend>
                            <input type="password" required>
                        </fieldset>
                        <button class="button-login" type="submit">Regist</button>
                    </div>
                </form>
                <div class="helper-text">
                    <p>Already have an account? <span><a href="home">Sign in here</a></span></p>
                </div>
                


            </div>
        </header>
    </body>

</html>
