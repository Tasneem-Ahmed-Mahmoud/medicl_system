@extends("./admin.master")


@section("content")

<?php use RealRashid\SweetAlert\Facades\Alert;
?>
<div class="col-12">
          

            <div class="card"   id="search_response">
              <div class="card-header bg-info">
                <h3 class="card-title ">All Patients</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">


              
              <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-8 offset-md-2 my-3">
                    
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="search by name or phone" id="search"  name="search">
                           
                        </div>
                   
                </div>
            </div>
        </div>
           

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>address</th>
                      <th>phone</th>
                      
                      <th>Notes</th>
                      <th>Age</th>
                      <th>Birthday</th>
                      <th>Action</th>
                    
                    </tr>
                  </thead>
                  <tbody id="live">

                  @foreach($patients as $patient)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <img src="{{asset($patient::PATH . ($patient->image??'user.jpg'))}}" alt="" srcset="" style="width:100px;height:60px">
                      </td>
                      <td>{{$patient->name}}</td>
                      <td>{{$patient->email}}</td>
                      <td>{{$patient->address??''}}</td>
                      <td>{{$patient->phone}}</td>
                      <td>    
                      <button type="button" class="btn btn-block btn-outline-info btn-sm" data-toggle="modal" data-target="#modal-default{{$loop->iteration}}">Notes</button>
                      </td>
                      <td>{{$patient->age}}</td>
                      <td>{{$patient->birthday}}</td>
                      <td class="d-flex">
                    
                      <a href="{{route('patients.edit',$patient->id)}}" class="btn"><i class="fa-solid fa-edit text-info" ></i></a>
                      <a  class="px-2" href="{{route('patients.edit_password',$patient->id)}}"><i class="fa-solid fa-lock text-primary" ></i></a>


              
                        <form action="{{route('patients.destroy',$patient->id)}}" method="post">
                           @method('delete')
                            @csrf
                           <button type="submit" class="btn"><i  class="fa-solid fa-trash text-danger" ></i></button>
                        </form>

                    </td>
                    </tr>
                    <div class="modal fade" id="modal-default{{$loop->iteration}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Notes</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>{{$patient->notes??""}} </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
                    @endforeach
                   
                  </tbody>
                </table>

                {{ $patients->links() }}
              </div>
              <!-- /.card-body -->
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
url : "{{URL::to('patients/search')}}",
data:{'search':$value},
success:function(data){
  // console.log(data);
  // console.log(JSON.parse(data))
// $('tbody').html(data);
if(data.length>0){
display(JSON.parse(data))
}else{
  $('tbody').html(`<tr>
  <td colspan="9">Not Found</td>
  </tr>`);
}

}

});


function display(patients){
  let output='';
  for(patient of patients){
    let image =patient.image?patient.image:'user.jpg';
    let index=1;
    output+=`
    <tr>
                    <td>${index}</td>
                    <td>
                        <img src="{{asset('images/patients')}}/${image}" alt="" srcset="" style="width:100px;height:60px">
                      </td>
                      <td>${patient.name}</td>
                      <td>${patient.email}</td>
                      <td>${patient.address?patient.address:''}</td>
                      <td>${patient.phone}</td>
                      <td>    
                      <button type="button" class="btn btn-block btn-outline-info btn-sm" data-toggle="modal" data-target="#modal-default${index}">Notes</button>
                      </td>
                      <td>${patient.age}</td>
                      <td>${patient.birthday}</td>
                      <td class="d-flex">
                    

                      <a href="{{url('patients/edit')}}/${patient.id}" class="btn"><i class="fa-solid fa-edit text-info" ></i></a>
                      <a  class="px-2" href="{{url('patients/edit_password')}}/${patient.id}"><i class="fa-solid fa-lock text-primary" ></i></a>


              
                        <form action="{{url('patients/destroy')}}/${patient.id}" method="post">
                           @method('delete')
                            @csrf
                           <button type="submit" class="btn"><i  class="fa-solid fa-trash text-danger" ></i></button>
                        </form>
                    </td>
                    </tr>
                    <div class="modal fade" id="modal-default${index}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Notes</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>${patient.notes?patient.notes:""} </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    `
    index++;
  }
   $('tbody').html(output);
}


});


</script>
@endsection('extra-scripts')



