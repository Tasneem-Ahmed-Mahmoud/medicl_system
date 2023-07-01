@extends("./admin.master")


@section("content")


<div class="col-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header bg-info">
                <h3 class="card-title">Add Patient</h3>
              </div>
              <!-- /.card-header -->



              <!-- form start -->




              <form method="Post" action="{{route('patients.update',$patient->id)}}">
              @csrf
              @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name"   value="{{old('name')?old('name'): $patient->name}}">

                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="email"   value="{{old('email')?old('email'): $patient->email}}">

                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  


                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="address"   value="{{old('address')?old('address'): $patient->address}}">

                    @error('address')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Birthday</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="birthday"   value="{{old('birthday')?old('birthday'): $patient->birthday}}">

                    @error('birthday')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
              
                <div class="form-group">
                        <label>Notes</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."  name="notes">{{old('notes')??$patient->notes}}</textarea>
                        @error('notes')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter phone" name="phone"   value="{{old('phone')?old('phone'): $patient->phone}}">

                    @error('phone')
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