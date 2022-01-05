@extends('layouts.template')

@section('header')Control de peso @endsection

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    
                    <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>-->
                    <div class="row">
                        <div class="col-lg-3 d-none d-lg-block ">
                            <img src="{{asset($persona->foto)}}" alt="foto" style="width: 230px; height: 230px;">
                        </div>
                        <div class="col-lg-5">
                            <ul class="list-group" style="list-style-type: none; width: 100%">
                                <li ><b>Id: </b>{{$cliente->id}}</li>
                                <li ><b>Ci: </b>{{$persona->ci}}</li>
                                <li ><b>Nombre: </b>{{$persona->nombre}}</li>
                                <li ><b>Apellido: </b>{{$persona->apellido}}</li>
                                <li ><b>Telefono: </b>{{$persona->tel}}</li>
                                <li ><b>Email: </b>{{$persona->email}}</li>
                                <li ><b>Fecha de nacimiento: </b>{{$persona->fecha_naci}}</li>
                                <li ><b>Edad: </b>{{$cliente->edad}}</li>
                                <li ><b>Genero: </b>{{$persona->genero}}</li>
                            </ul>
                        </div>
                    </div>        
                    <p class="mb-4"></p>       
                    <a href="{{route('personas.clientes.pesos.create', $cliente->id)}}" class="btn btn-success btn-icon-split">
                        <span class="text">Registrar Peso</span>
                    </a>
                    <div class="my-2"></div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de peso del cliente</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark"> <!--Aqui adicione esa clase-->
                                        <tr>
                                            <th>Id</th>
                                            <th>Altura</th>
                                            <th>Peso</th>
                                            <th>IMC</th>
                                            <th>Fecha</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark"> <!--Aqui adicione esa clase-->
                                        <tr>
                                            <th>Id</th>
                                            <th>Altura</th>
                                            <th>Peso</th>
                                            <th>IMC</th>
                                            <th>Fecha</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($cliente->peso as $p)
                                        <tr>                                           
                                            <td>{{$p->id}}</td>
                                            <td>{{$p->altura}}</td>
                                            <td>{{$p->peso}}</td>
                                            <td>{{$p->imc}}</td>
                                            <td>{{$p->fecha}}</td>
                                            <td>
                                                <a href="{{route('personas.clientes.pesos.edit', [$p->id, $persona->id])}}" class="btn btn-info btn-icon-split"
                                                style="height: 35px">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                    <span class="text">Editar</span>
                                                </a>
                                                <div class="my-2"></div>
                                                <form action="{{route('personas.clientes.pesos.destroy', [$p->id, $persona->id])}}" method="POST" 
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