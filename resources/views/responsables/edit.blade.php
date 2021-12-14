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
            <form action="{{route('responsables.update', $responsables)}}" method="post">
                @csrf
                @method('put')
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="{{$responsables->nombre}}"  required/>
                <br>
                <label for="apellido">Apellidos:</label>
                <input type="text" class="form-control" name="apellido" value="{{$responsables->Apellidos}}" required/>
                <br>
                <label for="direccion">Direccion:</label>
                <input type="text" class="form-control" name="direccion" value="{{$responsables->direccion}}" required/>
                <br>
                <label for="telefono">Telefono:</label>
                <input type="text" class="form-control" name="telefono" value="{{$responsables->telefono}}" required/>
                <br>
                <label for="areasId" >Area</label>
                <select name="areasId" id="areasId" class="form-control" required>
                    @foreach ($areas as $area)
                    <option value="{{$area->id}}">{{$area->nombre}}</option>
                    @endforeach

                </select>
                <br>
                <button class="btn btn-success" type="submit">Actualizar formulario</button>
                <a href="{{route('responsables')}}" class="btn btn-danger"><i class="fas fa-window-close"></i>  cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
