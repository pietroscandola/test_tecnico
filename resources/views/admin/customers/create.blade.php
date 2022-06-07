@extends('layouts.app')

@section('content')
   <div class="container py-4">
    <h1 class="mb-3">Nuovo Cliente</h1>      
      @include('admin.customers.includes.form')
   </div>
@endsection