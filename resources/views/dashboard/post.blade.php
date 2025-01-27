<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/post.css') }}">
        <link rel="stylesheet" href="{{ asset('icon/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/mediaquerypost.css') }}">
        <script src="{{ asset('js/htmx.min.js') }}"></script>
        <title>Dashboard</title>
    </head>

    <body>

        <header>
            @include('partials.navbar')
        </header>
        <main>
            <div class="left-section-body">
                <div class="upper-left-container">

                </div>
            </div>
            <div class="mid-section-body" id="post-detail">

                <div class="create-post-container">
                    <form action="post" method="POST">
                        @csrf
                        <label for="post-content">Tuliskan Ceritamu!</label>
                        <input class="input" type="text" name="post-title" placeholder="Judul Postingan">

                        <textarea class="txtarea input" name="post-content" id="post-input"></textarea>
                        <button class="button confirm" type="submit">Post</button>


                    </form>
                </div>

            </div>

            </div>
            <div class="right-section-body">
                <div class="upper-right-container">

                </div>
            </div>
        </main>
        {{-- <div>
  Halo {{ Auth::user()->email }}
    </div> --}}




        <script src="{{ asset('js/navburger.js') }}"></script>

    </body>

</html>
