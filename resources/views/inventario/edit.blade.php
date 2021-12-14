@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-3 text-center">Editar Articulo</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{route('inventario.update', $inventarios)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <label for="img">Imagen:</label>
                <input type="file" class="form-control"  name="img" value="{{$inventarios->img}}">
                <br>
                <label for="nombre_articulo">nombre del articulo:</label>
                <input type="text" class="form-control" name="nombre_articulo" value="{{$inventarios->nombre}}"  required/>
                <br>
                <label for="fechaAdquisicion">Fecha de adquisicion:</label>
                <input type="date" class="form-control" name="fechaAdquisicion" value="{{$inventarios->fecha_adquisicion}}"  required/>
                <br>
                <label for="codigo">Codigo:</label>
                <input type="text" class="form-control" name="codigo" value="{{$inventarios->codigo}}"  required />
                <br>
                <label for="folio">Folio:</label>
                <input type="text" class="form-control" name="folio" value="{{$inventarios->numero_folio_comprobante}}"  required />
                <br>
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion" value="{{$inventarios->descripcion}}"  required>
                <br>
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" value="{{$inventarios->marca}}"  required />
                <br>
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo" value="{{$inventarios->modelo}}" required />
                <br>
                <label for="serie">Serie:</label>
                <input type="text" class="form-control" name="serie" value="{{$inventarios->serie}}" required />
                <br>
                <label for="cantidad">cantidad adquirida:</label>
                <input type="number" class="form-control" name="cantidad" value="{{$inventarios->cantidad}}"  required />
                <br>
                <label for="responsable" >Responsable</label>
                <select name="responsable" id="responsable" class="form-control" required>
                    <option value="{{$inventarios->responsables_id}}">{{$inventarios->responsables_id}}</option>
                    @foreach ($responsables as $responsable)
                    <option value="{{$responsable->id}}">{{$responsable->nombre}}</option>
                    @endforeach
                </select>
                <br>
                <label for="areasId" >Area</label>
                <select name="areasId" id="areasId" class="form-control">
                    <option value="{{$inventarios->area_id}}">{{$inventarios->area_id}}</option>
                    @foreach ($areas as $area)
                    <option value="{{$area->id}}">{{$area->nombre}}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i>  Actualizar formulario</button>
                <a href="{{route('inventario')}}" class="btn btn-danger"><i class="fas fa-window-close"></i>  cancelar</a>

                <br>
            </form>
        </div>
    </div>
</div>
@endsection
