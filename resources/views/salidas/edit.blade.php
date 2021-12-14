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
            <form action="{{route('salidas.update', $salidas)}}" method="post">
                @csrf
                @method('put')
                <label for="responsable" >Responsable: {{$salidas->responsable_id}}</label>
                <select name="responsable" id="responsable" class="form-control" required>
                    @foreach ($responsables as $responsable)
                    <option value="{{$responsable->id}}">{{$responsable->nombre}}</option>
                    @endforeach
                </select>
                <br>
                <label for="articulo_id" >Articulo: </label>
                <select name="articulo_id" id="articulo_id" class="form-control" required>
                    <option value="1">seleccione un articulo</option>

                </select>
                <br>
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" name="cantidad" value="{{$salidas->cantidad_salida}}" required />
                <br>
                <label for="direccion">Direccion del destino:</label>
                <input type="text" class="form-control" name="direccion"value="{{$salidas->direccion_salida}}" required />
                <br>
                <label for="fecha">Fecha y Hora:</label>
                <input type="text" class="form-control" name="fecha"value="{{$salidas->created_at}}"  required/>
                <br>
                <button class="btn btn-primary" type="submit"><i class="fas fa-sign-out-alt"></i> Agregar salida</button>
                <a href="{{route('salidas')}}" class="btn btn-danger"><i class="fas fa-window-close"></i>  cancelar</a>

            </form>
        </div>
    </div>
</div>
@endsection
