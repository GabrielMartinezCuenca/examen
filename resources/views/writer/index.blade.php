@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Escritorios') }}</span>
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
                                    <th>Libros</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($writers as $writer)
                                    <tr>
                                        <td>{{ $writer->id }}</td>
                                        <td>{{ $writer->name }}</td>
                                        <td>
                                            @forelse ($writer->book_writer as $book_w)
                                                <li>{{ $book_w->book->title }}</li>
                                            @empty
                                                <li>Sin libros</li>
                                            @endforelse
                                        </td>
                                        <td>
                                            <a href="{{ route('writers.edit', $writer->id) }}" class="btn btn-primary">Modificar</a>
                                            <form action="{{ route('writers.destroy', $writer->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este escritor?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">No hay escritores disponibles.</td>
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
