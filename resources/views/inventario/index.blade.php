@extends('layouts.home')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col">
            <h1 class="display-1 text-center">Articulos</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a href="{{route('inventario.create', $inventarios)}}" class="btn btn-primary"><i class="fas fa-clipboard"></i> Agregar</a>
            <hr>
            <!--
            <transition name="fade">
                <div v-show="articulos.length <= 0 && !busqueda && !cargando.lista"
                     class="notification is-info has-text-centered">
                    <h3 class="is-size-3">Todavía no hay artículos</h3>
                    <div>
                        <h1 class="icono-gigante">
                            <i class="fas fa-box-open"></i>
                        </h1>
                    </div>
                    <p class="is-size-5">
                        Parece que no has agregado ningún artículo. Registra uno haciendo click en el botón
                        <strong>Agregar</strong>
                    </p>
                </div>
            </transition>-->

            <div class="container">
                <div class="row">
                    @foreach ($inventarios as $inventario)
                    <div class="col-md-4">
                        <div class="card">
                        <a href="{{route('inventario.show', $inventario->id)}}">
                        <img class="card-img-top" src="/img/fotos/{{$inventario->img}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$inventario->nombre}}</h5>
                            <p class="card-text">
                            {{$inventario->descripcion}}
                            </p>
                            <p class="card-text"><small class="text-muted"><i class="fas fa-cubes"></i>{{$inventario->cantidad}}<i class="far fa-user"></i>{{$inventario->responsables_id}}<i class="fas fa-calendar-alt"></i>{{$inventario->fecha_adquisicion}}</small></p>
                        </div>
                        </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

