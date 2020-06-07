<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/font-awesome-4.6.1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form class="login-form validate-form" action="{{ route('postulans.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <span class="login100-form-title">
                    REGISTRARSE
                </span>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="wrap-input100 validate-input {{ $errors->has('name')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('name')? $errors->first('name') : 'Nombre completo es requerido' }}">
                            <input class="input100" type="text" name="name" placeholder="Nombre"  value="{{ old('name')}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="wrap-input100 validate-input {{ $errors->has('lastname')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('lastname')? $errors->first('lastname') : 'Apellido es requerido' }}">
                            <input class="input100" type="text" name="lastname" placeholder="Apellido"  value="{{ old('lastname')}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="wrap-input100 validate-input {{ $errors->has('email')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('email')? $errors->first('email') : 'E-mail valido es requerido: example@abc.xyz' }}">
                    <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="wrap-input100 validate-input {{ $errors->has('phone')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('phone')? $errors->first('phone') : 'Telefono/Celular valido es requerido.' }}">
                            <input class="input100" type="text" name="phone" placeholder="Telefono/Celular" value="{{ old('phone') }}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="wrap-input100 validate-input {{ $errors->has('gender')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('gender')? $errors->first('gender') : 'Genero valido es requerido' }}">
                            <select class="input100" name="gender">
                                <option disabled hidden selected>Seleccionar genero</option>
                                <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>MASCULINO</option>
                                <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>FEMENINO</option>
                            </select>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-genderless" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="wrap-input100 validate-input {{ $errors->has('password')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('password')? $errors->first('password') : 'Password es requerido' }}">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input {{ $errors->has('password_confirm')? 'alert-validate' : '' }}" data-validate="{{ $errors->has('password_confirm')? $errors->first('password_confirm') : 'Confirmacion de Password es requerido' }}">
                    <input class="input100" type="password" name="password_confirm" placeholder="Repite la contrasenia">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Register
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="container-login100-form-btn">
                            <a class="cancel100-form-btn" href="{{ url('/') }}">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="text-center p-t-25">
                    <a style="color: white" class="txt2" href="{{ url('/login') }}">
                        I already have a membership
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>