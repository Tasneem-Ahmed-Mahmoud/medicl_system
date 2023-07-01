@extends("./admin.master")



@section("content")


<div class="col-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header bg-info">
                <h3 class="card-title">Update Setting</h3>
              </div>
              <!-- /.card-header -->



              <!-- form start -->




              <form method="Post" action="{{route('settings.update',$setting->id)}}">
              @csrf
              @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Key</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter key" name="key"   value="{{old('key')?old('key'): $setting->key}}">

                    @error('key')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                 

                 
              
                <div class="form-group">
                        <label>Value</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Value"  name="value">{{old('value')??$setting->value}}</textarea>
                        @error('value')
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