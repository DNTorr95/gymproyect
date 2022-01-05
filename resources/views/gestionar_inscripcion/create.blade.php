@extends('layouts.template')

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrar inscripcion</h1>
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
                            <form class="user" action="{{ route('inscripciones.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="exampleInputEmail"
                                        name="cliente_id" placeholder="Id del cliente" value="{{ old('cliente_id') }}">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" id="exampleInputEmail"
                                        name="fecha_ini" placeholder="Fecha inicio" value="{{ old('fecha_ini') }}">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" id="exampleInputEmail"
                                        name="fecha_fin" placeholder="Fecha fin" value="{{ old('fecha_fin') }}">
                                </div>
                                <!--<div class="form-group">
                                    <label for="paquete_id">Paquete: </label>
                                    <select name="paqeuete_id" class="form-select" aria-label="Default select example">
                                        @foreach ($paquetes as $paquete)
                                        <option value="{{$paquete->id}}" >{{$paquete->nombre}}</option> 
                                        @endforeach 
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label for="flexCheckDefault" class="form-check-label">Grupos: </label>
                                    @foreach ($grupos as $grupo)
                                        @if ($grupo->cupo > 0)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$grupo->disciplina->id}}" id="flexCheckDefault" name="{{$grupo->id}}">
                                            <label class="form-check-label" for="flexCheckDefault">
                                              {{$grupo->nombre}} {{$grupo->disciplina->nombre}} | {{$grupo->hra_ini}} - {{$grupo->hra_fin}} | {{$grupo->dia_sem}} | Cupos: {{$grupo->cupo}}
                                            </label>
                                          </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!--<div class="form-group">
                                    <label for="flexCheckDefault" class="form-check-label">Paquetes: </label>
                                    @foreach ($paquetes as $paquete)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$paquete->id}}" id="flexCheckDefault" name="{{$paquete->nombre}}">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          {{$paquete->nombre}} {{$paquete->duracion}}
                                        </label>
                                      </div>
                                    @endforeach
                                </div>-->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="submit" class="btn btn-facebook btn-user btn-block" value="Aceptar">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <a href="{{ route('inscripciones.index') }}"
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
