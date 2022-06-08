@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-success" href="{{ route('admin.quotations.create') }}">Crea Nuovo Preventivo</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col-2">Descrizione</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($quotations as $quotation)
                    <tr>
                        <th scope="row">{{ $quotation->id }}</th>
                        <td>{{ $quotation->price }} €</td>
                        <td>{{ $quotation->description }}</td>

                        <td class="d-flex align-items-center justify-content-around">
                            <a href="{{ route('admin.quotations.show', $quotation->id) }}">
                                <i class="fa-solid fa-eye mx-1 fa-xl"></i>
                            </a>
                            <a href="{{ route('admin.quotations.edit', $quotation->id) }}">
                                <i class="fa-solid fa-pen mx-1 fa-xl"></i>
                            </a>
                            <button type="submit" class="btn" data-target="#deliteModal{{ $quotation->id }}"
                                data-toggle="modal">
                                <i class="fa-solid fa-trash mx-1 fa-xl"></i>
                            </button>
                            {{-- MODALE ELIMINAZIONE --}}
                            <div class="modal" tabindex="-1" id="deliteModal{{ $quotation->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminazione Preventivo</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Sei sicuro di eliminare il preventivo {{ $quotation->id }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annulla</button>
                                            <form action="{{ route('admin.quotations.destroy', $quotation->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary">
                                                    Conferma
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
            </tbody>
        @empty
            <h1>Non ci sono preventivi da visualizzare</h1>
            @endforelse
        </table>
    </div>
@endsection
