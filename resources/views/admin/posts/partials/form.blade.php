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
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories ,null, ['class' => 'form-control']) !!}
    @error('category_id')
    <span class="text-red">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach($tags as $tag)
        <label class="mr-2" for="">
            {!! Form::checkbox('tags[]',$tag->id,null) !!}
            {{$tag->name}}
        </label>
    @endforeach
</div>
<div class="form-group">
    {!! Form::label('extract','Extracto:') !!}
    {!! Form::textarea('extract',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body','Cuerpo Post:') !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
</div>