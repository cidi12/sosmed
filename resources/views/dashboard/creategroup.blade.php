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
            <nav>
                <div class="left-section-nav">
                    <img src="{{ asset('img/logo.jpg') }}">
                    <div class="searchbar-container">
                        <label for="searchbar"><i class="fa fa-search"></i></label>
                        <input type="search" name="" id="searchbar" placeholder="Cari di Fesnuk">
                    </div>

                </div>
                <div class="mid-section-nav">
                    <a href="home"><i class="fa fa-home fa-2x" id="beranda" onmouseover="hoverFunction()"
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
                    <a href="{{ url('profile') }}">Profile</a>
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
                
                <div class="create-post-container">
                    <form action="{{ url('makeGroup') }}" method="POST">
                        @csrf
                   
                            <input type="text" name="group-title" placeholder="Nama Grupmu">
                        <label for="group-description">Deskripsi grup</label>
                            <textarea name="group-description" id="group-description" cols="50" rows="10"></textarea>
                            <button type="submit">Post</button>
                     

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




        <script src="{{ asset('js/post.js') }}"></script>

    </body>

</html>
