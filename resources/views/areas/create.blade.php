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
            <h1 class="text-center display-3">Agregar Arear</h1>
            <form action="{{route('areas.add')}}" method="post">
                @csrf
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required />
                <br>
                <button class="btn btn-primary" type="submit"><i class="far fa-list-alt"></i> Agregar area</button>
                <a href="{{route('areas')}}" class="btn btn-danger"><i class="fas fa-window-close"></i>  cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
