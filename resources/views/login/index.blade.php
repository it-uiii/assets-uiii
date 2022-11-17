<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Asset UIII | {{ $title }}</title>
</head>
<body>
<div class="d-lg-flex half">
<div class="bg order-1 order-md-2" style="background-image: url('images/bg_2.jpeg');"></div>
<div class="contents order-2 order-md-1">

    <div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-7">
        <div class="mb-4 text-center">
            <img class="img-fluid" style="max-width:330px" src="{{ asset('images/gold_uiii.png') }}" alt="">
            <p class="mb-4 mt-4">Welcome to single sign on (SSO) uiii <br> Enter your username and password</p>
        </div>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group first">
            <label for="username">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" autocomplete="off" autofocus>
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            </div>
            <div class="form-group last mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            
            </div>
            
            <div class="d-flex mb-5 align-items-center">
            {{-- <a class="forgot-pass" href="">Guest Account</a> --}}
            <span class="ml-auto"><a href="" data-toggle="modal" data-target="#exampleModalScrollable" class="forgot-pass">Help</a></span> 
            </div>

            <input type="submit" value="Log In" class="btn btn-block btn-primary">

            {{-- <span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span> --}}
            
            <div class="social-login">
            {{-- <a href="#" class="facebook btn d-flex justify-content-center align-items-center">
                New SSO Account
            </a> --}}
            {{-- <a href="#" class="google btn d-flex justify-content-center align-items-center">
                <span class="icon-google mr-3"></span> Login with  Google
            </a> --}}
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">
                Help
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-center">
            if you need assist you can <a href="mailto:ict@uiii.ac.id">ict@uiii.ac.id</a> 
            <br>
            or 
            <br>
            you can open ticket with individual website to <a href="https://it.uiii.ac.id/">IT UIII CENTER</a>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>


    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>