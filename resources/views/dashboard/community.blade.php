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
        <title>Komunitas</title>
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
                <div class="post-status-container">
                    <div class="circle-container">
                        <div class="image-container">
                            <img src="{{ asset('img/profile.png') }}">
                        </div>
                        <div class="animated-border"></div>
                    </div>
                    <div>
                        <a href="{{ url('creategroup') }}"><button class="button confirm">Buat grup baru!</button></a>
                    </div>

                </div>
                <div>
                    @foreach ($grouplist as $group)
                    <div>
                        <h3>{{ $group->group_name }}</h3>
                        <p>{{ $group->total_member }} anggota</p>
                    </div>

                        
                    @endforeach
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





        <script src="{{ asset('js/post.js') }}"></script>
    </body>

</html>
