
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="bi bi-phone"></i> +1 5589 55488 55
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Medilab</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('frontend.index')}}">Home</a></li>
          
          <!-- doctors -->
          <li><a class="nav-link scrollto" href="{{route('dashboard')}}">Profile</a></li>
          
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <!-- <li><a class="nav-link scrollto" href="">Login</a></li>
        -->
     </ul>


     <ul>
             
              <li class="dropdown"><a href="#"><span>Login</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="{{route('login')}}">Doctor</a></li>
                  <li><a href="{{route('patient.login')}}">Patient</a></li>
                
                </ul>
              </li>
             <!-- patient -->
                      @if(auth()->guard('patient'))
              <li class="dropdown"><a href="#"><span>{{  auth()->guard('patient')->user()->name??''}}</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                <li><a href="{{route('patient.dashboard')}}">Profile</a></li>
                  <li><a href="{{route('patient.edit_profile')}}">Setting</a></li>
                  <li><a href="{{route('patient.logout')}}">Logout</a></li>
                </ul>
              </li>
                   @endif
<!-- end patient -->




 <!-- patient -->
 @if(auth())
              <li class="dropdown"><a href="#"><span>{{  auth()->user()->name??''}}</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                <li><a href="{{route('dashboard')}}">Profile</a></li>
                  <li><a href="{{route('profile.edit')}}">Setting</a></li>
                  <li><a href="{{route('logout')}}">Logout</a></li>
                </ul>
              </li>
                   @endif
<!-- end patient -->
            </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{route('frontend.index')}}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>

    </div>
 
</header><!-- End Header -->
