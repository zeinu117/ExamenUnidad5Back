@extends('layouts.home')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="display-1 text-center">Salidas de Articulos</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}

                </div>

            @endif
            <a href="{{route('salidas.create', $salidas)}}" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i> Agregar</a>
            <hr>
            <!--
            <transition name="fade">
                <div v-show="articulos.length <= 0 && !busqueda && !cargando.lista"
                    class="notification is-info has-text-centered">
                    <h3 class="is-size-3">Todavía no hay salidas de articulos</h3>
                    <div>
                        <h1 class="icono-gigante">
                            <i class="fas fa-box-open"></i>
                        </h1>
                    </div>
                    <p class="is-size-5">
                        Parece que no has agregado ningúna salida. Registra uno haciendo click en el botón
                        <strong>Agregar</strong>
                    </p>
                </div>
            </transition>
            -->
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>id</th>
                        <th>Responsable</th>
                        <th>Articulo</th>
                        <th>Cantidad</th>
                        <th>Fecha y hora de salida</th>
                        <th>Direccion</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $salidas as $salida )
                    <tr>
                        <td>{{$salida->id}}</td>
                        <td>{{$salida->responsable_id}}</td>
                        <td>{{$salida->articulo_id}}</td>
                        <td>{{$salida->cantidad_salida}}</td>
                        <td>{{$salida->created_at}}</td>
                        <td>{{$salida->direccion_salida}}</td>
                        <td>
                            <a href="{{route('salidas.edit',$salida->id)}}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a> </th>
                        </td>
                        <form action="{{route('salidas.destroy', $salida)}}" method="POST" class="formulario_eliminar">
                            @csrf
                            @method('delete')
                        <td>
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{$salidas->links()}}
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
