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
            <h1 class="text-center display-3">Agregar Salida de Articulos</h1>
            <form action="{{route('salidas.add')}}" method="post">
                @csrf
                <label for="responsable" >Responsable</label>
                <select name="responsable" id="responsable" class="form-control" required>
                    <option value="">seleccione un responsable</option>
                    @foreach ($responsables as $responsable)
                    <option value="{{$responsable->id}}">{{$responsable->nombre}}</option>
                    @endforeach
                </select>
                <br>
                <label for="articulo_id" >Articulo</label>
                <select name="articulo_id" id="articulo_id" class="form-control" required>
                    <option value="1">seleccione un articulo</option>
                    @foreach ($inventarios as $inventario)
                    <option value="{{$inventario->id}}">{{$inventario->nombre}}</option>
                    @endforeach
                </select>
                <br>
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" name="cantidad"  required/>
                <br>
                <label for="direccion">Direccion del destino:</label>
                <input type="text" class="form-control" name="direccion"  required/>
                <br>
                <button class="btn btn-primary" type="submit"><i class="fas fa-sign-out-alt"></i> Agregar salida</button>
                <a href="{{route('salidas')}}" class="btn btn-danger"><i class="fas fa-window-close"></i>  cancelar</a>

            </form>
        </div>
    </div>
</div>
@endsection
