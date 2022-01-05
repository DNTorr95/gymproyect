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
                                <h1 class="h4 text-gray-900 mb-4">Registrar nota de venta</h1>
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
                            <form class="user" action="{{ route('notaDeVentas.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="exampleInputEmail"
                                        name="cliente_id" placeholder="Id del cliente" value="{{ old('cliente_id') }}">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" id="exampleInputEmail"
                                        name="fecha" placeholder="Fecha" value="{{ old('fecha') }}">
                                </div>
                                <div class="form-group">
                                    <label for="flexCheckDefault" class="form-check-label">Productos: </label>
                                    @foreach ($productos as $producto)
                                        @if ($producto->stock > 0)
                                        <div class="form-check">
                                            <label class="form-check-label" for="flexCheckDefault">
                                              {{$producto->nombre}} | Precio: {{$producto->precio}} | Stock: {{$producto->stock}}
                                            </label>
                                            <input class="form" type="number"  id="flexCheckDefault" name="{{$producto->id}}">
                                          </div>
                                          <div class="form-group"></div>
                                        @endif
                                    @endforeach
                                </div>
                                <!--<div class="form-group">
                                    <input class="form" type="hidden"  id="flexCheckDefault" name="administrador_id" value="{{Auth::user()->id}}">
                                </div>-->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="submit" class="btn btn-facebook btn-user btn-block" value="Aceptar">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <a href="{{ route('notaDeVentas.index') }}"
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
