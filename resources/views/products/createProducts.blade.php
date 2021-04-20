@extends('layouts.app')
@section('content')
    <div class="container"><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Crear Productos
                    </div>
                    
                    <div class="car-body">
                        <form action="{{route('products.store')}}" method="POST">
                            @csrf
        <!--USAR EL  @csrf AL USAR UN FORMUARIO EN LARAVEL-->
                            <div class="form">
                                <label for="">Descripción</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                            <div class="form">
                                <label for="">Precio</label>
                                <input type="number" class="form-control" name="price">
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Guardar</button>
                            <a href="{{route('products.index')}}" class="btn btn-outline-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection