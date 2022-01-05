@extends('layouts.template')

@section('header')Modificar disciplina @endsection

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Modificar datos de la disciplina</h1>
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
                            <form class="user" action="{{ route('disciplinas.update', [$disciplina->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        name="nombre" placeholder="Nombre" value="{{$disciplina->nombre}}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        name="descripcion" placeholder="Descripcion" value="{{$disciplina->descripcion}}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        name="precio" placeholder="Precio" value="{{$disciplina->precio}}">
                                </div>
                                <div class="form-group">
                                    <label for="area_id">Area: </label>
                                    <select name="area_id" class="form-select" aria-label="Default select example">
                                        @foreach ($areas as $area)
                                        <option value="{{$area->id}}" >{{$area->nombre}}</option> 
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="paquete_id">Paquete: </label>
                                    <select name="paquete_id" class="form-select" aria-label="Default select example">
                                        @foreach ($paquetes as $paquete)
                                        <option value="{{$paquete->id}}" >{{$paquete->nombre}}</option> 
                                        @endforeach 
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="submit" class="btn btn-facebook btn-user btn-block" value="Aceptar">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <a href="{{ route('disciplinas.index') }}" class="btn btn-primary btn-user btn-block">
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