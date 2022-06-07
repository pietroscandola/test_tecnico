@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex justify-content-end mb-4">
    <a class="btn btn-success" href="{{ route('admin.customers.create') }}">Crea Nuovo Cliente</a>
  </div>
  
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">FirstName</th>
        <th scope="col">LastName</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Email</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @forelse($customers as $customer)
      <tr>
        <th scope="row">{{ $customer->id }}</th>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->surname }}</td>
        <td>{{ $customer->phone_number }}</td>
        <td>{{ $customer->email }}</td>
        <td class="d-flex align-items-center justify-content-around">
          <a href="{{ route('admin.customers.show',$customer->id) }}"><i class="fa-solid fa-eye mx-1 fa-xl"></i></a>
          <a href="{{ route('admin.customers.edit',$customer->id) }}"><i class="fa-solid fa-pen mx-1 fa-xl"></i></a>
          <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST"
            class='delete_form'>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn"><a href="#"><i class="fa-solid fa-trash mx-1 fa-xl"></i></a></button>
         </form>         
        </td>
      </tr>    
    </tbody>
      @empty
        <h1>Non ci sono clienti da visualizzare</h1>
      @endforelse
  </table>
</div>

@endsection

