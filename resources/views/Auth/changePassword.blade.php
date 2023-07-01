@extends("./master")



@section("content")


<div class="col-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header bg-info">
                <h3 class="card-title">Add Admin</h3>
              </div>
              <!-- /.card-header -->

<!-- 
              @if(session('success'))
                <div class="alert alert-success ">
                 
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
               <p>{{session('success')}}</p>
                </div> -->
                @endif


 <!-- @if($errors->any())
                    <div class="alert alert-danger ">
                 
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                @foreach($errors->all() as $error)
                  <p>{{$error}}</p>
                  @endforeach
                </div>
                @endif  -->



              <!-- form start -->




              <form method="post" action="{{route('users.changePassword',$user->id)}}">
              @csrf
              @method('put')
                <div class="card-body">
                  
                  
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">old_password</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter old password" name="old_password"   value="">

                    @error('old_password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <!-- <label for="exampleInputEmail1">password</label> -->
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter password" name="password"   value="">

                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>



                    <div class="form-group">
                    <!-- <label for="exampleInputEmail1">Confirm password</label> -->
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