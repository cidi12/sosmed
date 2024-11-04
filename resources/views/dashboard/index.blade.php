<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/mediaquerydashboard.css') }}">
        <title>Dashboard</title>
    </head>

    <body>

        <header>
            <nav>
                <div class="left-section">
                    <img src="{{ asset('img/logo.jpg') }}">
                    <div class="searchbar-container">
                        <label for="searchbar"><i class="fa fa-search"></i></label>
                        <input type="search" name="" id="searchbar" placeholder="Cari di Fesnuk">
                    </div>

                </div>
                <div class="mid-section">
                    <i class="fa fa-home fa-2x" id="beranda" onmouseover="hoverFunction()" aria-hidden="true"><a
                            href=""></a><span class="popuptext" id="myPopup">Beranda</span></i>

                    <i class="fa fa-users fa-2x" id="komunitas" onmouseover="hoverFunction2()" aria-hidden="true"><a
                        href=""></a><span class="popuptext" id="myPopup2">Komunitas</span></i>

                    <i class="fa fa-shopping-bag fa-2x" id="marketplace" onmouseover="hoverFunction3()" aria-hidden="true"><a
                        href=""></a><span class="popuptext" id="myPopup3">Marketplace</span></i>
                    
                        <i class="fa fa-bell fa-2x" id="notifikasi" onmouseover="hoverFunction5()" aria-hidden="true"><a
                            href=""></a><span class="popuptext" id="myPopup5">Notifikasi</span></i>

                </div>
                <div class="right-section">
                    <i class="fa fa-comments fa-2x" id="pesan" onmouseover="hoverFunction4()" aria-hidden="true"><a
                        href=""></a><span class="popuptext" id="myPopup4">Pesan</span></i>

                   
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
        {{-- <div>
  Halo {{ Auth::user()->email }}
    </div> --}}




     <script src="{{ asset('js/dashboard.js') }}"></script>

    </body>

</html>
