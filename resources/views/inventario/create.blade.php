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
            <h1 class="text-center display-3">Agregar Articulo</h1>
            <form action="{{route('inventario.add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="responsable" >Responsable</label>
                <select name="responsable" id="responsable" class="form-control" required>
                    <option value="">seleccione una responsable</option>
                    @foreach ($responsables as $responsable)
                    <option value="{{$responsable->id}}">{{$responsable->nombre}}</option>
                    @endforeach
                </select>
                <br>
                <label for="areasId" >Area</label>
                <select name="areasId" id="areasId" class="form-control" required>
                    <option value="">seleccione una area</option>
                    @foreach ($areas as $area)
                    <option value="{{$area->id}}">{{$area->nombre}}</option>
                    @endforeach
                </select>
                <br>
                <label for="nombre_articulo">nombre del articulo:</label>
                <input type="text" class="form-control" name="nombre_articulo"  required/>
                <br>
                <label for="fechaAdquisicion">Fecha de adquisicion:</label>
                <input type="date" class="form-control" name="fechaAdquisicion" required />
                <br>
                <label for="codigo">Codigo:</label>
                <input type="text" class="form-control" name="codigo" required />
                <br>
                <label for="folio">Folio:</label>
                <input type="text" class="form-control" name="folio" required />
                <br>
                <label for="descripcion">Descripcion:</label>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="20" rows="5" required></textarea>
                <br>
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" required />
                <br>
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo"  required/>
                <br>
                <label for="serie">Serie:</label>
                <input type="text" class="form-control" name="serie"  required/>
                <br>
                <label for="cantidad">cantidad adquirida:</label>
                <input type="number" class="form-control" name="cantidad"  required/>
                <br>
                <label for="img">Imagen:</label>
                <input type="file" class="form-control" name="img" required>
                <label for="nombre">Nombre de la imagen:</label>
                <input type="text" class="form-control" name="nombre"  required/>
                <br>
                <button class="btn btn-primary" type="submit"><i class="fas fa-clipboard"></i> Agregar articulo</button>
                <a href="{{route('inventario')}}" class="btn btn-danger"><i class="fas fa-window-close"></i>  cancelar</a>

            </form>
        </div>
    </div>
</div>
@endsection
