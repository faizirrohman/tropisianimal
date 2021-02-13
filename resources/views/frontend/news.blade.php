@extends('layouts.tropisi')
@section('content')
<style>
section,
footer{
    padding : 50px 0px;
}
.slides img{
    filter : brightness(50%)
}
</style>
    <div class="slider" id="home">
        <ul class="slides">
            <li>
                <img src="{{ asset('asset/ASET/x1/pascal-muller-iSz0IMtulos-unsplash.png') }}">
                <div class="caption left-align">
                    <h3>Berita</h3>
                </div>
            </li>
        </ul>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col m3">
                    <img src="{{ asset('galery_photo/'.$galeris[0]->gallery_photos) }}" width="100%" height="330px">
                </div>
                <div class="col m3">
                    <img src="{{ asset('galery_photo/'.$galeris[2]->gallery_photos) }}" class="responsive-img materialboxed">
                    <br>
                    <img src="{{ asset('galery_photo/'.$galeris[4]->gallery_photos) }}" class="responsive-img materialboxed">
                </div>
                <div class="col m6">
                    <h3>{{ $news[0]->judul }}</h3>
                    <p>{{ $news[0]->deskripsi }}</p>
                    <a href="#" data-target="slide-out" class="sidenav-trigger waves-effect waves-light btn green">Lihat Selengkapnya<i class="material-icons right">arrow_forward</i></a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <h3>Berita Lainnya</h3>
            
            <div class="row">
                @foreach($news as $berita)
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
@endsection