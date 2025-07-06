<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>


     <x-admin.blocks.style />

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="{{ asset('admin/img/signin.jpg') }}" class="w-100" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form action="{{ route('attempt') }}" method="post" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp" name="email"
                                                placeholder="Enter Email Address...">
                                            @error('email')
                                                <p class="mx-3 text-danger"><small>{{ $message }}</small></p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="password" placeholder="Password">
                                            @error('password')
                                                <p class="mx-3 text-danger"><small>{{ $message }}</small></p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                               <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                                <label class="custom-control-label" for="remember">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{route('forgotPassword')}}">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('register') }}" class="small" href="register.html">Create an
                                            Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

     <x-admin.blocks.script />
</body>

</html>
