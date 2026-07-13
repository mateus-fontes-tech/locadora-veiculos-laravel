@extends('layout')

@section('content')


<h2>Nova Locação</h2>


<form action="{{ route('locacoes.store') }}" method="POST">

@csrf


<div class="mb-3">

<label>Cliente</label>

<select name="cliente_id" class="form-control">

<option value="">
Selecione
</option>


@foreach($clientes as $cliente)

<option value="{{ $cliente->id }}">

{{ $cliente->nome }}

</option>

@endforeach


</select>

</div>




<div class="mb-3">

<label>Veículo</label>


<select name="veiculo_id" class="form-control">


<option value="">
Selecione
</option>


@foreach($veiculos as $veiculo)


<option value="{{ $veiculo->id }}">

{{ $veiculo->marca }}
{{ $veiculo->modelo }}
-
{{ $veiculo->placa }}

</option>


@endforeach


</select>


</div>




<div class="mb-3">

<label>Data retirada</label>

<input type="date"
name="data_retirada"
class="form-control">


</div>



<div class="mb-3">

<label>Data devolução</label>

<input type="date"
name="data_devolucao"
class="form-control">


</div>




<button class="btn btn-success">

Salvar Locação

</button>



</form>


@endsection