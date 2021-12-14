@extends('layouts.home')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="display-1 text-center">Responsables de Areas</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a href="{{route('responsables.agregar')}}" class="btn btn-primary"><i class="fas fa-users"></i> Agregar</a>
            <hr>
            <!--
            <transition name="fade">
                <div v-show="articulos.length <= 0 && !busqueda && !cargando.lista"
                     class="notification is-info has-text-centered">
                    <h3 class="is-size-3">Todavía no hay Responsables de areas</h3>
                    <div>
                        <h1 class="icono-gigante">
                            <i class="fas fa-users"></i>
                        </h1>
                    </div>
                    <p class="is-size-5">
                        Parece que no has agregado ningún responsable. Registra uno haciendo click en el botón
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
                        <th>Area</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Apellidos</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $responsables as $responsable )
                    <tr>
                        <td>{{$responsable->id}}</td>
                        <td>{{$responsable->nombre}}</td>
                        <td>{{$responsable->areasId}}</td>
                        <td>{{$responsable->direccion}}</td>
                        <td>{{$responsable->telefono}}</td>
                        <td>{{$responsable->Apellidos}}</td>
                        <td>
                            <a href="{{route('responsables.edit',$responsable->id)}}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a> </th>
                        </td>
                            <form action="{{route('responsables.destroy', $responsable)}}" method="POST" class="formulario_eliminar">
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
{{$responsables->links()}}
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
