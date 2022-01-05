@extends('layouts.template')

@section('header')Registrar nueva persona @endsection

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrar persona</h1>
                            </div>
                            {{ csrf_field() }}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="user" action="{{ route('personas.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        name="ci" placeholder="Ci" value="{{ old('ci') }}">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            name="nombre" placeholder="Nombres" value="{{ old('nombre') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            name="apellido" placeholder="Apellidos" value="{{ old('apellido') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        name="url_huella" placeholder="Huella" value="{{ old('url_huella') }}">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control form-control-user" id="exampleInputEmail"
                                        name="tel" placeholder="Telefono" value="{{ old('tel') }}">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        name="email" placeholder="Email" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" id="exampleInputEmail"
                                        name="fecha_naci" placeholder="Fecha de nacimiento" value="{{ old('fecha_naci') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        name="edad" placeholder="Edad (Solo para Clientes)" value="{{ old('edad') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        name="especialidad" placeholder="Especialidad (Solo para Instructores)" value="{{ old('especialidad') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        name="usuario" placeholder="Usuario (Solo para Administradores)" value="{{ old('usuario') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputEmail"
                                        name="password" placeholder="Password (Solo para Administradores)">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputEmail"
                                        name="password_confirmation" placeholder="Repetir Password (Solo para Administradores)">
                                </div>                               
                                <div class="form-group">
                                    Genero:
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="genero" id="flexRadioDefault1" value="{{'M'}}" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Masculino
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="genero" id="flexRadioDefault2" value="{{'F'}}">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          Femenino
                                        </label>
                                      </div>
                                </div>
                                <!--<div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        name="tipo" placeholder="Tipo administrador/cliente/instructor" value="{{ old('tipo') }}">
                                </div>-->
                                <div class="form-group">
                                    <label for="tipo">Tipo: </label>
                                    <select name="tipo" class="form-select" aria-label="Default select example">
                                        <option value="{{'A'}}" selected>Administrador</option>
                                        <option value="{{'C'}}">Cliente</option>
                                        <option value="{{'I'}}">Instructor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto: </label>
                                    <input type="file" id="exampleInputEmail" name="foto" placeholder="Foto" value="{{ old('foto') }}" accept="image/*">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="submit" class="btn btn-facebook btn-user btn-block" value="Aceptar">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <a href="{{ route('menu') }}"
                                            class="btn btn-primary btn-user btn-block">
                                            Cancelar
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
