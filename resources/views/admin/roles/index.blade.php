@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Roles</h1>
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
            <a class="btn btn-primary float-right" href="{{ route('admin.roles.create') }}">Agregar Rol +</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th colspan="2">Accion</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $rol)
                    <tr>
                        <th scope="row">{{ $rol->id }}</th>
                        <td colspan="2">{{ $rol->name }}</td>
                        <td width="10px">
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.roles.edit', $rol) }}">editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('admin.roles.destroy', $rol) }}" method="post">
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
        <div class="mt-4">
            {{$roles->links()}}
        </div>
    </div>
@stop

