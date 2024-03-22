@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                <span>{{ __('Categorias') }}</span>
                <a href="{{ route('editorials.create') }}" class="btn btn-primary">Nueva Editorial</a>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <form action="{{ route('books.search') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="search" placeholder="Buscar libros" value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                </div>
                            </form>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($editorials as $editorial)
                                    <tr>
                                        <td>{{ $editorial->id }}</td>
                                        <td>{{ $editorial->name }}</td>
                                        <td>
                                            <a href="{{ route('editorials.edit', $editorial->id) }}" class="btn btn-primary">Modificar</a>
                                            <form action="{{ route('editorials.destroy', $editorial->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta editorial?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">No hay editoriales disponibles.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
