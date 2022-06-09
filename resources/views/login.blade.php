<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Office Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- Bootstrap 5.1.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset ('assets/css/style.css')}}">


</head>

<body>
    <!-- Header Start -->
    <div class="header py-2 mb-3">
        <div class="container-fluid my-2">
            <div class="row align-items-center">
                <!--logo & title start-->
                <div class="col-md-5">
                    <a class="d-flex align-items-center logo " href="{{route('index')}}">
                        <img class="logo" src="{{asset ('assets/img/reflex_logo.png')}}" alt="Logo">
                       
                    </a>
                </div>
                <!--logo & title end-->

            </div>
        </div>
    </div>
    <!-- Header end -->
    <!-- main start -->
    <div class="container-fluid">
 <div class="row justify-content-center align-items-center">
     <div class="col-lg-5 mt-5">
     <form action="{{route('login_user')}}" method="post">
     @if(Session::has('success'))
         <div class="alert alert-success">{{Session::get('success')}}</div>
         @endif
         @if(Session::has('fail'))
         <div class="alert alert-danger">{{Session::get('fail')}}</div>
         @endif
         @csrf
    <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-normal">Please log in</h1>

        <div class="form-floating ">
            <input type="email" name="email" class="form-control mb-2" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
            <label for="floatingInput">Email address</label>
        </div>
        <span class="text-danger">@error('email') {{$message}} @enderror</span>
        <div class="form-floating">
            <input type="password" name="password" class="form-control mb-2" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <span class="text-danger">@error('password') {{$message}} @enderror</span>

        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        </div>
        
        <button class="w-100 btn btn-lg btn-outline-dark mb-2" type="submit">Login</button> 
      
            <div class=" my-3">
           <a href="{{route('registration')}}"> <span class="text-dark"> Don't have an account ?</span> Register</a>
        </div>
  </form>
     </div>
 </div>
    </div>
    <!-- Admin Notice,Ad & Events end -->

    <!-- main end -->
    @include('include.footer')
