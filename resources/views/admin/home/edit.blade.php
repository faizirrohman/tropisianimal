@extends('layouts.admin')
@section('content')
<div class="content">
      <div class="container-fluid">
            <div class="row">
                  <div class="col-lg-10 col-sm-12 col-md-9 offset-1">
                        <div class="card">
                              <div class="modal-header">
                                    <h5 class="modal-title" id="addAboutModalLabel">Edit Contact</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <a href="/admin/home"><span aria-hidden="true">&times;</span></a>
                                    </button>
                              </div>
                              <div class="modal-body">
                                    <form action="{{ route('home.update', $homes->id) }}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          @method('PUT')
                                          <div class="form-group">
                                                <label for="judul">Judul</label>
                                                <input type="text" name="judul" class="form-control" id="judul" value="{{ $homes->judul }}" required>
                                          </div>
                                          <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required>{{ $homes->deskripsi }}</textarea>
                                          </div>
                              </div>
                              <div class="modal-footer">
                                    <a href="/admin/home" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection