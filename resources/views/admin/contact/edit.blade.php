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
                                          <a href="/admin/contact"><span aria-hidden="true">&times;</span></a>
                                    </button>
                              </div>
                              <div class="modal-body">
                                    <form action="{{ route('contact.update', $contacts->id) }}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          @method('PUT')
                                          <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control" id="email" value="{{ $contacts->email }}" required>
                                          </div>
                                          <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" name="phone" class="form-control" id="phone" value="{{ $contacts->phone }}" required>
                                          </div>
                                          <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea class="form-control" name="address" id="address" rows="3" required>{{ $contacts->address }}</textarea>
                                          </div>
                              </div>
                              <div class="modal-footer">
                                    <a href="/admin/contact" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection