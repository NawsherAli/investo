<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cash Flix - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo/logo.png')}}">

    <!-- page css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Core css -->
    <link href="{{asset('assets/css/login-page.css')}}" rel="stylesheet">

</head>

<body>
    <div class="maincontainer">

        <div class="items">
            <div class="logo"></div>
            <x-auth-session-status class="mb-4 text-primary" :status="session('status')" />
            @if(session('error'))
        <div class="message-container bg-red-200 border-red-500 border-t-4 p-4 mb-4 rounded-lg">
            <p class="text-red-700" style="background-color: red; padding: 10px; border-radius: 7px; color: white">{{ session('error') }}</p>
        </div>
        @endif
        @if(session('success'))
            <div id="successMessage" class="alert alert-success">
                
                <p style="background-color: lightgreen; padding: 10px; border-radius: 7px; color: green">{{ session('success') }}</p>
            </div>
        @endif
            <form  action="{{ route('login') }}" method="POST" class="form_inputs">
                @csrf
                <div class="email_container">
                    <h1 style="text-align: center;"><span style="color: #ff004f">CASH</span> <span style="color: #007bff">FLIX</span>  </h1>
                    <p style="text-align: center; color: white">Fastest growing system</p>
                    <input type="email" placeholder="Please enter your email" class="email_input" required name="email">
                    <div><span style="color: red">{{ $errors->first('email') }}</span></div>
                </div>
                
                <div class="password-container">
                    <input type="password" placeholder="Password" class="password-input" required name="password">
                    <i class="fas fa-lock"></i>
                    <div><span style="color: red">{{ $errors->first('password') }}</span></div>
                </div>

               <button type="submit" class="btn" >Get started</button>

                <span class="keep_in custom_font">
                    <input type="checkbox" id="keepLoggedInCheckbox">
                    <label for="keepLoggedInCheckbox" class="keep_in_label">Keep logged in</label>
                    <span class="forget custon_font"><a href="{{ route('password.request') }}">forget password?</a></span>
                </span>
                
            </form>
               <p class="create_acc custom_font"><a href="{{ route('register') }}" style="color: white">Create Account</a>
               </p>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer_contentt">
          <p>Email: cashflix123@example.com <br>copyright©2023 cashflix.com</p>
        </div>
      </footer>

          <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>
</body>
</html>