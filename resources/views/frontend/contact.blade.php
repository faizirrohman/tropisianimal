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
                    <h3>Kontak Kami</h3>
                </div>
            </li>
        </ul>
    </div>

    <section>
        <div class="maps-responsive">
            <div class="container">
                <div class="row">
                    <div class="col m12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0134284858063!2d106.84164251449721!3d-6.645253366809587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c89505b4c37d%3A0x307fc4a38e65fa2b!2sSMK%20Wikrama%20Bogor!5e0!3m2!1sid!2sid!4v1604720409020!5m2!1sid!2sid" width="910" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        <!-- <img src="{{ asset('asset/ASET/x1/1_qYUvh-EtES8dtgKiBRiLsA.png') }}" class="responsive-img"> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="maps-responsive">
            <div class="container">
                <h3>Contact Us</h3>
                <div class="row">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="/contact" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col m6">
                            <div class="card-panel">
                                <div class="input-field">
                                    <input type="text" name="nama" id="nama" class="materialize-textarea validate" required>
                                    <label for="nama">Nama</label>
                                </div>
                            </div>
                        </div>
                        <div class="col m6">
                            <div class="card-panel">
                                <div class="input-field">
                                    <input type="email" name="email" id="email" class="materialize-textarea validate" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="col m6">
                            <div class="card-panel">
                                <div class="input-field">
                                    <input type="text" name="phone" id="phone" class="materialize-textarea validate" required>
                                    <label for="phone">Phone</label>
                                </div>
                            </div>
                        </div>
                        <div class="col m6">
                            <div class="card-panel">
                                <div class="input-field">
                                    <input type="text" name="pesan" id="message" class="materialize-textarea validate" required>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                        </div>
                        <div class="col m6">
                            <button class="btn blue darken-2">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection