@extends('./frontend.master')


@section('content')
<div class="container">
<section class="h-100 gradient-custom-2"   style="margin-top:160px;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
                <div class="card">
                    <div class="rounded-top text-white " style="background-color: #000;">
                        <form method="post" action="{{route('patients.update',auth()->guard('patient')->user()->id)}}" class="p-5">

                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="name" value="{{auth()->guard('patient')->user()->name}}">
                                @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Phone </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="phone" value="{{auth()->guard('patient')->user()->phone}}">
                                @error('phone')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Birthday</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="birthday" value="{{auth()->guard('patient')->user()->birthday}}">
                                @error('birthday')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                            </div>
                           
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Address </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="address" value="{{auth()->guard('patient')->user()->address??''}}">
                                @error('address')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="email" value="{{auth()->guard('patient')->user()->email}}">
                                @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Notes</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="notes">{{auth()->guard('patient')->user()->notes}}</textarea>
                                @error('notes')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                           
                            </div>

                            <div class="mb-3  float-end">
                                <button type="submit" class="btn btn-light px-5" data-mdb-ripple-color="white" style="z-index: 1;">Update</button>
                            </div>

                        </form>
                    </div>

                </div>
<!-- image -->
                <div class="card mt-5">
                    <div class="rounded-top text-white " style="background-color: #000;">
                        <form method="post" action="{{route('patient.update_image',auth()->guard('patient')->user()->id)}}" enctype="multipart/form-data" class="p-5">
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
                        <form method="post" action="{{route('patient.reset_password')}}" enctype="multipart/form-data" class="p-5">

                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Old Password</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="old_password" >
                            </div>

                            @error('old_password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NewPassword</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="password" >
                            </div>
                            @error('new_password')
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