@extends('layout')
@section('content')
 <style>
.bg-image{
    background-size: cover;
}

</style>
<section class="vh-100 bg-image"
  style="background-image: url('https://images.unsplash.com/photo-1608042314453-ae338d80c427?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2010&q=80');"> 
   <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Login</h2>

              <form>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="User Name"/>
                  <label class="form-label" for="form3Example1cg">User Name</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" placeholder="Password" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>
                {{-- <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div> --}}

                <div class="d-flex justify-content-center">
                  <button type="button"
                    class="btn btn-dark btn-block btn-lg gradient-custom-4 text-light" >Login</button>
                </div>

                <p class="text-center text-light mt-5 mb-0">Have already an account? <a href="registration"
                    class="fw-bold text-body"><u>Sign Up here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
