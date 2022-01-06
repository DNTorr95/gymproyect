@extends('layouts.template')

@section('header')Administradores @endsection

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <p class="mb-4"></p>
                    <a href="{{'/personas/create'}}" class="btn btn-success btn-icon-split">
                        <span class="text">Registrar Administrador</span>
                    </a>
                    <div class="my-2"></div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de administradores</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Usuario</th>
                                            <th>Ci</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Huella</th>
                                            <th>Telefono</th><!--nullable-->
                                            <th>Correo</th><!--unique-->
                                            <th>Foto</th>
                                            <th>Fecha de nacimiento</th>
                                            <th>Genero</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Usuario</th>
                                            <th>Ci</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Huella</th>
                                            <th>Telefono</th><!--nullable-->
                                            <th>Correo</th><!--unique-->
                                            <th>Foto</th>
                                            <th>Fecha de nacimiento</th>
                                            <th>Genero</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       {{--  @php $i = 0 @endphp --}}
                                        @foreach ($personas as $persona)
                                        @if($persona->tipo == 'A')
                                        <tr>                                           
                                            <td>{{$persona->id}}</td>
                                            <td>{{$persona->usuario}}</td>
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
                                            <td>
                                                <a href="{{route('personas.administradores.edit', $persona->id)}}" class="btn btn-info btn-icon-split"
                                                style="height: 35px">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                    <span class="text">Editar</span>
                                                </a>
                                                <div class="my-2"></div>
                                                <form action="{{route('personas.destroy', $persona->id)}}" method="POST" 
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
                                           {{--  @php $i++ @endphp --}}
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->    
@endsection