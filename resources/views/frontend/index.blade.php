

@extends('./frontend.master')

@section('content')


 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>{{$settings['title']}}</h1>
      <h2>{{$settings['description']}}</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->



  <main id="main">

<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
  <div class="container">

    <div class="row">
      <div class="col-lg-4 d-flex align-items-stretch">
        <div class="content">
          <h3>Why Choose Medilab?</h3>
          <p>
            {{$settings['Why Choose Medilab?']}}
          </p>
          <div class="text-center">
            <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-8 d-flex align-items-stretch">
        <div class="icon-boxes d-flex flex-column justify-content-center">
          <div class="row">
            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box mt-4 mt-xl-0">
                <i class="bx bx-receipt"></i>
                <h4>Corporis voluptates sit</h4>
                <p>{{$settings['Corporis voluptates sit']}}</p>
              </div>
            </div>
            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box mt-4 mt-xl-0">
                <i class="bx bx-cube-alt"></i>
                <h4>Ullamco laboris ladore pan</h4>
                <p>{{$settings['Ullamco laboris ladore pan']}}</p>
              </div>
            </div>
            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box mt-4 mt-xl-0">
                <i class="bx bx-images"></i>
                <h4>Labore consequatur</h4>
                <p>{{$settings['Labore consequatur']}}</p>
              </div>
            </div>
          </div>
        </div><!-- End .content-->
      </div>
    </div>

  </div>
</section><!-- End Why Us Section -->









  <!-- ======= Appointment Section ======= -->
  <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Make an Appointment</h2>
          <p>{{$settings['Make an Appointment']}}</p>
        </div>

        <form action="" method="" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="date" name="date" class="form-control " id="date" placeholder="Appointment Date" >
              
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="department" id="department" class="form-select">
                <option value="">Select Department</option>
                <option value="Department 1">Department 1</option>
                <option value="Department 2">Department 2</option>
                <option value="Department 3">Department 3</option>
              </select>
              
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="doctor" id="doctor" class="form-select">
                <option value="">Select Doctor</option>
                <option value="Doctor 1">Doctor 1</option>
                <option value="Doctor 2">Doctor 2</option>
                <option value="Doctor 3">Doctor 3</option>
              </select>
              
            </div>
          </div>

          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
            
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit" id="appointment">Make an Appointment</button></div>
        </form>

      </div>
    </section><!-- End Appointment Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Doctors</h2>
          <p>{{$settings['Doctors']}}</p>
        </div>

        <div class="row">
@foreach($doctors as $doctor)
          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{asset($doctor->user::PATH.($doctor->user->image??'doctor.jpg'))}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>{{$doctor->user->name}}</h4>
                <span>{{$doctor->specialty->name}}</span>
                <p>{{$doctor->description}}</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
@endforeach
         


          

        </div>

      </div>



    </section><!-- End Doctors Section -->
 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>{{$settings['Contact']}}</p>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>{{$settings['Location']}}</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>{{$settings['Email']}}</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>{{$settings['Call']}}</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action=""  role="form" class="php-email-form" id="formMessage">
              
             <input name="_token" value="{{csrf_token()}}" hidden > 

            <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" >
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" >
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" >
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" ></textarea>
              </div>
              
              <div class="text-center"><button type="submit" id="message">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

</main>
@endsection
   

@section('script')
<script>

$(document).ready(function(){
// start

// ############ message start #####################################




// ############ message end #####################################
$('#message').click(function(e){
  e.preventDefault; 

  var formData = new FormData($('#message')[0]);

console.log('km')
// start ajax
         $.ajax({
             type : 'post',
             url : "{{route('feedbacks.store')}}",
                data: formData,
                // processData: false,
                // contentType: false,
                // cache: false,
                success:function(data){
                console.log(data);
                        },
                    error:function(reject){
                      console.log(reject);
                    }

                    });  
// end ajax
})

// end
});





// ######################Appointment


$(document).on('click','#appointment',function(e){
       e.preventDefault; 
       console.log('ddddddddd')
})
</script>
@endsection