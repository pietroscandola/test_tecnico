@if ($customer->exists)
    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('admin.customers.store') }}" method="post" enctype="multipart/form-data">
@endif
@csrf
<div class="row">
    {{-- ERROR --}}
    @if ($errors->any())
        <div class="col-12 alert alert-danger">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- NAME --}}
    <div class="col-12 mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
            value="{{ old('name', $customer->name) }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    {{-- SURNAME --}}
    <div class="col-12 mb-3">
        <label for="surname" class="form-label">Cognome</label>
        <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" id="surname"
            value="{{ old('surname', $customer->surname) }}" required>
        @error('surname')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    {{-- PHONE NUMBER --}}
    <div class="col-12 mb-3">
        <label for="phone_number" class="form-label">Numero di Telefono</label>
        <input type="tell" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
            id="phone_number" value="{{ old('phone_number', $customer->phone_number) }}" required>
        @error('phone_number')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- EMAIL --}}
    <div class="col-12 mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
            value="{{ old('email', $customer->email) }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- OFFER --}}
    <div class="col-12 mb-3">
        <label for="email" class="form-label">Offerte</label>
        <div class=" d-flex flex-wrap @error('offers') is-invalid @enderror">

            @foreach ($offers as $offer)
                <div class="form-check mr-3">
                    <input class="form-check-input" type="checkbox" value="{{ $offer->id }}"
                        id="offer-{{ $offer->id }}" name="offers[]"
                        @if (in_array($offer->id, old('offers', $customer_offers_ids ?? []))) checked @endif>
                    <label class="form-check-label" for="offer-{{ $offer->id }}">{{ $offer->name }}</label>
                </div>
            @endforeach
        </div>
        @error('offers')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="col-12">
        <hr>
    </div>
    <div class="col-12 d-flex justify-content-end mt-3">
        <input class="btn btn-primary" type="submit" value="Invia">
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary ml-1">Indietro</a>
    </div>

</div>

</form>
