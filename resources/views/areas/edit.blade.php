@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="text-center display-3">Actualizar informacion</h1>
            <form action="{{route('areas.update', $areas)}}" method="post">
                @csrf
                @method('put')
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="{{$areas->nombre}}"  required/>
                <br>
                <button class="btn btn-success" type="submit">Actualizar formulario</button>
                <a href="{{route('areas')}}" class="btn btn-danger"><i class="fas fa-window-close"></i>  cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
