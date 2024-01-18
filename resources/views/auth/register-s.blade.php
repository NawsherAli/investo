<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Investo - SignUp</title>

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
                                    <img src="assets/images/logo/logo.png" alt="" width="30%" height="30%">
                                </div>
<div class="container">
@if(session('error'))
    <div class="message-container bg-red-200 border-red-500 border-t-4 p-4 mb-4 rounded-lg">
        <p class="text-red-700">{{ session('error') }}</p>
    </div>
@endif
@if(session('success'))
    <div id="successMessage" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                <div class="d-flex align-items-center justify-content-center mb-3">
                                    <h1>Sign Up</h1>
                                </div>
                                <!-- Tabes -->
                                <ul class="nav nav-tabs nav-justified" id="myTabJustified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-justified" role="tab" aria-controls="home-justified" aria-selected="true">Personal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab-justified" data-toggle="tab" href="#profile-justified" role="tab" aria-controls="profile-justified" aria-selected="false">Fundraiser</a>
                                    </li>
                                </ul>
                                <div class="tab-content m-t-15" id="myTabContentJustified">
                                    <!-- 1st Tab -->
                                    <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab-justified">
                                        <form method="POST" action="{{ route('register.personal') }}">
                                         @csrf           
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-affix">
                                                            <!-- <i class="prefix-icon anticon anticon-user"></i> -->
                                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{old('name')}}">
                                                        </div>
                                                        <span style="color: red">{{ $errors->first('name') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-affix">
                                                            <!-- <i class="prefix-icon anticon anticon-user"></i> -->
                                                            <input type="text" class="form-control" name="contact" id="contact" placeholder="Phone Number"  value="{{old('contact')}}">
                                                        </div>
                                                        <span style="color: red">{{ $errors->first('contact') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-affix">
                                                    <!-- <i class="prefix-icon anticon anticon-user"></i> -->
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"  value="{{old('email')}}">
                                                </div>
                                                <span style="color: red">{{ $errors->first('email') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-affix">
                                                    <!-- <i class="prefix-icon anticon anticon-user"></i> -->
                                                    <input type="text" class="form-control" name="e_transfer_no" id="e-transfer-number" placeholder="E-Transfer Number"  value="{{old('e_transfer_no')}}">
                                                </div>
                                                 <span style="color: red">{{ $errors->first('e_transfer_no') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-affix m-b-10">
                                                    <!-- <i class="prefix-icon anticon anticon-lock"></i> -->
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
                                                </div>
                                                <span style="color: red">{{ $errors->first('password') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-affix m-b-10">
                                                    <!-- <i class="prefix-icon anticon anticon-lock"></i> -->
                                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                                </div>
                                                <span style="color: red">{{ $errors->first('password_confirmation') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="{{ route('login') }}" class="text-primary" >Already have an account</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- 2nd Tab -->
                                    <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab-justified">
                                        <form method="POST" action="{{ route('register.fundraiser') }}">   
                                         @csrf   
                                            <div class="form-group">
                                                <div class="input-affix">
                                                    <!-- <i class="prefix-icon anticon anticon-user"></i> -->
                                                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" value="{{old('company_name')}}">
                                                </div>
                                                <span style="color: red">{{ $errors->first('company_name') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-affix">
                                                    <!-- <i class="prefix-icon anticon anticon-user"></i> -->
                                                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Personal Fundraiser Full Name" value="{{old('fullname')}}">
                                                </div>
                                                <span style="color: red">{{ $errors->first('fullname') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-affix">
                                                    <!-- <i class="prefix-icon anticon anticon-user"></i> -->
                                                    <input type="text" class="form-control" name="company_email" id="company_email" placeholder="Company Email" value="{{old('company_email')}}">
                                                </div>
                                                <span style="color: red">{{ $errors->first('company_email') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-affix">
                                                    <!-- <i class="prefix-icon anticon anticon-user"></i> -->
                                                   <input type="text" class="form-control" name="contact" id="contact" placeholder="Phone Number"  value="{{old('contact')}}" value="{{old('company_email')}}">
                                                </div>
                                                <span style="color: red">{{ $errors->first('contact') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-affix">
                                                    <!-- <i class="prefix-icon anticon anticon-user"></i> -->
                                                    <input type="text" class="form-control" name="e_transfer_no" id="e-transfer-number" placeholder="E-Transfer Number"  value="{{old('e_transfer_no')}}">
                                                </div>
                                                 <span style="color: red">{{ $errors->first('e_transfer_no') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="charity_type" class="">
                                                    <option  selected="" disabled>Charity Type</option>
                                                    <option value="NL">Nails</option>
                                                    <option value="BN">Bananas</option>
                                                    <option value="HL">Helicopters</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="6" name="vission_mission" value="{{old('vission_mission')}}">Vision/Mission </textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-affix m-b-10">
                                                    <!-- <i class="prefix-icon anticon anticon-lock"></i> -->
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
                                                </div>
                                                <span style="color: red">{{ $errors->first('password') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-affix m-b-10">
                                                    <!-- <i class="prefix-icon anticon anticon-lock"></i> -->
                                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                                </div>
                                                <span style="color: red">{{ $errors->first('password_confirmation') }}</span>
                                            </div>

                                            <div class="form-group">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <button type="submit" class="btn btn-primary">Sign Up</button>
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