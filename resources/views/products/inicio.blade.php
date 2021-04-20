@extends('layouts.app')
@section('content')
    <div class="container"><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de Productos
                        <a href="{{route('products.ircrear')}}" class="btn btn-success btn-sm float-right">Nuevo Producto</a>
                    </div>
                    
                    <div class="car-body">
                        @if(session('info'))
                            <div class="alert alert-success" role="alert">
                            {{ session('info') }}
                            </div>
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>   
                                        {{$product->descripcion}}
                                    </td>
                                    <td>
                                        {{$product->precio}}
                                    </td>
                                    <td>
                                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-outline-primary btn-sm">Editar</a>

                                        
                                        <a href="javascript:document.getElementById('delete-{{ $product->id }}').submit()" class="btn btn-outline-danger btn-sm">Eliminar</a>
                                        <form id="delete-{{ $product->id }}" action="{{route('products.destroy', $product->id)}}" method="POST">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                       
                            <a class="btn btn-outline-info btn-sm" href="{{ route('home')}}" >
                                Volver
                            </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

FIXME: PONER BOTON VOLVER A CARGAR DOCUMENTOS
FIXME: CONFIGURAR TABLA PARA QUE SE VEA SOLO LA INFORMACION DE CADA USUARIO
FIXME: Y NO LAS FRUTAS DE TODOS