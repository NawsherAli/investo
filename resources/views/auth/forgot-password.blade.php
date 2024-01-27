<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Investo - Forgot Password</title>

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
                <div class="col-lg-4 d-none d-lg-flex " >
                    
                </div>
                <div class="col-lg-4 bg-white ">
                    <div class="container h-100">
                        <div class="row no-gutters h-100 align-items-center">
                            <div class="col-md-12 col-lg-12 col-xl-12 mx-auto">
                                <div class="d-flex align-items-center justify-content-center mb-3">
                                     <img src="assets/images/logo/logo.png" alt="">
                                 </div>
                                 <div class="d-flex align-items-center justify-content-center mb-3">
                                     <h1>Forgot Password</h1>
                                 </div>
                                 <div class="mb-4 text-sm text-gray-600">
                                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                </div>
                                 <x-auth-session-status class="mb-4" :status="session('status')" />
                                <form  method="POST" action="{{ route('password.email') }}" >
                                     @csrf
                                    <div class="form-group">
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required autofocus>
                                            
                                        </div>
                                        <span style="color: red">{{ $errors->first('email') }}</span>
                                    </div>                                   
                                        
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <button type="submit" class="btn btn-primary" >Email Password Reset Link</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="{{ route('login') }}" class="text-primary" >Goto Login</a>
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