<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Login</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
        <!--Favicons-->
    <link rel="shortcut icon" href="{{asset('resume/img/favicon.png')}}" type="image/x-icon">
        <script type='text/javascript' src=''></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900 &display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif
            }

            body {
                background: #ecf0f3
            }

            .wrapper {
                max-width: 350px;
                min-height: 500px;
                margin: 80px auto;
                padding: 40px 30px 30px;
                background-color: #ecf0f3;
                border-radius: 15px;
                box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff
            }

            .logo {
                width: 80px;
                margin: auto
            }

            .logo img {
                width: 100%;
                height: 80px;
                object-fit: cover;
                border-radius: 50%;
                box-shadow: 0 0 3px #5f5f5f, 0 0 0 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff
            }

            .wrapper .name {
                font-weight: 600;
                font-size: 1.4rem;
                letter-spacing: 1.3px;
                padding-left: 10px;
                color: #555
            }

            .wrapper .form-field input {
                width: 100%;
                display: block;
                border: none;
                outline: none;
                background: none;
                font-size: 1.2rem;
                color: #666;
                padding: 10px 15px 10px 10px
            }

            .wrapper .form-field {
                padding-left: 10px;
                margin-bottom: 20px;
                border-radius: 20px;
                box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff
            }

            .wrapper .form-field .fas {
                color: #555
            }

            .wrapper .btn {
                box-shadow: none;
                width: 100%;
                height: 40px;
                background-color: #03A9F4;
                color: #fff;
                border-radius: 25px;
                box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
                letter-spacing: 1.3px
            }

            .wrapper .btn:hover {
                background-color: #039BE5
            }

            .wrapper a {
                text-decoration: none;
                font-size: 0.8rem;
                color: #03A9F4
            }

            .wrapper a:hover {
                color: #039BE5
            }

            @media(max-width: 380px) {
                .wrapper {
                    margin: 30px 20px;
                    padding: 40px 15px 15px
                }
            }
        </style>
    </head>
    <body oncontextmenu='return false' class='snippet-body'>
        <div class="wrapper">
            <div class="logo">
                <img src="{{asset('resume/img/favicon.png')}}" alt="">
            </div>
            <div class="text-center mt-4 name">
                Login
            </div>
          
                <form method="POST" class="p-3 mt-3"  action="{{ route('login') }}">
                    @csrf
              
                    
                    <div class="form-group row">
                        
                        <div class="col-md-12 form-field d-flex align-items-center">
                            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                     

                        <div class="col-md-12 form-field d-flex align-items-center">
                            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                <button class="btn mt-3">Login</button>
            </form>
            <div class="text-center fs-6">
                <a href="{{route('welcome')}}"><b>Go back Home</b></a>
               
            </div>
        </div>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src=''></script>
        <script type='text/javascript' src=''></script>
        <script type='text/Javascript'></script>
    </body>
</html>
