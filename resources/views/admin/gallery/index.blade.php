@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
      <div class="content">
            <div class="container-fluid">
                  @if ($message = Session::get('success'))
                  <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  @endif
                  <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-9 offset">
                              <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#addGalModal">
                                    + Gallery
                              </button>

                              <!-- TAMBAH GALLERY -->
                              <div class="modal fade" id="addGalModal" tabindex="-1" aria-labelledby="addGalModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <h5 class="modal-title" id="addGalModalLabel">Gallery Foto</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                      </button>
                                                </div>
                                                <div class="modal-body">
                                                      <form action="{{ url('/admin/gallery') }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="btn btn-primary btn-sm float-left">
                                                                  <span>Choose file</span>
                                                                  <input type="file" name="gallery_photos" required>
                                                            </div>
                                                </div>
                                                <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <button type="submit" class="btn btn-primary">Smpan</button>
                                                      </form>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <div class="row">
                        <div class="col-md-12">
                              <div class="card">
                                    <div class="card-header card-header-primary">
                                          <h3 class="card-title ">Data Gallery</h3>
                                    </div>
                                    <div class="card-body">
                                          <div class="table-responsive">
                                                <table class="table">
                                                      <thead class=" text-primary">
                                                            <th>No</th>
                                                            <th>Gallery Photos</th>
                                                            <th>Action</th>
                                                      </thead>
                                                      <tbody>
                                                            @php
                                                            $no = 1;
                                                            @endphp
                                                            @foreach($gallerys as $gallery)
                                                            <tr>
                                                                  <td>{{ $no++ }}</td>
                                                                  <td><img src="{{ asset('galery_photo/'.$gallery->gallery_photos) }}" width="80px" alt="" srcset=""></td>
                                                                  <td>
                                                                        <a href="{{ route('gallery.edit', $gallery->id) }}" style="float: left; margin-right: 10px;" class="btn btn-warning">Edit</a>
                                                                        <form action="{{ route('gallery.delete', $gallery->id) }}" method="post">
                                                                              @csrf
                                                                              @method('delete')
                                                                              <button type="submit" class="btn btn-danger">Delete</button>
                                                                        </form>
                                                                  </td>
                                                            </tr>
                                                            @endforeach
                                                      </tbody>
                                                </table>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</body>
</html>
@endsection
