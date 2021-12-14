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
            <h1 class="text-center display-3">Agregar Resposable</h1>
            <form action="{{route('responsables.add')}}" method="post">
                @csrf
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre"  required/>
                <br>
                <label for="apellido">Apellidos:</label>
                <input type="text" class="form-control" name="apellido"  required/>
                <br>
                <label for="direccion">Direccion:</label>
                <input type="text" class="form-control" name="direccion"  required/>
                <br>
                <label for="telefono">Telefono:</label>
                <input type="text" class="form-control" name="telefono"  required/>
                <br>
                <label for="areasId" >Area</label>
                <select name="areasId" id="areasId" class="form-control" required>
                    <option value="">seleccione una area</option>
                    @foreach ($areas as $area)
                    <option value="{{$area->id}}">{{$area->nombre}}</option>
                    @endforeach

                </select>
                <br>
                <button class="btn btn-primary" type="submit"><i class="far fa-list-alt"></i> Agregar area</button>
                <a href="{{route('responsables')}}" class="btn btn-danger"><i class="fas fa-window-close"></i>  cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
