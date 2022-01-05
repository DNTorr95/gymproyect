@extends('layouts.template')

@section('header')Asistencias @endsection

@section('content')
                <!-- Begin Page Content -->
                    <!-- Page Heading -->

                    <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>-->
                    <!--DESDE AQUI-->
                        <div class="p-3">
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
                            <form class="user" action="{{ route('asistencias.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" id="exampleFirstName"
                                            name="ci" placeholder="Ci de la persona"> 
                                        <!--@error('ci')
                                        <div style="color: red">{{ $message }}</div>
                                        @enderror-->    
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="submit" class="btn btn-success" value="Registrar asistencia">
                                    </div>
                                    
                                </div>                      
                                <!--<div class="form-group">
                                    <input type="date" class="form-control form-control-user" id="exampleInputEmail"
                                        name="fecha" placeholder="Fecha" value="">
                                </div>-->
                            </form>
                        </div>
                    </div>
                    <!--HASTA AQUI AQUI-->
                    <!--<a href="{{'/personas/create'}}" class="btn btn-success btn-icon-split">
                        <span class="text">Registrar Asistencia</span>
                    </a>
                    <div class="my-2"></div>-->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de clienes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Ci</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Dia</th>
                                            <th>fecha</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Ci</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Dia</th>
                                            <th>fecha</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $i = 0 @endphp
                                        @foreach ($asistencias as $asistencia)
                                        <tr>                                           
                                            <td>{{$asistencia->id}}</td>
                                            <td>{{$asistencia->persona->ci}}</td>
                                            <td>{{$asistencia->persona->nombre}}</td>
                                            <td>{{$asistencia->persona->apellido}}</td>
                                            <td>{{$asistencia->dia}}</td>
                                            <td>{{$asistencia->fecha}}</td>
                                            <td>
                                                <a href="{{route('asistencias.edit', $asistencia->id)}}" class="btn btn-info btn-icon-split"
                                                style="height: 35px">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                    <span class="text">Editar</span>
                                                </a>
                                                <div class="my-2"></div>
                                                <form action="{{route('asistencias.destroy', $asistencia->id)}}" method="POST" 
                                                    class="btn btn-danger btn-icon-split"
                                                style="height: 35px; width: 110px;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <input type="submit" value="Eliminar"  class="btn btn-danger btn-icon-split">
                                                </form>                                         
                                            </td>
                                            @php $i++ @endphp
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->    
@endsection