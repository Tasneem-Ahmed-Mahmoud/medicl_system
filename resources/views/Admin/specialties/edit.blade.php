@extends("./admin.master")



@section("content")


<div class="col-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header bg-info">
                <h3 class="card-title">Add Specialty</h3>
              </div>
              <!-- /.card-header -->





              <form method="Post" action="{{route('specialties.update',$specialty->id)}}"   enctype="multipart/form-data">
              @csrf
              @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name"   value="{{old('name')?old('name'): $specialty->name}}">

                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  
          
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image"   value="{{old('image')?old('image'): ''}}">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    
                    </div>
                    <img  class="mt-3" src="{{asset($specialty::PATH.$specialty->image)}}" style="width:100px;hieght:100px">
                    @error('image')
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