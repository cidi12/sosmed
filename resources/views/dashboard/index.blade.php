<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('icon/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/mediaquerydashboard.css') }}">
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
                    <i class="fa fa-home fa-2x" id="beranda" onmouseover="hoverFunction()" aria-hidden="true"><a
                            href=""></a><span class="popuptext" id="myPopup">Beranda</span></i>

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
                            <a href="">Sign out</a>
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
                <p>left</p>
            </div>
            <div class="mid-section-body">
                <div class="post-status-container">
                    <div class="circle-container">
                        <div class="image-container">
                            <img src="{{ asset('img/profile.png') }}">
                        </div>
                        <div class="animated-border"></div>

                    </div>
                    <div>
                        <button>Tuliskan sesuatu yang menarik !</button>
                    </div>
                    <div>
                        <i class="fa-regular fa-image fa-3x"></i>
                    </div>
                </div>
                <div class="post-list">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At nulla vero ipsum dolorem ad, cumque perspiciatis neque voluptate laudantium quasi provident praesentium autem quisquam necessitatibus culpa laborum odit alias adipisci cum eveniet. Commodi porro omnis modi maiores culpa adipisci error officia harum quae alias fuga corrupti cupiditate repellat quia, dolores qui molestiae animi laboriosam facere. Atque praesentium animi, nobis omnis aperiam quas debitis magni accusamus ea vero consequuntur? Ab deleniti quas, nobis ducimus iste autem laudantium illo, vel aperiam quos culpa earum sed doloremque maiores reprehenderit beatae, consequuntur quibusdam ea enim numquam quaerat. Facere quam error repudiandae eos obcaecati provident!</p>
                </div>
            </div>
            <div class="right-section-body">
                <p>right</p>
            </div>
        </main>
        {{-- <div>
  Halo {{ Auth::user()->email }}
    </div> --}}




        <script src="{{ asset('js/dashboard.js') }}"></script>

    </body>

</html>
