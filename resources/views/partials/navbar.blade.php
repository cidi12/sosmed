
    <nav>

        <div class="left-section-nav">
            <img src="{{ asset('img/logo.jpg') }}">
            <div class="searchbar-container">
                <label for="searchbar"><i class="fa fa-search"></i></label>
                <input type="search" name="" id="searchbar" placeholder="Cari di Fesnuk">
            </div>

        </div>
        <div class="mid-section-nav">
            <a href="home"><i class="fa fa-home fa-2x button default" id="beranda" onmouseover="hoverFunction()"
                    aria-hidden="true"><span class="popuptext" id="myPopup">Beranda</span></i>
            </a>
            <a href="{{ url('group') }}"><i class="fa fa-users fa-2x button default" id="komunitas" onmouseover="hoverFunction2()"
                    aria-hidden="true"><span class="popuptext" id="myPopup2">Komunitas</span></i>
            </a>

            <i class="fa fa-comments fa-2x button default" id="pesan" onmouseover="hoverFunction4()" aria-hidden="true"><a
                    href=""></a><span class="popuptext" id="myPopup4">Pesan</span></i>
            <i class="fa fa-bell fa-2x button default" id="notifikasi" onmouseover="hoverFunction5()" aria-hidden="true"><a
                    href=""></a><span class="popuptext" id="myPopup5">Notifikasi</span></i>
            <div class="hamburger-menu-container">
                <button id="mobile-menu"> <i class="fa fa-bars fa-2x button default"></i></button>
                <button id="mobile-menu-close"> <i class="fa fa-bars fa-2x button default"></i></button>
            </div>

        </div>

        <div class="right-section-nav">
            <i class="fa fa-shopping-bag fa-2x button default" id="marketplace" onmouseover="hoverFunction3()" aria-hidden="true"><a
                    href=""></a><span class="popuptext" id="myPopup3">Marketplace</span></i>
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
    <div class="hamburger-menu">
        <div class="hamburger-items" id="hamburger-items">
            <div class="searchbar-container">
                <label for="searchbar"><i class="fa fa-search"></i></label>
                <input type="search" name="" id="searchbar" placeholder="Cari di Fesnuk">
            </div>
            <a href="{{ url('profile') }}">Profile</a>
            <a href="">Friend list</a>
            <a href="">Market Place</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>Sign out</button>
            </form>

        </div>
    </div>

