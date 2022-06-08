@if ($quotation->exists)
    <form action="{{ route('admin.quotations.update', $quotation->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('admin.quotations.store') }}" method="post" enctype="multipart/form-data">
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
    <div class="col-12 mb-3">
        <h1>NUMERO PREVENTIV0: {{ $quotation->id }}</h1>
    </div>

    {{-- PRICE --}}
    <div class="col-12 mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price"
            value="{{ old('price', $quotation->price) }}" required>
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    {{-- DESCRIPTION --}}
    <div class="col-12 mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea name="description" id="description" cols="30" rows="5"
            class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $quotation->description) }}            
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
        <a href="{{ route('admin.quotations.index') }}" class="btn btn-secondary ml-1">Indietro</a>
    </div>

</div>

</form>
