@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14"> <!-- Ajuste de la anchura de la columna -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Generar Ticket') }}</span>
                    <a href="{{ route('loans.create') }}" class="btn btn-primary">Nuevo ticket</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <form action="{{ route('books.search') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="search" placeholder="Buscar prestamos" value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                </div>
                            </form>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Libro</th>
                                    <th>¿Deseado?</th>
                                    <th>Fecha de inicio</th>
                                    <th>Fecha final</th>
                                    <th>Fecha de regreso</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($loans as $loan)
                                    <tr>
                                        <td>{{ $loan->id }}</td>
                                        <td>{{ $loan->client->name }}</td>
                                        <td>{{ $loan->book->title }}</td>
                                        <td>{{ $loan->desired }}</td>
                                        <td>{{ $loan->start_date }}</td>
                                        <td>{{ $loan->end_date }}</td>
                                        <td>{{ $loan->return_date }}</td>
                                        <td>
                                        @if ($loan->payment && $loan->payment->amount)
                                        <a href="#" class="btn btn-primary">Pagado</a>
                                        @else
                                        <a href="{{ route('payments.create', $loan) }}" class="btn btn-success">Pagar</a>

                                        @endif

                                            <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-primary">Modificar</a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No hay prestamos disponibles.</td> <!-- Ajuste del colspan -->
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
