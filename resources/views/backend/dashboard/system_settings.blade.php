@extends('backend.dashboard.layouts.master')
@section('title','System Settings')
@section('content')

<form  action='{{ route("system-setting.store")}}' method='POST'  enctype='multipart/form-data'> 
    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name='email'>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mobile</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="mobile" name='mobile'>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Slogan</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Slogan" name='slogan'>
                  </div>

                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Address" name='address'>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" id="exampleInp`utPassword1" placeholder="Address" name='name'>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name='logo'>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
        
                    </div>
                  </div>                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

@endsection
