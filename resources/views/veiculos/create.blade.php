@extends('layout')

@section('content')

<h2>Novo Veículo</h2>


<form action="{{ route('veiculos.store') }}" method="POST">

@csrf


<div class="mb-3">

<label>Marca</label>

<input type="text"
name="marca"
class="form-control">

</div>


<div class="mb-3">

<label>Modelo</label>

<input type="text"
name="modelo"
class="form-control">

</div>


<div class="mb-3">

<label>Ano</label>

<input type="number"
name="ano"
class="form-control">

</div>


<div class="mb-3">

<label>Placa</label>

<input type="text"
name="placa"
class="form-control">

</div>


<div class="mb-3">

<label>Valor diária</label>

<input type="number"
step="0.01"
name="valor_diaria"
class="form-control">

</div>



<button class="btn btn-success">
Salvar
</button>


</form>


@endsection