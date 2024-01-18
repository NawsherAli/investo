<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ShredTheBottle - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo/logo.png')}}">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="app">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters h-100 full-height">
                <div class="col-lg-8 d-none d-lg-flex bg-primary-light" >
                    <div class="d-flex h-100 p-h-40 p-v-15   justify-content-between align-items-center">
                        <div>
                            <img src="assets/images/others/login-img.png" alt="">
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 bg-white ">
                    <div class="container h-100">
                        <div class="row no-gutters h-100 align-items-center">
                            <div class="col-md-12 col-lg-12 col-xl-12 mx-auto">
                                <div class="d-flex align-items-center justify-content-center mb-3">
                                     <img src="assets/images/logo/logo.png" alt="">
                                 </div>
                                 <div class="d-flex align-items-center justify-content-center mb-3">
                                     <h1>Login</h1>
                                 </div>
                                 <x-auth-session-status class="mb-4 text-primary" :status="session('status')" />
                                <form  action="{{ route('login') }}" method="POST" >
                                     @csrf
                                    <div class="form-group">
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                            
                                        </div>
                                        <span style="color: red">{{ $errors->first('email') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon anticon anticon-lock"></i>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                            
                                        </div>
                                        <span style="color: red">{{ $errors->first('password') }}</span>
                                    </div>
                                    <div class=" d-flex justify-content-between mb-3">
                                        <div class="checkbox">
                                            <input id="checkbox1" type="checkbox" name="remember" class="">
                                            <label for="checkbox1">Remember me</label>
                                        </div>
                                        <div class="">
                                            <a class="float-right font-size-13 text-dark" href="{{ route('password.request') }}"><b>Forgot Password?</b></a>
                                        </div>
                                    </div>
                                    
                                        
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <button type="submit" class="btn btn-primary" >Login</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="{{ route('register') }}" class="text-primary" >Create account</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>
</html>