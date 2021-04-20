@extends('layouts.app')
@section('content')
    <div class="container"><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Productos
                    </div>
                    
                    <div class="car-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @method('put')
                            @csrf
        <!--USAR EL  @csrf AL USAR UN FORMUARIO EN LARAVEL-->
                            <div class="form">
                                <label for="">Descripción</label>
                                <input type="text" class="form-control" value="{{$product->descripcion}}" name="description">
                            </div>
                            <div class="form">
                                <label for="">Precio</label>
                                <input type="number" class="form-control" value="{{$product->precio}}" name="price">
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Guardar</button>
                            <a href="{{ route('products.index')}}" class="btn btn-outline-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection