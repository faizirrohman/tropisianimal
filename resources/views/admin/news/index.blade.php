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
                                    + Berita
                              </button>

                              <!-- TAMBAH BERITA -->
                              <div class="modal fade" id="addGalModal" tabindex="-1" aria-labelledby="addAboutModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <h5 class="modal-title" id="addAboutModalLabel">Tambah Berita</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                      </button>
                                                </div>
                                                <div class="modal-body">
                                                      <form action="{{ url('/admin/news') }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                  <label for="judul">Judul</label>
                                                                  <input type="text" name="judul" class="form-control" id="judul" required>
                                                            </div>
                                                            <div class="form-group">
                                                                  <label for="deskripsi">Deskripsi</label>
                                                                  <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
                                                            </div>
                                                            <div class="btn btn-primary btn-sm float-left">
                                                                  <span>Choose file</span>
                                                                  <input type="file" name="news_image" required>
                                                            </div>
                                                            <br>
                                                            <br>
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
                                          <h3 class="card-title ">Data Berita</h3>
                                    </div>
                                    <div class="card-body">
                                          <div class="table-responsive">
                                                <table class="table">
                                                      <thead class=" text-primary">
                                                            <th>No</th>
                                                            <th>News Image</th>
                                                            <th>Judul</th>
                                                            <th>Deskripsi</th>
                                                            <th>Type</th>
                                                            <th>Action</th>
                                                      </thead>
                                                      <tbody>
                                                            @php
                                                            $no = 1;
                                                            @endphp
                                                            @foreach($news as $new)
                                                            <tr>
                                                                  <td>{{ $no++ }}</td>
                                                                  <td><img src="{{ asset('news_photos/'.$new->news_image) }}" width="80px" alt="" srcset=""></td>
                                                                  <td>{{ $new->judul }}</td>
                                                                  <td>{{ $new->deskripsi }}</td>
                                                                  <td>{{ $new->type }}</td>
                                                                  <td>
                                                                        <a href="{{ route('news.edit', $new->id) }}" style="float: left; margin-right: 10px;" class="btn btn-warning">Edit</a>
                                                                        <form action="{{ route('news.delete', $new->id) }}" method="post">
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