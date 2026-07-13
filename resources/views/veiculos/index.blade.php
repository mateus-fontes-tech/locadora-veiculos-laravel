@extends('layout')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Veículos</h2>

    <a href="{{ route('veiculos.create') }}" class="btn btn-primary">
        Novo Veículo
    </a>

</div>


<table class="table table-bordered">

<thead class="table-dark">

<tr>
    <th>Marca</th>
    <th>Modelo</th>
    <th>Ano</th>
    <th>Placa</th>
    <th>Valor diária</th>
    <th>Status</th>
    <th>Ações</th>
</tr>

</thead>


<tbody>

@foreach($veiculos as $veiculo)

<tr>

<td>{{ $veiculo->marca }}</td>

<td>{{ $veiculo->modelo }}</td>

<td>{{ $veiculo->ano }}</td>

<td>{{ $veiculo->placa }}</td>

<td>
R$ {{ number_format($veiculo->valor_diaria,2,',','.') }}
</td>

<td>
{{ $veiculo->status }}
</td>


<td>

<a href="{{ route('veiculos.edit',$veiculo->id) }}"
class="btn btn-warning btn-sm">
Editar
</a>


<form action="{{ route('veiculos.destroy',$veiculo->id) }}"
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