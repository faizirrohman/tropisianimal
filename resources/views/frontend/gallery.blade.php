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
                    <h3>Galeri</h3>
                </div>
            </li>
        </ul>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col m12">
                    <img src="{{ asset('galery_photo/'.$galerys[0]->gallery_photos) }}" width="100%" height="350">
                </div>
            </div>
            <div class="row">
                <?php $i = 0; ?>
                @foreach($galerys as $galery)
                    @if ($i % 2 == 0)
                    <div class="col m3">
                        <img src="{{ asset('galery_photo/'.$galery->gallery_photos) }}" class="responsive-img materialboxed">
                    </div>
                    @endif
                    <?php $i++; ?>
                @endforeach
            </div>
            <div class="row">
                <?php $i = 0; ?>
                @foreach($galerys as $galery)
                    @if ($i % 2 == 1)
                    <div class="col m3">
                        <img src="{{ asset('galery_photo/'.$galery->gallery_photos) }}" class="responsive-img materialboxed">
                    </div>
                    @endif
                    <?php $i++; ?>
                @endforeach
            </div>
            <div class="row">
                <?php $i = 0; ?>
                @foreach($galerys as $galery)
                    @if ($i % 2 == 3)
                    <div class="col m3">
                        <img src="{{ asset('galery_photo/'.$galery->gallery_photos) }}" class="responsive-img materialboxed">
                    </div>
                    @endif
                    <?php $i++; ?>
                @endforeach
            </div>
        </div>
    </section>
    <script>
        let slider1 = document.querySelector('.slider1');
        M.Slider.init(slider1,{
        });
    </script>
@endsection