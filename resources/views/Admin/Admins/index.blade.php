@extends("./admin.master")



@section("content")

<?php use RealRashid\SweetAlert\Facades\Alert;
?>
<div class="col-12">
          

            <div class="card">
              <div class="card-header bg-info">
                <h3 class="card-title ">All Admins</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">


              

              @if(session('success'))
                <div class="alert alert-success ">
                 
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
               <p>{{session('success')}}</p>
                </div>
                @endif


 @if($errors->any())
                    <div class="alert alert-danger ">
                 
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                @foreach($errors->all() as $error)
                  <p>{{$error}}</p>
                  @endforeach
                </div>
                @endif 

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                
                      <th>Name</th>
                      <th>Email</th>
                      <th>phone</th>
                      <th>image</th>
                      <th>Action</th>
                    
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($admins as $admin)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                      
                      <td>{{$admin->user->name}}</td>
                      <td>{{$admin->user->email}}</td>
                      <td>{{$admin->user->phone}}</td>
                      <td>
                        <img src="{{asset($admin->user::PATH . ($admin->user->image??'user.jpg'))}}" alt="" srcset="" style="width:100px;height:100px">
                      </td>
                      <td class="d-flex">
                    
                      <a href="{{route('admins.edit',$admin->id)}}"><i class="fa-solid fa-edit text-info" ></i></a>

                      <a  class="px-2" href="{{route('users.edit_password',$admin->user_id)}}"><i class="fa-solid fa-lock text-primary" ></i></a>


                      <!-- <a href="{{ route('users.destroy',$admin->user_id) }}"    data-confirm-delete="true" class="btn btn-danger"> </a> -->

                        <form action="{{route('users.destroy',$admin->user_id)}}" method="post">
                           @method('delete')
                            @csrf
                           <button type="submit" class="btn"><i  class="fa-solid fa-trash text-danger" ></i></button>
                        </form>

                    </td>
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>

                {{ $admins->links() }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          @endsection

          @section('extra-scripts')

<script>







    jQuery(function($){

         $('.delete-btn').click(function(e){
         e.preventDefault();
        //  
         Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
   
        $(this).parent().submit();
    
  }
})

// 

       


         })
    })
</script>
@endsection('extra-scripts')