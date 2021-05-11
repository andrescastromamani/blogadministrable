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
    {!! Form::select('color', $colors,null, ['class' => 'form-control']) !!}
    @error('color')
    <span class="text-red">{{ $message }}</span>
    @enderror
</div>
