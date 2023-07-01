@extends("./admin.master")


@section("content")

<?php use RealRashid\SweetAlert\Facades\Alert;
?>
<div class="col-12">
          

            <div class="card"   id="search_response">
              <div class="card-header bg-info">
                <h3 class="card-title ">All settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">


              
              <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-8 offset-md-2 my-3">
                    
                   
                </div>
            </div>
        </div>
           

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Key</th>
                      <th>Value</th>
                      
                      <th>Action</th>
                    
                    </tr>
                  </thead>
                  <tbody id="live">

                  @foreach($settings as $setting)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    
                      <td>{{$setting->key}}</td>
                      <td>{{$setting->value}}</td>
                     
                      <td class="d-flex">
                    
                      <a href="{{route('settings.edit',$setting->id)}}" class="btn"><i class="fa-solid fa-edit text-info" ></i></a>
           
                        <form action="{{route('settings.destroy',$setting->id)}}" method="post">
                           @method('delete')
                            @csrf
                           <button type="submit" class="btn"><i  class="fa-solid fa-trash text-danger" ></i></button>
                        </form>

                    </td>
                    </tr>
                   
                    @endforeach
                   
                  </tbody>
                </table>

                {{ $settings->links() }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          @endsection

          @section('extra-scripts')

<script>



</script>
@endsection('extra-scripts')



