<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del post">
    </div>
    @if($posts->count())
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th colspan="2">Accion</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td scope="row">{{ $post->name }}</td>
                    <td width="10px"><a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit', $post) }}">editar</a></td>
                    <td width="10px">
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
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
    <div class="card-footer">{{$posts->links()}}</div>
    @else
        <div class="card-header">
            <strong>No se encontraron registros...</strong>
        </div>
    @endif
</div>
