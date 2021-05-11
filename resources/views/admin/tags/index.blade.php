@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Etiquetas</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @else

    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary float-right" href="{{ route('admin.tags.create') }}">Agregar Etiqueta +</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Color</th>
                    <th colspan="2">Accion</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th scope="row">{{ $tag->id }}</th>
                        <td scope="row">{{ $tag->name }}</td>
                        <td colspan="2">{{ $tag->color }}</td>
                        <td width="10px"><a class="btn btn-primary btn-sm" href="{{ route('admin.tags.edit', $tag) }}">editar</a></td>
                        <td width="10px">
                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
