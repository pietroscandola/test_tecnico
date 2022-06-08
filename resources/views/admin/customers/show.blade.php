@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title font-weight-bold mb-3">{{ $customer->name }} {{ $customer->surname }}</h1>
                        <p class="card-text mb-1"><strong>Numero di Telefono:</strong> {{ $customer->phone_number }}</p>
                        <p class="card-text mb-1"><strong>Email:</strong> {{ $customer->email }}</p>

                        <div class="card-text mb-1">
                            <strong>Offerte Acquistate:</strong>
                            <ul>
                                @forelse($customer->offers as $offer)
                                    <li>{{ $offer->name }}</li>
                                @empty
                                    <span>Nessuna Offerta</span>
                                @endforelse
                            </ul>
                        </div>

                        <div class="card-text mb-1">
                            <strong>Descrizione Preventivi Inviati:</strong>

                            @if (isset($customer->quotation))
                                <p class="badge badge-pill ">
                                    {{ $customer->quotation->description }}
                                </p>
                            @else
                                -
                            @endif
                        </div>

                        <div class="d-flex justify-content-end">
                            <input type="submit" class="btn btn-danger" data-target="#deliteModal" data-toggle="modal"
                                value="Elimina">
                            <a href="{{ route('admin.customers.edit', $customer->id) }}"
                                class="btn btn-warning ml-1">Modifica</a>
                            <a href="{{ route('admin.customers.index') }}" class="btn btn-primary ml-1">Indietro</a>

                            <div class="modal" tabindex="-1" id="deliteModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminazione Cliente</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Sei sicuro di eliminare il cliente {{ $customer->name }}
                                                {{ $customer->surname }}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annulla</button>
                                            <form action="{{ route('admin.customers.destroy', $customer->id) }}"
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
