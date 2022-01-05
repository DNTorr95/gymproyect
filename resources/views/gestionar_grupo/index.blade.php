@extends('layouts.template')

@section('header')Grupos @endsection

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <p class="mb-4"></p>       
                    <a href="{{'/grupos/create'}}" class="btn btn-success btn-icon-split">
                        <span class="text">Registrar Grupo</span>
                    </a>
                    <div class="my-2"></div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de grupos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Dias a la semana</th>
                                            <th>hora inicio</th>
                                            <th>hora fin</th>
                                            <th>cupo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Dias a la semana</th>
                                            <th>hora inicio</th>
                                            <th>hora fin</th>
                                            <th>cupo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($grupos as $grupo)
                                        <tr>                                           
                                            <td>{{$grupo->id}}</td>
                                            <td>{{$grupo->nombre}}</td>
                                            <td>{{$grupo->dia_sem}}</td>
                                            <td>{{$grupo->hra_ini}}</td>
                                            <td>{{$grupo->hra_fin}}</td>
                                            <td>{{$grupo->cupo}}</td>
                                            <td>
                                                <a href="{{route('grupos.edit', $grupo->id)}}" class="btn btn-info btn-icon-split"
                                                style="height: 35px">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                    <span class="text">Editar</span>
                                                </a>
                                                <div class="my-2"></div>
                                                <form action="{{route('grupos.destroy', $grupo->id)}}" method="POST" 
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