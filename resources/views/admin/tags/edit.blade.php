@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Etiquetas</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @else

    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'PUT']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre']) !!}
                @error('name')
                <span class="text-red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Slug', 'readonly']) !!}
                @error('slug')
                <span class="text-red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('color', 'Color') !!}
                {!! Form::text('color', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Color']) !!}
                @error('color')
                <span class="text-red">{{ $message }}</span>
                @enderror
            </div>
            {!! Form::submit('Actualizar Etiqueta', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('vendor/jQuery-stringToSlug/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

    </script>
@endsection
