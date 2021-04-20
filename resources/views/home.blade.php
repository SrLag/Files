@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subir archivos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <form method="POST" action="{{ route('user.files.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="form-control" name="files[]" multiple required>

                        <button type="submit" class="mt-4 btn btn-outline-primary float-right" >
                            Subir
                        </button>

                    </form>

                    <a href="{{route('user.files.index')}}" class="btn btn-outline-primary btn-sm mt-4">Mis Archivos</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
