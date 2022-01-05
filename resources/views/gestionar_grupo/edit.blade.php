@extends('layouts.template')

@section('header')Modificar grupo @endsection

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Modificar datos del grupo</h1>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="user" action="{{ route('grupos.update', [$grupo->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        name="nombre" placeholder="Nombre" value="{{$grupo->nombre}}">
                                </div>
                                <div class="form-group">
                                    <input type="time" class="form-control form-control-user" id="exampleInputEmail"
                                        name="hra_ini" placeholder="Hora inicio" value="{{$grupo->hra_ini}}">
                                </div>
                                <div class="form-group">
                                    <input type="time" class="form-control form-control-user" id="exampleInputEmail"
                                        name="hra_fin" placeholder="Hora fin" value="{{$grupo->hra_fin}}">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="exampleInputEmail"
                                        name="cupo" placeholder="Cupo" value="{{$grupo->cupo}}">
                                </div>
                                <div class="form-group">
                                    <label for="dia_sem">Dias: </label>
                                    <select name="dia_sem" class="form-select" aria-label="Default select example">
                                        <option value="Lun, Mie, Vie" selected>Lun, Mie, Vie</option> 
                                        <option value="Mar, Jue, Sab" >Mar, Jue, Sab</option> 
                                        <option value="Sab, Dom" >Sab, Dom</option> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="instructor_id">Instructores: </label>
                                    <select name="instructor_id" class="form-select" aria-label="Default select example">
                                        @foreach ($instructores as $instructor)
                                        <option value="{{$instructor->id}}" >{{$instructor->persona->nombre}} {{$instructor->persona->apellido}}</option> 
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="disciplina_id">Disciplinas: </label>
                                    <select name="disciplina_id" class="form-select" aria-label="Default select example">
                                        @foreach ($disciplinas as $disciplina)
                                        <option value="{{$disciplina->id}}" >{{$disciplina->nombre}}</option> 
                                        @endforeach 
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="submit" class="btn btn-facebook btn-user btn-block" value="Aceptar">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <a href="{{ route('grupos.index') }}" class="btn btn-primary btn-user btn-block">
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