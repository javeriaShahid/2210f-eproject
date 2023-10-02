@extends('User.layout')
@section('content')

<style>

    .form-control{
        box-shadow: 0 0 10px hsla(0, 0%, 0%, 0.219)!important;
        border:1px solid black !important;
        border-radius:0 !important;
        outline:none !important;
    }

    </style>
 <section style="background-image: url('https://images.unsplash.com/photo-1528459801416-a9e53bbf4e17?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1912&q=80')" >
  {{-- <div style="background:white; width:auto ;" class="mask d-flex align-items-center h-100 gradient-custom-3"> --}}
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form action="{{ route('user.register.post') }}" method="Post" enctype='multipart/form-data' >
                @csrf
                  <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example1cg">Profile Image</label>
                    <input type="file" id="form3Example1cg" class="form-control form-control-lg" name="image" />
                  </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1cg">Full Name</label>
                  <input type="text" id="form3Example1cg" name="name" class="form-control form-control-lg" placeholder="Full Name"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1cg">User Name</label>
                  <input type="text" id="form3Example1cg" name="username" class="form-control form-control-lg" placeholder="User Name" />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1cg">Contact Here</label>
                    <div class="row">
                        <div class="col-2">

                          <select name="country_code" id="" class="  form-control form-control-lg">
                            @foreach ($data['country'] as $country )
                            <option value="{{ $country->phonecode }}">{{ $country->phonecode }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-10">
                            <input type="number" id="form3Example1cg" name="contact_number" class="form-control form-control-lg" placeholder="Contact Here" />

                        </div>
                    </div>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                  <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" placeholder="Your Email" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cg">Password</label>
                  <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" placeholder="Password" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cg">Confirm Password</label>
                  <input type="password" name="confirmPassword" id="form3Example4cg" class="form-control form-control-lg" placeholder="Confirm Password" />
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-dark btn-block btn-lg gradient-custom-4 text-light">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
