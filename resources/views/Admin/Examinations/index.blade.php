@extends("./admin.master")


@section("content")

<?php use RealRashid\SweetAlert\Facades\Alert;
?>
<div class="col-12">
          

            <div class="card"   id="search_response">
              <div class="card-header bg-info">
                <h3 class="card-title ">All examination</h3>
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
                      <th>patient</th>
                      <th>Doctor</th>
                      <th>title</th>
                      <th>Price</th>
                      <th>Offer</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Description</th>
                     
                      <th>Action</th>
                    
                    </tr>
                  </thead>
                  <tbody id="live">

                  @foreach($examinations as $examination)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    
                      <td>{{$examination->patient->name}}</td>
                      <td>{{$examination->doctor->user->name}}</td>
                      <td>{{$examination->title}}</td>
                      <td>{{$examination->price}}</td>
                      <td>{{$examination->offer}}%</td>
                      <td>{{$examination->date}}</td>
                      <td>{{$examination->status}}</td>
                      <td>    
                      <button type="button" class="btn btn-block btn-outline-info btn-sm" data-toggle="modal" data-target="#modal-default{{$loop->iteration}}">Description</button>
                      </td>
                     
                      <td class="d-flex">
                    
                      <a href="{{route('examinations.edit',$examination->id)}}" class="btn"><i class="fa-solid fa-edit text-info" ></i></a>
                      <a href="{{route('examinations.show_file',$examination->id)}}" class="btn btn-success">Show</a>
                      
                      <a href="{{route('examinations.download_file',$examination->id)}}" class="btn btn-primary mx-2">Download</a>
                      
                     

              
                        <form action="{{route('examinations.destroy',$examination->id)}}" method="post">
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
              <p>{{$examination->description}} </p>
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

                {{ $examinations->links() }}
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
url : "{{URL::to('examination/search')}}",
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


function display(examination){
  let output='';
  for(examination of examination){
    let image =examination.image?examination.image:'user.jpg';
    let index=1;
    output+=`
    <tr>
                    <td>${index}</td>
                    <td>
                        <img src="{{asset('images/examination')}}/${image}" alt="" srcset="" style="width:100px;height:60px">
                      </td>
                      <td>${examination.name}</td>
                      <td>${examination.email}</td>
                      <td>${examination.address?examination.address:''}</td>
                      <td>${examination.phone}</td>
                      <td>    
                      <button type="button" class="btn btn-block btn-outline-info btn-sm" data-toggle="modal" data-target="#modal-default${index}">Notes</button>
                      </td>
                      <td>${examination.age}</td>
                      <td>${examination.birthday}</td>
                      <td class="d-flex">
                    

                      <a href="{{url('examination/edit')}}/${examination.id}" class="btn"><i class="fa-solid fa-edit text-info" ></i></a>
                      <a  class="px-2" href="{{url('examination/edit_password')}}/${examination.id}"><i class="fa-solid fa-lock text-primary" ></i></a>


              
                        <form action="{{url('examination/destroy')}}/${examination.id}" method="post">
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
              <p>${examination.notes?examination.notes:""} </p>
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



