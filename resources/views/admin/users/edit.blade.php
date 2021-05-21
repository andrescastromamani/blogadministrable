@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Asignar Roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre: </p>
            <p class="form-control">{{$user->name}}</p>

            <h5 class="">Lista de Roles</h5>
            {!! Form::model($user,['route'=>['admin.users.update',$user],'method'=>'PUT']) !!}
                @foreach($roles as $role)
                <div>
                    <label for="">
                        {!! Form::checkbox('roles[]',$role->id,null,['class'=>'mr-1']) !!}
                        {{$role->name}}
                    </label>
                </div>
                @endforeach
                {!! Form::submit('Guardar',['class'=>'btn btn-primary mt-3']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
