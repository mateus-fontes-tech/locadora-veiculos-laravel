@extends('layout')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Clientes</h2>

    <a href="{{ route('clientes.create') }}" class="btn btn-primary">
        Novo Cliente
    </a>

</div>


<table class="table table-bordered">

    <thead class="table-dark">

        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>

    </thead>


    <tbody>

        @foreach($clientes as $cliente)

        <tr>

            <td>{{ $cliente->nome }}</td>

            <td>{{ $cliente->cpf }}</td>

            <td>{{ $cliente->telefone }}</td>

            <td>{{ $cliente->email }}</td>

            <td>

                <a href="{{ route('clientes.edit',$cliente->id) }}"
                   class="btn btn-warning btn-sm">
                    Editar
                </a>


                <form action="{{ route('clientes.destroy',$cliente->id) }}"
                      method="POST"
                      style="display:inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        Excluir
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection