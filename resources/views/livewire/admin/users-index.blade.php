<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del Usuario">
    </div>
    @if($users->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th colspan="2">Accion</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td scope="row">{{ $user->name }}</td>
                        <td scope="row">{{ $user->email }}</td>
                        <td width="10px">
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.users.edit', $user) }}">editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">{{$users->links()}}</div>
    @else
        <div class="card-header">
            <strong>No se encontraron registros...</strong>
        </div>
    @endif
</div>
