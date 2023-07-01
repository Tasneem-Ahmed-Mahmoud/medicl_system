@extends("./master")



@section("content")


<div class="col-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header bg-info">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <form method="post" action="{{route('users.update_password',$user->id)}}">
              @csrf
              @method('put')
                <div class="card-body">
                  
                  
                 
      
                  <div class="form-group">
                    <label for="exampleInputEmail1">password</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter password" name="password"   value="">

                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>



                    <div class="form-group">
                    <label for="exampleInputEmail1">Confirm password</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter password" name="password_confirmation"   value="">

                    @error('password_confirmation')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer float-end">
                  <button type="submit" class="btn bg-info px-5">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>




          @endsection