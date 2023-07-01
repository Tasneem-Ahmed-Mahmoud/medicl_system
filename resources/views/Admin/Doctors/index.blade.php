@extends("./admin.master")


@section("content")


<div class="col-12">
          

            <div class="card">
              <div class="card-header bg-info">
                <h3 class="card-title ">All Doctors</h3>
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
                
                      <th>Name</th>
                      <th>Email</th>
                      <th>phone</th>
                      <th>image</th>
    
                      <th>Description</th>
                      <th>Specialty</th>
                      <th>Action</th>
                    
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($doctors as $doctor)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                      
                      <td>{{$doctor->user->name}}</td>
                      <td>{{$doctor->user->email}}</td>
                      <td>{{$doctor->user->phone}}</td>
                      <td>
                        <img src="{{asset($doctor->user::PATH .($doctor->user->image??'user.jpg'))}}" alt="" srcset="" style="width:100px;height:100px">
                      </td>
                      <td>    
                      <button type="button" class="btn btn-block btn-outline-info btn-sm" data-toggle="modal" data-target="#modal-default{{$loop->iteration}}">Description</button>
                      </td>
                      <td>{{$doctor->specialty->name}}</td>
                      <td class="d-flex">
                    
                      <a href="{{route('doctors.edit',$doctor->id)}}"><i class="fa-solid fa-edit text-info" ></i></a>

                      <a  class="px-2" href="{{route('users.edit_password',$doctor->user_id)}}"><i class="fa-solid fa-lock text-primary" ></i></a>


                      <!-- <a href="{{ route('users.destroy',$doctor->user_id) }}"    data-confirm-delete="true" class="btn btn-danger"> </a> -->

                        <form action="{{route('users.destroy',$doctor->user_id)}}" method="post">
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
              <h4 class="modal-title">Description</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>{{$doctor->description}} </p>
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

                {{ $doctors->links() }}
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
url : "{{URL::to('doctors/search')}}",
data:{'search':$value},
success:function(data){
  // console.log(data);
  // users=JSON.parse(data);
  // for(user of users){
  //   console.log(user)
  // }
  // console.log(users[0])
  // console.log(JSON.parse(data)[0].doctors[0].id)
data=JSON.parse(data)
if(data.length>0){
  display(data)
}else{
  $('tbody').html(`<tr>
  <td colspan="8" class="text-center"><h3>Not Found</h3></td>
  </tr>`);
}

}

});




function display(users){

  let output='';
  for(user of users){
    let index=0;
    //  console.log(user.doctors[index]);
    let image =user.image?user.image:'user.jpg';
  
    output+=`
    <tr>
                    <td>${index+1}</td>
                    <td>
                        <img src="{{asset('images/users')}}/${image}" alt="" srcset="" style="width:100px;height:60px">
                      </td>
                      <td>${user.name}</td>
                      <td>${user.email}</td>
                      <td>${user.phone}</td>
                     

                      <td>    
                      <button type="button" class="btn btn-block btn-outline-info btn-sm" data-toggle="modal" data-target="#modal-default${index}">Description</button>
                      </td>
                      <td>${user.doctors[index].specialty_id}</td>
                      <td class="d-flex">
                    

                      <a href="{{url('doctors/edit')}}/${user.doctors[index].id}" class="btn"><i class="fa-solid fa-edit text-info" ></i></a>
                      <a  class="px-2" href="{{url('users/edit_password')}}/${user.id}"><i class="fa-solid fa-lock text-primary" ></i></a>


              
                        <form action="{{url('users/destroy')}}/${user.id}" method="post">
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
              <h4 class="modal-title">Description</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>${user.doctors[index]} </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
            </div>
          </div>
        
        </div>
       
      </div>
     
    `
  
  }
   $('tbody').html(output);
   index++;
}


});


</script>
@endsection('extra-scripts')