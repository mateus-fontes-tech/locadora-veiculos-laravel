@extends('layout')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Locações</h2>

    <a href="{{ route('locacoes.create') }}" class="btn btn-primary">
        Nova Locação
    </a>

</div>


<table class="table table-bordered">

<thead class="table-dark">

<tr>
    <th>Cliente</th>
    <th>Veículo</th>
    <th>Retirada</th>
    <th>Devolução</th>
    <th>Dias</th>
    <th>Total</th>
    <th>Status</th>
    <th>Ação</th>
</tr>

</thead>


<tbody>

@foreach($locacoes as $locacao)

<tr>

<td>
{{ $locacao->cliente->nome }}
</td>


<td>
{{ $locacao->veiculo->marca }}
{{ $locacao->veiculo->modelo }}
</td>


<td>
{{ date('d/m/Y', strtotime($locacao->data_retirada)) }}
</td>


<td>
{{ date('d/m/Y', strtotime($locacao->data_devolucao)) }}
</td>


<td>
{{ $locacao->dias }}
</td>


<td>
R$ {{ number_format($locacao->valor_total,2,',','.') }}
</td>


<td>
{{ $locacao->status }}
</td>


<td>

@if($locacao->status == 'Ativa')

<form action="{{ route('locacoes.finalizar',$locacao->id) }}"
method="POST">

@csrf
@method('PUT')


<button class="btn btn-success btn-sm">
Devolver
</button>


</form>

@endif


</td>


</tr>

@endforeach


</tbody>

</table>


@endsection