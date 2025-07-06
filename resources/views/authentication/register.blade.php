<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <x-admin.blocks.style />

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <img src="{{ asset('admin/img/signin.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="{{ route('register_attempt') }}" method="post" class="user">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="name"
                                            id="name" value="{{ old('name') }}" placeholder="Name">
                                        @error('name')
                                            <p class="mx-3 text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="phone"
                                            id="phone" value="{{ old('phone') }}" placeholder="Phone">
                                        @error('phone')
                                            <p class="mx-3 text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        id="email" value="{{ old('email') }}" placeholder="Email Address">
                                    @error('email')
                                        <p class="mx-3 text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            id="password" placeholder="Password">
                                        @error('password')
                                            <p class="mx-3 text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="password_confirmation" id="password_confirmation"
                                            placeholder="Repeat Password">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block"
                                    value="Register Account">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{route('forgotPassword')}}">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('login') }}" class="small" href="login.html">Already have an account?
                                    Login!</a>
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
