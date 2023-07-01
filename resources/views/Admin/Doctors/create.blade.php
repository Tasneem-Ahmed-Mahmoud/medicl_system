@extends("./admin.master")



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




              <form method="Post" action="{{route('doctors.store')}}">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name"   value="{{old('name')?old('name'): ''}}">

                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email"   value="{{old('email')?old('email'): ''}}">

                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter phone" name="phone"   value="{{old('phone')?old('phone'): ''}}">

                    @error('phone')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>


                  <div class="form-group">
                  <label for="exampleSelectBorderWidth2">Specialty</label>
                  <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" name="specialty_id"  >
                   
                    @foreach($specialties as $specialty)
                    <option   value="{{$specialty->id}}">{{$specialty->name}}</option>
                   @endforeach
                  </select>
                  <!-- @error('category_id')
                    <small class="text-danger">{{$message}}</small>
                    @enderror -->
                </div>
                  
                  <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."  name="description">{{old('description')??''}}</textarea>
                        @error('description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                      </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">password</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter password" name="password"   value="{{old('password')?old('password'): ''}}">

                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>



                    <div class="form-group">
                    <label for="exampleInputEmail1">Confirm password</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter password" name="password_confirmation"   value="{{old('password_comfirmation')?old('password_comfirmation'): ''}}">

                    @error('password_confirmation')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer float-end">
                  <button type="submit" class="btn bg-info px-5">Create</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>




          @endsection