




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
              <img src="https://images.pexels.com/photos/6749773/pexels-photo-6749773.jpeg?auto=compress&cs=tinysrgb&w=600"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
          
              <div class="card-body p-4 p-lg-5 text-black">

                <form  method="post"  action="{{ route('login') }}">
                @csrf

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Doctor Login</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>


                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example17">email</label>
                    <input type="text" id="form2Example17" class="form-control form-control-lg" name="email"     type="email" name="email" :value="old('email')" required autofocus autocomplete="username"/>
                    
                    @if($errors->has('email'))
                    <span class="text-danger mt-1">{{$errors->first("email")}} </span>
                    @endif
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example27">Password</label>
                    <input type="password" id="form2Example27" class="form-control form-control-lg" name="password"    type="password"
                            name="password"
                            required autocomplete="current-password" />
                    
                    @if($errors->has('password'))
                    <span class="text-danger mt-1">{{$errors->first("password")}} </span>
                    @endif
                  </div>
                    <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

                  <div class="pt-1 mb-4 text-center">

                  @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
                    <button class=" ms-3btn text-white btn-lg px-5 py-2 border-0 rounded"   style="background-color: #1977cc" type="submit">Login</button>
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