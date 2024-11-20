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
        <title>Dashboard</title>
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
                    <a  href="home"><i class="fa fa-home fa-2x" id="beranda" onmouseover="hoverFunction()"
                            aria-hidden="true"><span class="popuptext" id="myPopup">Beranda</span></i>
                    </a>
                    <i class="fa fa-users fa-2x" id="komunitas" onmouseover="hoverFunction2()" aria-hidden="true"><a
                            href=""></a><span class="popuptext" id="myPopup2">Komunitas</span></i>
                    <i class="fa fa-comments fa-2x" id="pesan" onmouseover="hoverFunction4()" aria-hidden="true"><a
                            href=""></a><span class="popuptext" id="myPopup4">Pesan</span></i>
                    <i class="fa fa-bell fa-2x" id="notifikasi" onmouseover="hoverFunction5()" aria-hidden="true"><a
                            href=""></a><span class="popuptext" id="myPopup5">Notifikasi</span></i>
                    <div class="hamburger-menu">
                        <button id="mobile-menu"> <i class="fa fa-bars fa-2x"></i></button>
                        <button id="mobile-menu-close"> <i class="fa fa-bars fa-2x"></i></button>
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
                    </div>

                </div>
                <div class="right-section-nav">
                    <i class="fa fa-shopping-bag fa-2x" id="marketplace" onmouseover="hoverFunction3()"
                        aria-hidden="true"><a href=""></a><span class="popuptext"
                            id="myPopup3">Marketplace</span></i>

                    <div class="circle-container">
                        <div class="image-container">
                            <img src="{{ asset('img/profile.png') }}">
                        </div>
                        <div class="animated-border"></div>

                    </div>

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
                    <b>Trending hari ini</b>
                    <hr>
                    <div class="trending-list">
                        @foreach ($trendings as $trending)
                            <a href="">{{ $trending->post_title }} <i class="fa-solid fa-fire"></i></a>
                        @endforeach

                    </div>
                    <br>
                    <b>Pintasan Grup</b>
                    <hr>
                    <div class="group-list">
                        <a href="">Ingin Menjadi Programmer Handal Namun Enggan Ngoding</a>
                        <a href="">Javascript Bahasa Tol...</a>
                        <a href="">PHP Bahasa Dewa</a>
                        <a href="">Komunitas Orang Susah (KOS-BADAK)</a>
                        <a href="">IMMORTAL FISH (REBORN)</a>
                    </div>
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
                        <a href="post"><button>Tuliskan sesuatu yang menarik !</button></a>
                    </div>
                    <div>
                        <i class="fa-regular fa-image fa-2x"></i>
                    </div>
                </div>
                <div class="post-list">
                    @foreach ($posts as $post)
                        <div class="post-detail">
                            <b>
                                <p>{{ $post->username }}</p>
                            </b>
                        </div>
                        <div class="post-detail">
                            <p>{{ $post->post_title }}</p>
                            <p>{{ $post->post_content }}</p>

                            <div class="comment-section" id="comment-detail-{{ $post->id }}">
                                <div class="interaction-button" id="interaction-detail-{{ $post->id }}">
                                    <div class="like">

                                        <form hx-post="like/{{ $post->id }}"
                                            hx-target="#interaction-detail-{{ $post->id }}">
                                            @csrf
                                            {{-- <button type="submit"><i
                                                class="fa-regular fa-thumbs-up fa-2x"></i></button> --}}
                                            {{-- @foreach ($likes as $like)
                                                @if ($like->likes == 'false' && $like->post_id == $post->id)
                                                    <button type="submit"><i
                                                            class="fa-regular fa-thumbs-up fa-2x"></i></button>
                                                @elseif ($like->likes == 'true' && $like->post_id == $post->id)
                                                    <button type="submit"><i
                                                            class="fa-solid fa-thumbs-up fa-2x"></i></button>
                                                
                                                @endif

                                            @endforeach --}}
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
                                <p>Komentar</p>
                                <div class="comment-list">
                                    <b>
                                        <p> {{ $post->post_commenter }}</p>
                                    </b>
                                    <p>{{ $post->post_comment }} </p>
                                </div>
                            </div>
                            <div class="add-comment-container">
                                <form hx-post="comment/{{ $post->id }}"
                                    hx-target="#comment-detail-{{ $post->id }}">
                                    @csrf
                                    {{-- <input name="post_id" value="{{ $post->id }}"> --}}
                                    <input name="comment" type="text">
                                    <button type="submit">Send</button>
                                </form>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>

            </div>
            <div class="right-section-body">
                <div class="upper-right-container">
                    <b>Permintaan pertemanan</b>
                    <hr>
                    <div class="friend-request">
                        <a href="">Kucing</a>
                        <a href="">Presiden</a>
                        <a href="">Kambing</a>
                        <a href="">Wowo</a>
                        <a href="">Bobi de cat</a>
                        <a href="">Keledais</a>
                        <a href="">Kucing tampan</a>
                    </div>
                    <br>
                    <b>Pertemanan</b>
                    <hr>
                    <div class="friend-list">
                        <a href="">Kudaeee</a>
                        <a href="">Presiden RI</a>
                        <a href="">Kambing jantansss</a>
                        <a href="">Si Bolang</a>
                        <a href="">Bobi kartanagara</a>
                        <a href="">Jardeen</a>
                        <a href="">Kucing Pemberani</a>
                    </div>
                </div>
            </div>
        </main>
        {{-- <div>
  Halo {{ Auth::user()->email }}
    </div> --}}




        <script src="{{ asset('js/dashboard.js') }}"></script>

    </body>

</html>
