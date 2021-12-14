@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-3 text-center">{{$inventarios->nombre}}</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                @csrf
                <p class="text-center">
                    <img  src="/img/fotos/{{$inventarios->img}}" class="centrado" alt="" height="415px">
                </p>
                <br>
                <label for="nombre_articulo">nombre del articulo:</label>
                <input type="text" class="form-control" name="nombre_articulo" value="{{$inventarios->nombre}}" readonly/>
                <br>
                <label for="fechaAdquisicion">Fecha de adquisicion:</label>
                <input type="date" class="form-control" name="fechaAdquisicion" value="{{$inventarios->fecha_adquisicion}}" readonly/>
                <br>
                <label for="codigo">Codigo:</label>
                <input type="text" class="form-control" name="codigo" value="{{$inventarios->codigo}}" readonly />
                <br>
                <label for="folio">Folio:</label>
                <input type="text" class="form-control" name="folio" value="{{$inventarios->numero_folio_comprobante}}" readonly />
                <br>
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion" value="{{$inventarios->descripcion}}" readonly>
                <br>
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" value="{{$inventarios->marca}}" readonly />
                <br>
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo" value="{{$inventarios->modelo}}" readonly/>
                <br>
                <label for="serie">Serie:</label>
                <input type="text" class="form-control" name="serie" value="{{$inventarios->serie}}" readonly/>
                <br>
                <label for="cantidad">cantidad adquirida:</label>
                <input type="number" class="form-control" name="cantidad" value="{{$inventarios->cantidad}}" readonly />
                <br>
                <br>
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="{{route('inventario.edit',$inventarios->id)}}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a> </th></td>
                                <form action="{{route('inventario.destroy', $inventarios->id)}}" method="POST" class="formulario_eliminar">
                                    @csrf
                                    @method('delete')
                                <td>
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                            </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
            'Eliminado!',
            'Se elimino con exito.',
            'success'
            )
        </script>
    @endif

    <script>
    $('.formulario_eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: 'Estas seguro?',
        text: "se eliminara definitivamente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar!'
        }).then((result) => {
        if (result.isConfirmed) {
            /*
            */
            this.submit();
        }
        })
    });
    </script>

@endsection
