@extends('layouts.admin')
@section('content')
<div class="content">
      <div class="container-fluid">
            <div class="row">
                  <div class="col-lg-10 col-sm-12 col-md-9 offset-1">
                        <div class="card">
                              <div class="modal-header">
                                    <h5 class="modal-title" id="addAboutModalLabel">Edit News</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <a href="/admin/news"><span aria-hidden="true">&times;</span></a>
                                    </button>
                              </div>
                              <div class="modal-body">
                                    <form action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          @method('PUT')
                                          <img src="{{ asset('news_photos/'.$news->news_image) }}" width="100px" alt="">
                                          <br>
                                          <div class="btn btn-primary btn-sm float-left">
                                                <span>Choose file</span>
                                                <input type="file" name="news_image">
                                          </div>
                                          <br>
                                          <br>
                                          <div class="form-group">
                                                <label for="judul">Judul</label>
                                                <input type="text" name="judul" class="form-control" id="judul" value="{{ $news->judul }}" required>
                                          </div>
                                          <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required>{{ $news->deskripsi }}</textarea>
                                          </div>
                                          <div class="form-group">
                                                <label>Type</label>
                                                <select name="type" class="form-control form-control-sm" required>
                                                      <option>-- Pilih Type --</option>
                                                      <option value="NORMAL">Normal</option>
                                                      <option value="HIGHLIGHT">Highlight</option>
                                                </select>
                                          </div>
                              </div>
                              <div class="modal-footer">
                                    <a href="/admin/news" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection