<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('icon/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/mediaquerydashboard.css') }}">
        <script src="{{ asset('js/htmx.min.js') }}"></script>
        <title>View Profile</title>
    </head>

    <body>

        <header>
            <nav>
                <div class="left-section-nav">
                    <img src="{{ asset('img/logo.jpg') }}">
                    <div class="searchbar-container">
                        <label for="searchbar"><i class="fa fa-search"></i></label>
                        <input type="search" name="" id="searchbar" placeholder="Cari di Fesnuk">
                    </div>

                </div>
                <div class="mid-section-nav">
                    <a href="/"><i class="fa fa-home fa-2x" id="beranda" onmouseover="hoverFunction()"
                            aria-hidden="true"><span class="popuptext" id="myPopup">Beranda</span></i>
                    </a>
                    <i class="fa fa-users fa-2x" id="komunitas" onmouseover="hoverFunction2()" aria-hidden="true"><a
                            href=""></a><span class="popuptext" id="myPopup2">Komunitas</span></i>
                    <i class="fa fa-comments fa-2x" id="pesan" onmouseover="hoverFunction4()" aria-hidden="true"><a
                            href=""></a><span class="popuptext" id="myPopup4">Pesan</span></i>
                    <i class="fa fa-bell fa-2x" id="notifikasi" onmouseover="hoverFunction5()" aria-hidden="true"><a
                            href=""></a><span class="popuptext" id="myPopup5">Notifikasi</span></i>
                    <div class="hamburger-menu-container">
                        <button id="mobile-menu"> <i class="fa fa-bars fa-2x"></i></button>
                        <button id="mobile-menu-close"> <i class="fa fa-bars fa-2x"></i></button>

                    </div>

                </div>
                <div class="hamburger-items" id="hamburger-items">
                    <div class="searchbar-container">
                        <label for="searchbar"><i class="fa fa-search"></i></label>
                        <input type="search" name="" id="searchbar" placeholder="Cari di Fesnuk">
                    </div>
                    <a href="">Profile</a>
                    <a href="">Friend list</a>
                    <a href="">Market Place</a>
                    <form action="logout" method="POST">
                        @csrf
                        <button>Sign out</button>
                    </form>

                </div>
                <div class="right-section-nav">
                    <i class="fa fa-shopping-bag fa-2x" id="marketplace" onmouseover="hoverFunction3()"
                        aria-hidden="true"><a href=""></a><span class="popuptext"
                            id="myPopup3">Marketplace</span></i>

                    <button id="web-menu">
                        <div class="circle-container">
                            <div class="image-container">
                                <img src="{{ asset('img/profile.png') }}">

                            </div>
                            <div class="animated-border">

                            </div>

                        </div>
                    </button>
                    <button id="web-menu-close">
                        <div class="circle-container">
                            <div class="image-container">
                                <img src="{{ asset('img/profile.png') }}">

                            </div>
                            <div class="animated-border">

                            </div>

                        </div>
                    </button>


                    {{-- <form action="logout" method="post">
                    @csrf
                     <button type="submit" >Log out</button>
                </form> --}}
                </div>



            </nav>
        </header>
        <main>
            <div class="left-section-body">
                <div class="upper-left-container">

                </div>
            </div>
            <div class="mid-section-body" id="post-detail">
                @foreach ($posts as $post)
                    <div class="post-list">

                        {{-- </div> --}}
                        <div class="post-detail">
                            <b>
                                <p>{{ $post->username }}</p>
                            </b>
                            <p>{{ $post->post_title }}</p>
                            <p>{{ $post->post_content }}</p>

                            <div class="comment-section" id="comment-detail-{{ $post->id }}">
                                <div class="interaction-button" id="interaction-detail-{{ $post->id }}">
                                    <div class="like">

                                        <form hx-post="like/{{ $post->id }}"
                                            hx-target="#interaction-detail-{{ $post->id }}">
                                            @csrf

                                            @foreach ($likes as $like)
                                                @if ($like->likes == 'false' && $like->post_id == $post->id)
                                                    <button type="submit" class="interaction-button-detail"><i
                                                            class="fa-regular fa-thumbs-up fa-2x"></i></button>
                                                @elseif ($like->likes == 'true' && $like->post_id == $post->id)
                                                    <button type="submit" class="interaction-button-detail"><i
                                                            class="fa-solid fa-thumbs-up fa-2x"></i></button>
                                                @endif
                                            @endforeach
                                            <button type="submit"><i
                                                    class="fa-regular fa-thumbs-up fa-2x"></i></button>
                                        </form>
                                        <p>{{ $post->likes }}</p>
                                    </div>
                                    <div class="dislike">
                                        <form hx-post="dislike/{{ $post->id }}"
                                            hx-target="#interaction-detail-{{ $post->id }}">
                                            @csrf
                                            @foreach ($likes as $like)
                                                @if ($like->dislikes == 'false' && $like->post_id == $post->id)
                                                    <button type="submit" class="interaction-button-detail"><i
                                                            class="fa-regular fa-thumbs-down fa-2x"></i></button>
                                                @elseif ($like->dislikes == 'true' && $like->post_id == $post->id)
                                                    <button type="submit" class="interaction-button-detail"><i
                                                            class="fa-solid fa-thumbs-down fa-2x"></i></button>
                                                @endif
                                            @endforeach
                                            <button type="submit"><i
                                                    class="fa-regular fa-thumbs-down fa-2x"></i></button>
                                        </form>
                                        <p>{{ $post->dislikes }}</p>
                                    </div>
                                    <div class="share">
                                        <i class="fa-solid fa-share"></i>
                                        <p>{{ $post->shares }}</p>
                                    </div>
                                    <p> {{ $post->total_comment }} komentar</p>
                                </div>

                                <div class="comment-list">
                                    @foreach ($comments as $comment)
                                        <b>
                                            <p>{{ $comment->commenter }}</p>
                                        </b>
                                        <p>{{ $comment->comment }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="add-comment-container">
                                <form hx-post="comment/{{ $post->id }}"
                                    hx-target="#comment-detail-{{ $post->id }}">
                                    @csrf
                                    {{-- <input name="post_id" value="{{ $posts->id }}"> --}}
                                    <input name="comment" type="text">
                                    <button type="submit">Send</button>
                                </form>

                            </div>
                        </div>


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






    </body>

</html>
