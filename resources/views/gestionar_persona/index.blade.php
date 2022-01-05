@extends('layouts.template')

@section('header')Gestionar Instructores @endsection

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Cantidad de instructores en el sistema:  
                        {{count($personas)}}
                    </h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <a href="{{'/personas/instructores/create'}}" class="btn btn-success btn-icon-split">
                        <span class="text">Registrar Instructor</span>
                    </a>
                    <div class="my-2"></div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de instructores</h6>
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
                                            <th>Huella</th>
                                            <th>Telefono</th><!--nullable-->
                                            <th>Correo</th><!--unique-->
                                            <th>Foto</th>
                                            <th>Fecha de nacimiento</th>
                                            <th>Genero</th>
                                            <th>Especialidad</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Ci</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Huella</th>
                                            <th>Telefono</th><!--nullable-->
                                            <th>Correo</th><!--unique-->
                                            <th>Foto</th>
                                            <th>Fecha de nacimiento</th>
                                            <th>Genero</th>
                                            <th>Especialidad</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $i = 0 @endphp
                                        @foreach ($personas as $persona)
                                        <tr>                                           
                                            <td>{{$persona->instructor->id}}</td>
                                            <td>{{$persona->ci}}</td>
                                            <td>{{$persona->nombre}}</td>
                                            <td>{{$persona->apellido}}</td>
                                            <td>{{$persona->url_huella}}</td>
                                            <td>{{$persona->tel}}</td>
                                            <td>{{$persona->email}}</td>
                                            <td><img src="{{asset($persona->foto)}}" alt="foto" style="width: 100px"></td>
                                            <!--<td>{{$persona->foto}}</td>-->
                                            <td>{{$persona->fecha_naci}}</td>
                                            <td>{{$persona->genero}}</td>
                                            <td>{{$persona->instructor->especialidad}}</td>
                                            <td>
                                                <a href="{{route('persona.instructor.edit', $persona->id)}}" class="btn btn-info btn-icon-split"
                                                style="height: 35px">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                    <span class="text">Editar</span>
                                                </a>
                                                <div class="my-2"></div>
                                                <form action="{{route('persona.instructor.destroy', $persona->id)}}" method="POST" 
                                                    class="btn btn-danger btn-icon-split"
                                                style="height: 35px; width: 110px;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <input type="submit" value="Eliminar"  class="btn btn-danger btn-icon-split">
                                                </form>                                         
                                                <!--<a href="#" class="btn btn-danger btn-icon-split"
                                                style="height: 35px;">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Eliminar</span>
                                                </a>-->
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