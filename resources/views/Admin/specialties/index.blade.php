@extends("./admin.master")



@section("content")

<?php use RealRashid\SweetAlert\Facades\Alert;
?>
<div class="col-12">
          

            <div class="card">
              <div class="card-header bg-info">
                <h3 class="card-title ">All specialties</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">


              

             
            

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                
                      <th>Name</th>
                
                      <th>image</th>
                      <th>Action</th>
                    
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($specialties as $specialty)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                      
                      <td>{{$specialty->name}}</td>
                      
                      <td>
                        <img src="{{asset($specialty::PATH . ($specialty->image??'user.jpg'))}}" alt="" srcset="" style="width:100px;height:100px">
                      </td>
                      <td class="d-flex">
                    
                      <a href="{{route('specialties.edit',$specialty->id)}}"><i class="fa-solid fa-edit text-info" ></i></a>

              

                     
                        <form action="{{route('specialties.destroy',$specialty->id)}}" method="post">
                           @method('delete')
                            @csrf
                           <button type="submit" class="btn"><i  class="fa-solid fa-trash text-danger" ></i></button>
                        </form>

                    </td>
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>

                {{ $specialties->links() }}
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