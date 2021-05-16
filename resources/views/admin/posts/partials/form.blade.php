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
    @error('tags')
    <br>
    <span class="text-red">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label class="mr-2" for="">
        {!! Form::radio('status',1,true) !!} Borrador
    </label>
    <label for="">
        {!! Form::radio('status',2) !!} Publicado
    </label>
    @error('status')
    <br>
    <span class="text-red">{{ $message }}</span>
    @enderror
</div>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($post->image)
                <img  id="picture" src="{{Storage::url($post->image->url)}}" alt="image fondo">
            @else
                <img  id="picture" src="{{asset('img/imgdefault.jpg')}}" alt="imagen fondo">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file','imagen del post') !!}
            {!! Form::file('file',['class'=>'form-control-file','accept'=>'image/*']) !!}
        </div>
        @error('file')
        <span class="text-red">{{ $message }}</span>
        @enderror
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel arcu sit amet purus efficitur facilisis. Integer et mauris pulvinar, pretium sem vitae, efficitur erat. In quis quam dui. Aenean ornare hendrerit porta. Phasellus aliquet mauris sit amet nibh ullamcorper rutrum. Donec mattis dictum dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam eget tristique lacus. Vestibulum cursus mi a risus varius, nec tincidunt diam venenatis. Quisque non eros magna.</p>
    </div>
</div>
<div class="form-group">
    {!! Form::label('extract','Extracto:') !!}
    {!! Form::textarea('extract',null,['class'=>'form-control']) !!}
    @error('extract')
    <span class="text-red">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('body','Cuerpo Post:') !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    @error('body')
    <span class="text-red">{{ $message }}</span>
    @enderror
</div>
