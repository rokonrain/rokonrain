@extends('layouts.app')

@section('content')
    <style>
        html,
        .m-b-md {
            margin-bottom: 10px;
        }

        .py-1 {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .button {
            font: bold 11px Arial;
            text-decoration: none;
            background-color: #EEEEEE;
            color: #333333;
            padding: 2px 6px 2px 6px;
            border-top: 1px solid #CCCCCC;
            border-right: 1px solid #333333;
            border-bottom: 1px solid #333333;
            border-left: 1px solid #CCCCCC;
        }

    </style>
    
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="6000">
                <img src="{{ asset('storage/blps1.png') }}" class="d-block w-100" alt="..." height="430px">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="{{ URL('storage/blpaaa.jpg') }}" class="d-block w-100" alt="..." height="430px">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="{{ URL('storage/passengerterminal.jpg') }}" class="d-block w-100" alt="..." height="430px">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="{{ URL('storage/checkpost.jpg') }}" class="d-block w-100" alt="..." height="430px">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="{{ URL('storage/busterminal.jpg') }}" class="d-block w-100" alt="..." height="430px">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="{{ URL('storage/transhipment.jpg') }}" class="d-block w-100" alt="..." height="430px">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="{{ URL('storage/export.jpg') }}" class="d-block w-100" alt="..." height="430px">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/blpabb.jpg') }}" class="d-block w-100" alt="..." height="430px">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
    <div class="content text-wrap" style="text-align: center;">
        <div class="title m-b-md"
            style="font-family: 'Nunito', sans-serif; font-size: 84px; color: #636b6f; font-weight: 200;">
            <p class="text-break">BLPA Porter Management System</p>
        </div>
    </div>
    
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="{{ asset('storage/omicron.jpeg') }}" class="d-block w-100" alt="..." height="365px">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">

                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('register'))
                                        <ul class="nav nav-pills nav-fill">
                                            <li class="nav-item">
                                                <a class="button" aria-current="page"
                                                    href="{{ route('register') }}">Register</a>
                                            </li>
                                        </ul>
                                    @endif

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#navbarmenu").hide();
    </script>
@endsection
