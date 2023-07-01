

@extends('./frontend.master')


@section('content')
<div class="container">
<section class="vh-100" style="background-color: #1977cc;margin-top:160px;"  >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://images.pexels.com/photos/4210561/pexels-photo-4210561.jpeg?auto=compress&cs=tinysrgb&w=600"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
          
              <div class="card-body p-4 p-lg-5 text-black">

                <form  method="post"  action="{{route('patient.login')}}">
                @csrf

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Patient Login</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>


                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example17" class="form-control form-control-lg" name="email"/>
                    <label class="form-label" for="form2Example17">email</label>
                    @if($errors->has('email'))
                    <span class="text-danger mt-1">{{$errors->first("email")}} </span>
                    @endif
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" name="password"/>
                    <label class="form-label" for="form2Example27">Password</label>
                    @if($errors->has('password'))
                    <span class="text-danger mt-1">{{$errors->first("password")}} </span>
                    @endif
                  </div>

                  <div class="pt-1 mb-4 text-center">
                    <button class="btn text-white btn-lg px-5 border-0 rounded"   style="background-color: #1977cc" type="submit">Login</button>
                  </div>

                </form>

              </div>
            </div>
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