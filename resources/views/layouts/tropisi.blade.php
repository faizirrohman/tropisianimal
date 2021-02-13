<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TROPISIANIMAL</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/icon/icon.jpg')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <!-- navbar -->
    <div class="navbar-fixed">
        <nav class="teal accent-4">
          <div class="container">
              <div class="nav-wrapper">
                    <a href="#home" class="brand-logo"><img src="{{ asset('asset/ASET/x1/Tropisianimal.png') }}"></a>
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">more_vert</i></a>
                    <ul class="right hide-on-med-and-down navs">
                        <li><a href="{{ url('/homes')}} ">HOME</a></li>
                        <li><a href="{{ url('/about') }}">TENTANG</a></li>
                        <li><a href="{{ url('/news') }}">BERITA</a></li>
                        <li><a href="{{ url('/gallery') }}">GALERI</a></li>
                        <li><a href="{{ url('/contact') }}">KONTAK</a></li>
                    </ul>
                </div>
            </div>
        </nav>
      </div>
       <!-- sidebar -->
    <ul class="sidenav" id="mobile-nav">
        <li><a href="{{ url('/homes') }}">HOME</a></li>
        <li><a href="{{ url('/about') }}">TENTANG</a></li>
        <li><a href="{{ url('/news') }}">BERITA</a></li>
        <li><a href="{{ url('/gallery') }}">GALERI</a></li>
        <li><a href="{{ url('/contact') }}">KONTAK</a></li>
    </ul>

    <!-- slider -->
    @yield('content')
    
    <footer class="grey darken-4 white-text">
        <div class="container">
        <div class="row">
            <div class="col m3 offset-m1">
                <h6>Tropisianimal</h6>
                <p class="light grey-text darken-2">
                    Dalam membangun komunitas animal tentunya kita harus mempunya skill dalam pemeliharaan hewan-hewan.
                </p>
                <img src="{{ asset('asset/ASET/x1/001-facebook.png') }}" alt="">
                <img src="{{ asset('asset/ASET/x1/002-twitter.png') }}" alt="">
            </div>
            
            <div class="col m2">
                <h6>Useful links</h6>
                <ul class="list">
                    <li><a href=""><strong class="white-text">Blog</strong></a></li>
                    <li><a href=""><strong class="white-text">Hewan</strong></a></li>
                    <li><a href=""><strong class="white-text">Galeri</strong></a></li>
                    <li><a href=""><strong class="white-text">Testimonial</strong></a></li>
                </ul>
            </div>
            <div class="col m2">
            <h6>Privacy</h6>
                <ul class="list">
                    <li><a href=""><strong class="white-text">Karir</strong></a></li>
                    <li><a href=""><strong class="white-text">Tentang Kami</strong></a></li>
                    <li><a href=""><strong class="white-text">Kontak Kami</strong></a></li>
                    <li><a href=""><strong class="white-text">Servis</strong></a></li>
                </ul>
            </div>
            <div class="col m2">
                <h6>Contact</h6>
                <ul class="list">
                    <li><a href=""><strong class="white-text">faizirrohman8@gmail.com</strong></a></li>
                    <li><a href=""><strong class="white-text">081553196045</strong></a></li>
                    <li><a href=""><strong class="white-text">Kota Bogor</strong></a></li>
                </ul>
            </div>
        </div>
        <div class="row center">
            <div class="col m12">
                <strong>Copyright 2020 All rights reserved</strong>
            </div>
        
        </div>
        </div>
    </footer>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
