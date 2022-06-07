@extends('layouts.app')

@section('content')
   <div class="container py-4">
      <div class="row">
         <div class="col-12">
            <div class="card">               
               <div class="card-body">
                  <h1 class="card-title font-weight-bold mb-3">{{ $customer->name }} {{ $customer->surname }}</h1>
                  <p class="card-text mb-1"><strong>Numero di Telefono:</strong> {{ $customer->phone_number }}</p>
                  <p class="card-text mb-1"><strong>Email:</strong> {{ $customer->email}}</p>                  
                  <div class="d-flex justify-content-end">
                     @if (!$customer->deleted_at)
                        <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST"
                           class='delete_form'>
                           @csrf
                           @method('DELETE')
                           <input type="submit" class="btn btn-danger" value="Elimina">
                        </form>
                     @endif
                     <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-warning ml-1">Modifica</a>
                     <a href="{{ route('admin.customers.index') }}" class="btn btn-primary ml-1">Indietro</a>                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
