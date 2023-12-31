@extends('User.layout')
@section('content')
@section('title')
User Login
@endsection
 <style>

    .form-control{
        box-shadow: 0 0 10px hsla(0, 0%, 0%, 0.219)!important;
        border:1px solid black !important;
        border-radius:0 !important;
        outline:none !important;
    }

</style>
<section style="background-image: url('https://images.unsplash.com/photo-1528459801416-a9e53bbf4e17?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1912&q=80')" >
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Login</h2>

              <form action="{{ route('auth.login') }}" method="Post">
                @csrf
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1cg">Email</label>
                  <input type="text" name="email" id="form3Example1cg" class="form-control form-control-lg" placeholder="User Name"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cg">Password</label>
                  <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" placeholder="Password" />
                </div>


                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-dark btn-block btn-lg gradient-custom-4 text-light" >Login</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="registration"
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
