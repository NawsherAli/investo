<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ShredTheBottle - Reset Password</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo/logo.png')}}">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/select2/select2.css')}}" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters h-100 full-height">
                <div class="col-lg-4 d-none d-lg-flex  " ></div>
                <div class="col-lg-4 bg-white ">
                    <div class="container h-100">
                        <div class="row no-gutters h-100 align-items-center">
                            <div class="col-md-12 col-lg-12 col-xl-12 mx-auto">
                                <div class="d-flex align-items-center justify-content-center mb-3">
                                    <!-- <img src="assets/images/logo/logo.png" alt="" width="30%" height="30%"> -->
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-3">
                                    <h1>Reset Password</h1>
                                </div>
                                <!-- Tabes -->
                                <form method="POST" action="{{ route('password.store') }}">
                                         @csrf           
                                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                            <div class="form-group">
                                                <div class="input-affix">
                                                    <!-- <i class="prefix-icon anticon anticon-user"></i> -->
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"  value="{{ old('email', $request->email)}}" >
                                                </div>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <div class="input-affix m-b-10">
                                                    <!-- <i class="prefix-icon anticon anticon-lock"></i> -->
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
                                                </div>
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <div class="input-affix m-b-10">
                                                    <!-- <i class="prefix-icon anticon anticon-lock"></i> -->
                                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                                </div>
                                               <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <button type="submit" class="btn btn-primary">Reset Password</button>
                                                </div>
                                            </div>
                                        </form>
                                                             
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-flex  " ></div>
            </div>
        </div>
    </div>
    
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/vendors/select2/select2.min.js"></script>
</body>

</html>