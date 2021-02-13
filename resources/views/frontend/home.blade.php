@extends('layouts.tropisi')

@section('content')
<style>
section,footer{
    padding : 50px 0px;
}
.parallax img,
.slides img{
    filter : brightness(80%)
}
.carousel-item img{
    width : auto;
    height : 300px;
}
</style>
    @foreach($homes as $home)
    <div class="slider" id="home">
        <ul class="slides">
            <li>
                <img src="{{ asset('asset/ASET/x1/pascal-muller-iSz0IMtulos-unsplash.png') }}">
                <div class="caption left-align">
                    <div class="row">
                        <div class="col m5">
                            <h3>{{ $home->judul }}</h3>
                            <p style="font-weight: 700!important;">{{ $home->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    @endforeach
    
    <!-- about us -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col m6">
                    <strong class="green-text">TENTANG KAMI</strong>
                    @foreach($tntg as $kami)
                    <h3>{{ $kami->judul }}</h3>
                    <p style="font-weight: 700!important;">{{ $kami->deskripsi }}</p>
                    @endforeach
                    <a href="{{ url('/about') }}" class="sidenav-trigger waves-effect waves-light btn green darken-2 button">Baca Selengkapnya<i class="material-icons right">arrow_forward</i></a>
                </div>
                <div class="col m3 light"> 
                    <br>
                    <img src="{{ asset('galery_photo/'.$galeris[3]->gallery_photos) }}" alt="" class="responsive-img materialboxed">
                </div>
                <div class="col m3">
                    <br>
                    <img src="{{ asset('galery_photo/'.$galeris[1]->gallery_photos) }}" alt="" class="responsive-img materialboxed">
                </div>      
                <div class="row">
                    <div class="col m6">
                        <br>
                        <img src="{{ asset('galery_photo/'.$galeris[5]->gallery_photos) }}" alt="" width="100%" height="200px">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Clients -->
    <section>
        <div class="parallax-container">
            <div class="parallax"><img src="{{ asset('asset/ASET/x1/juliana-castro-LdEZjO3wjqQ-unsplash.png') }}"></div>
            <div class="container">
                <h3 class="white-text">Kami Membawa Anda <br> Untuk Mengetahui Lebih Dalam</h3>
                <div class="row">
                    <div class="col m3 s12 center">
                        <div class="card-panel center waves-effect waves-dark">
                            <i class="material-icons medium green-text">pets</i>
                            
                            <h6>Lorem ipsum dolor sit, amet </h6>
                            <p class="grey-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="col m3 s12 center">
                        <div class="card-panel center waves-effect waves-dark">
                            <i class="material-icons medium green-text">pets</i>
                            <h6>Lorem ipsum dolor sit amet,</h6>
                            <p class="grey-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="col m3 s2 center">
                        <div class="card-panel center waves-effect waves-dark">
                            <i class="material-icons medium green-text">pets</i>
                            <h6>Lorem ipsum dolor sit amet,</h6>
                            <p class="grey-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="col m3 s2 center">
                        <div class="card-panel center waves-effect waves-dark">
                            <i class="material-icons medium green-text">pets</i>
                            <h6>Lorem ipsum dolor sit amet,</h6>
                            <p class="grey-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <!-- PortFolio -->
    <section>
        <div class="container">
            <strong class="green-text">BERITA</strong>
            <h3 class="">Baca Berita Terbaru Kami <br> Dalam Tropisianimal</h3>
            <div class="row">
                @foreach($beritas as $berita)
                <div class="col m4 s12">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{ asset('news_photos/'.$berita->news_image) }}" alt="" class="responsive-img materialboxed">
                        </div>
                        <div class="card-content">
                            <h6>{{ $berita->judul }}</h6>
                            <p class="light grey-text darken-2">{{ $berita->deskripsi }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col m11 offset-m1">

                <strong class="green-text">GALERI</strong>
                <h3>Lihat Lebih Banyak Hewan Tropis <br> Pada Galeri Kami</h3>
            </div>
            <div class="carousel">
                <div class="col m10 offset-2">
                    @foreach($galeris as $galeri)
                        <a class="carousel-item" href="#one!"><img src="{{ asset('galery_photo/'.$galeri->gallery_photos) }}" class="responsive-img"></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection