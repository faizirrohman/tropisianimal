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
                                    + Contact
                              </button>

                              <!-- TAMBAH GALLERY -->
                              <div class="modal fade" id="addGalModal" tabindex="-1" aria-labelledby="addAboutModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <h5 class="modal-title" id="addAboutModalLabel">Tentang Tropisianimal</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                      </button>
                                                </div>
                                                <div class="modal-body">
                                                      <form action="{{ url('/admin/contact') }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                  <label for="email">Email</label>
                                                                  <input type="email" name="email" class="form-control" id="email" required>
                                                            </div>
                                                            <div class="form-group">
                                                                  <label for="phone">Phone</label>
                                                                  <input type="text" name="phone" class="form-control" id="phone" required>
                                                            </div>
                                                            <div class="form-group">
                                                                  <label for="address">Address</label>
                                                                  <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
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
                                          <h3 class="card-title ">Contact</h3>
                                    </div>
                                    <div class="card-body">
                                          <div class="table-responsive">
                                                <table class="table">
                                                      <thead class=" text-primary">
                                                            <th>No</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                            <th>Action</th>
                                                      </thead>
                                                      <tbody>
                                                            @php
                                                            $no = 1;
                                                            @endphp
                                                            @foreach($contacts as $contact)
                                                            <tr>
                                                                  <td>{{ $no++ }}</td>
                                                                  <td>{{ $contact->email }}</td>
                                                                  <td>{{ $contact->phone }}</td>
                                                                  <td>{{ $contact->address }}</td>
                                                                  <td>
                                                                        <a href="{{ route('contact.edit', $contact->id) }}" style="float: left; margin-right: 10px;" class="btn btn-warning">Edit</a>
                                                                        <form action="{{ route('contact.delete', $contact->id) }}" method="post">
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
