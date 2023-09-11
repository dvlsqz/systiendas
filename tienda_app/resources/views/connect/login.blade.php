@extends('master')
@section('title', 'Ingresar a mi cuenta')

@section('content')
    <div class="inside">
        <div class="page">
            <div class="ccard shadow">
                <div class="inside">
                    <h2 class="title tcenter mtop32"> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        Ingresar a mi cuenta
                    </h2>

                    <div class="form mtop32">
                        {!! Form::open(['url' => '/login', 'id' => 'form_login']) !!}
                            <label for="email"> Correo Electronico:</label>
                            <div class="group">
                                <i class="far fa-envelope-open"></i>
                                {!! Form::email('email', null, ['class' => 'input']) !!}
                            </div>

                            <label for="password " class="mtop16"> Contraseña:</label>
                            <div class="group">
                                <i class="fas fa-fingerprint"></i>
                                {!! Form::password('password', ['class' => 'input']) !!}
                            </div>
                            <a href="{{ url('/recover') }}" class="btn-link mtop8 sl">¿Ha olvidado su contraseña?</a>
                            {!! Form::submit('Ingresar', ['class' => 'btn mtop32']) !!}
                        {!! Form::close() !!}

                        <div class="btns">
                            <a href="{{ url('/register') }}" class="btn btn-green sl"><i class="far fa-user-circle"></i> Registarse</a>
                            <a href="#" class="btn btn-facebook mtop16 sl"><i class="fab fa-facebook-f"></i> Ingresar con Facebook</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop