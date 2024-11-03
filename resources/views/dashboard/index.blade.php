<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                <i class="fa fa-home fa-2x" aria-hidden="true"><a href=""></a></i>
                <i class="fa fa-users fa-2x" aria-hidden="true"><a href=""></a></i>
                <i class="fa fa-shopping-bag fa-2x" aria-hidden="true"><a href=""></a></i>
                
            </div>
            <div class="right-section">
                <i class="fa fa-comments fa-2x" aria-hidden="true">   <a href=""></a></i>
                <i class="fa fa-bell fa-2x" aria-hidden="true"> <a href=""></a></i>
                <img src="{{ asset('img/profile.png') }}">
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
  
   

    

   
</body>
</html>