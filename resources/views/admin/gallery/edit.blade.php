@extends('layouts.admin')
@section('content')
<div class="content">
      <div class="container-fluid">
            <div class="row">
                  <div class="col-lg-10 col-sm-12 col-md-9 offset-1">
                        <div class="card">
                              <div class="modal-header">
                                    <h5 class="modal-title" id="addAboutModalLabel">Edit Gallery</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <a href="/admin/gallery"><span aria-hidden="true">&times;</span></a>
                                    </button>
                              </div>
                              <div class="card-body">
                                    <form action="{{ route('gallery.update', $gallerys->id) }}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          @method('PUT')
                                          <img src="{{ asset('galery_photo/'.$gallerys->gallery_photos) }}" width="100px" alt="">
                                          <br>
                                          <div class="btn btn-primary btn-sm float-left">
                                                <span>Choose file</span>
                                                <input type="file" name="gallery_photos">
                                          </div>
                                          <br>
                                          <br>
                                          <a href="/admin/gallery" class="btn btn-danger">Back</a>
                                          <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection