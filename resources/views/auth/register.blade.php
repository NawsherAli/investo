<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cash Flix - SignUp</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo/logo.png')}}">

    <!-- page css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Core css -->
    <link href="{{asset('assets/css/login-page.css')}}" rel="stylesheet">

</head>
<body>
    <div class="maincontainer" >
        <div class="items">
            
            <div class="logo"></div>
            <h1 style="text-align: center;"><span style="color: #ff004f">CASH</span> <span style="color: #007bff">FLIX</span>  </h1>
            <p style="text-align: center; color: white">Fastest growing system</p>
            <form method="POST" action="{{ route('register.personal') }}" class="form_inputs">
                @csrf  
                <div class="input-container">
                    <input type="input" placeholder="Please enter your name" class="user-input" required name="name">
                    <i class="fas fa-user"></i>
                    <div><span style="color: red">{{ $errors->first('name') }}</span></div>
                </div>
                <div class="email_container">
                    <input type="email" placeholder="Please enter your email" class="email_input" required name="email">
                    <div><span style="color: red">{{ $errors->first('email') }}</span></div>
                </div>
                <div class="number_container">
                    <input type="number" placeholder="Please enter your number" class="number_input" required name="contact">
                    <div><span style="color: red">{{ $errors->first('contact') }}</span></div>
                </div>
                <div class="password-container">
                    <input type="password" placeholder="Password" class="password-input" required name="password">
                    <i class="fas fa-lock"></i>
                    <div><span style="color: red">{{ $errors->first('password') }}</span></div>
                </div>
                <div class="cnfrm_password-container">
                    <input type="password" placeholder="Confrm Password" class="password-input" required name="password_confirmation">
                    <i class="fas fa-lock"></i>
                    <div><span style="color: red">{{ $errors->first('password_confirmation') }}</span></div>
                </div>
                <div class="referal_container">
                    <input type="text" placeholder="Please enter your referal code" class="referal_code_input" name="referal_by" value="{{ request('referral_code') }}">
                    <div><span style="color: red">{{ $errors->first('referal_code') }}</span></div>
                </div>
                <button type="submit" class="btn">Create Account</button>
                <span class="keep_in custom_font">
                    <input type="checkbox" id="keepLoggedInCheckbox">
                    <label for="keepLoggedInCheckbox" class="keep_in_label">Keep logged in</label>
                    <span class="forget custon_font"><a href="">forgot password?</a></span>
                </span>
                
            </form>
               <p class="create_acc custom_font"><a href="{{ route('login') }}" class="text-primary" style="color: white">Already have an account</a></p>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer_contentt">
          <p>Email:cashflix123@example.com<br>copyright©2023 cashflix.com</p>
        </div>
      </footer>
</body>
</html>
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/vendors/select2/select2.min.js"></script>

</body>

</html>