@extends("./admin.master")



@section("content")


<div class="col-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header bg-info">
                <h3 class="card-title">Add Exam</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="Post" action="{{route('examinations.store')}}"   enctype="multipart/form-data">
              @csrf
                <div class="card-body">



                <div class="form-group">
                  <label for="exampleSelectBorderWidth2">Patient</label><br>
                  <label  class="text-success fs-3" id="patient_name"></label>
                  <input type="search" class="form-control " placeholder="search by name or phone" id="search"   >
                  
                  <input type="text" hidden class="form-control" id="patient_id" placeholder="Enter name" name="patient_id"   value="{{old('patient_id')?old('patient_id'): ''}}">

                  @error('patient_id')
                    <small class="text-danger">{{$message}}</small>
                    @enderror    
                </div>
<!-- doctors  -->
               
<div class="form-group">
              
                        @if( isset(   auth()->user)&&auth()->user->type=='doctor')
                        <input type="text"class="form-control" id="doctor_id" placeholder="Enter name" name="doctor_id"   value="{{auth()->user->doctor->id}}">

                        @else
                        <label for="exampleSelectBorderWidth2">doctor</label>

                  <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" name="doctor_id"  >
                    @foreach($doctors as $doctor)
                    <option   value="{{$doctor->id}}">{{$doctor->user->name}}</option>
                   @endforeach
                  </select>
                 @endif

                 @error('doctor_id')
                    <small class="text-danger">{{$message}}</small>
                    @enderror 
                </div> 
                
                  <!-- end -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">date</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter date" name="date"   value="{{old('date')?old('time'): ''}}">

                    @error('time')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>

                  <div class="form-group">
               
                  <div class="form-group">
                    <label for="exampleInputFile">File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file"   value="{{old('file')?old('file'): ''}}">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                    @error('file')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="title"   value="{{old('title')?old('title'): ''}}">

                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."  name="description">{{old('description')??''}}</textarea>
                        @error('description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">price</label>
                    <input type="number" class="form-control" id="exampleInputprice1" placeholder="Enter price" name="price"   value="{{old('price')?old('price'): ''}}">

                    @error('price')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">offer</label>
                    <input type="number" class="form-control" id="exampleInputoffer1" placeholder="Enter offer" name="offer"   value="{{old('offer')?old('offer'): '0'}}">

                    @error('offer')
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



          @section('extra-scripts')
          <script>
            
$(document).on('keyup','#search',function(){
$value=$(this).val();
$.ajax({
type : 'get',
url : "{{URL::to('patients/patient_search')}}",
data:{'search':$value},
success:function(data){
    data=JSON.parse(data);
   
 
   if(data){
    console.log(data);
    console.log(data.name);
    $('#patient_id').attr('value',data.id)
    $('#patient_name').removeClass("text-danger");
    $('#patient_name').addClass('text-success');
    $('#patient_name').html(data.email)
   }else{
    $('#patient_name').removeClass("text-success");
    $('#patient_name').addClass('text-danger');
    $('#patient_name').html("not found ");
   }
},
error:function(reject){
    $('#patient_name').removeClass("text-success");
    $('#patient_name').addClass('text-danger');
    $('#patient_name').html="not found ";
}

});

});

          </script>

@endsection