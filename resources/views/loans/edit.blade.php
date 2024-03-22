@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Ticket de Préstamo') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('loans.update', $loan) }}">
                        @method('PUT')
                        @csrf

                        <div class="row mb-3">
                            <label for="client_id" class="col-md-4 col-form-label text-md-end">{{ __('Cliente') }}</label>
                            <div class="col-md-6">
                                <select id="client_id" class="form-control @error('client_id') is-invalid @enderror" name="client_id" required>
                                    @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ $client->id == $loan->client_id ? 'selected' : '' }}>{{ $client->name }}</option>
                                    @endforeach
                                </select>

                                @error('client_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="book_id" class="col-md-4 col-form-label text-md-end">{{ __('Libro') }}</label>
                            <div class="col-md-6">
                                <select id="book_id" class="form-control @error('book_id') is-invalid @enderror" name="book_id" required>
                                    @foreach ($books as $book)
                                    <option value="{{ $book->id }}" {{ $book->id == $loan->book_id ? 'selected' : '' }}>{{ $book->title }}</option>
                                    @endforeach
                                </select>

                                @error('book_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="start_date" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Inicio') }}</label>
                            <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $loan->start_date }}" required autofocus>

                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="end_date" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Fin') }}</label>
                            <div class="col-md-6">
                                <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ $loan->end_date }}" required>

                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="desired" class="col-md-4 col-form-label text-md-end">{{ __('¿Deseado?') }}</label>
                            <div class="col-md-6">
                                <select id="desired" class="form-control @error('desired') is-invalid @enderror" name="desired" required>
                                    <option value="1" {{ $loan->desired == 1 ? 'selected' : '' }}>Sí</option>
                                    <option value="0" {{ $loan->desired == 0 ? 'selected' : '' }}>No</option>
                                </select>

                                @error('desired')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="return_date" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Devolución') }}</label>
                            <div class="col-md-6">
                                <input id="return_date" type="date" class="form-control @error('return_date') is-invalid @enderror" name="return_date" value="{{ $loan->return_date }}">

                                @error('return_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crear Ticket') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
