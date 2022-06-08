@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title font-weight-bold mb-3">
                            <strong>Numero Preventivo:</strong>{{ $quotation->id }}
                        </h1>
                        <p class="card-text mb-1"><strong>Prezzo:</strong> {{ $quotation->price }}€</p>
                        <p class="card-text mb-1"><strong>Descrizione Preventivo:</strong> {{ $quotation->description }}
                        </p>
                        <div class="d-flex justify-content-end">
                            <input type="submit" class="btn btn-danger" data-target="#deliteModal" data-toggle="modal"
                                value="Elimina">
                            <a href="{{ route('admin.quotations.edit', $quotation->id) }}"
                                class="btn btn-warning ml-1">Modifica</a>
                            <a href="{{ route('admin.quotations.index') }}" class="btn btn-primary ml-1">Indietro</a>

                            <div class="modal" tabindex="-1" id="deliteModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Elimina Preventivo</h5>
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
                                            <form action="{{ route('admin.customers.destroy', $quotation->id) }}"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
