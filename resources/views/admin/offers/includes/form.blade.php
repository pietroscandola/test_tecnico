@if ($offer->exists)
    <form action="{{ route('admin.offers.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('admin.offers.store') }}" method="post" enctype="multipart/form-data">
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
            value="{{ old('name', $offer->name) }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    {{-- PRICE --}}
    <div class="col-12 mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price"
            value="{{ old('price', $offer->price) }}" required>
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    {{-- DESCRIPTION --}}
    <div class="col-12 mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror"
            required>
            {{ old('description', $offer->description) }}            
        </textarea>

        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <hr>
    </div>
    <div class="col-12 d-flex justify-content-end mt-3">
        <input class="btn btn-primary" type="submit" value="Invia">
        <a href="{{ route('admin.offers.index') }}" class="btn btn-secondary ml-1">Indietro</a>
    </div>

</div>

</form>
