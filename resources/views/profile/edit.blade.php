

@extends('./frontend.master')
@section('content')


<div class="container">

<section class="h-100 gradient-custom-2"   style="margin-top:160px;">



<h1 class=" bg-danger">{{auth()->user()->type}}</h1>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
                <div class="card">
                    <div class="rounded-top text-white " style="background-color: #000;">
                    @if(auth()->user()->type=='doctor')
                        <form method="post" action="{{route('doctors.update',auth()->user()->id)}}" class="p-5">
@endif

@if(auth()->user()->type=='admin')
                        <form method="post" action="{{route('admins.update',auth()->user()->id)}}" class="p-5">
@endif
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="name" value="{{auth()->user()->name}}">
                                @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Phone </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="phone" value="{{auth()->user()->phone}}">
                                @error('phone')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                            </div>

                          
                          
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="email" value="{{auth()->user()->email}}">
                                @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                            </div>
                            @if(auth()->user()->type=='doctor')
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{auth()->user()->description}}</textarea>
                                @error('description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                           
                            </div>


                     <div class="mb-3">
                  <label for="exampleSelectBorderWidth2">Specialty</label>
                  <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" name="specialty_id"  >
                   
                    @foreach($specialties as $specialty)
                    <option   value="{{$specialty->id}}"   @if($specialty->id == $doctor->specialty->id) selected @endif>{{$specialty->name}}</option>
                   @endforeach
                  </select>
                  <!-- @error('category_id')
                    <small class="text-danger">{{$message}}</small>
                    @enderror -->
                </div>


                            @endif
                            <div class="mb-3  float-end">
                                <button type="submit" class="btn btn-light px-5" data-mdb-ripple-color="white" style="z-index: 1;">Update</button>
                            </div>

                        </form>
                    </div>

                </div>
<!-- image -->
                <div class="card mt-5">
                    <div class="rounded-top text-white " style="background-color: #000;">
                        <form method="post" action="" enctype="multipart/form-data" class="p-5">
                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Image </label>
                                <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="" name="image">
                                @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                            </div>
                            <div class="mb-3  float-end">
                                <button type="submit" class="btn btn-light px-5" data-mdb-ripple-color="white" style="z-index: 1;">Update</button>
                            </div>

                        </form>
                    </div>
                </div>

                <!-- password -->


                <div class="card mt-5">
                    <div class="rounded-top text-white " style="background-color: #000;">
                        <form method="post" action="{{ route('password.update') }}" enctype="multipart/form-data" class="p-5">

                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Current Password</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="current_password" >
                            </div>

                            @error('current_password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NewPassword</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="password" >
                            </div>
                            @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="password_confirmation" >
                            </div>


                            <div class="mb-3  float-end">
                                <button type="submit" class="btn btn-light px-5" data-mdb-ripple-color="white" style="z-index: 1;">Update</button>
                            </div>

                        </form>
                    </div>
                </div>




                
            </div>
        </div>
    </div>
</section>

</div>
@endsection



@section('script')
<script></script>
@endsection