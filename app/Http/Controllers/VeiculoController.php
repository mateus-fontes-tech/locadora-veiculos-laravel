<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::all();

        return view('veiculos.index', compact('veiculos'));
    }


    public function create()
    {
        return view('veiculos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required',
            'placa' => 'required|unique:veiculos',
            'valor_diaria' => 'required'
        ]);


        Veiculo::create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'ano' => $request->ano,
            'placa' => $request->placa,
            'valor_diaria' => $request->valor_diaria,
            'status' => 'Disponivel'
        ]);


        return redirect()
            ->route('veiculos.index')
            ->with('success', 'Veículo cadastrado!');
    }


    public function show(Veiculo $veiculo)
    {
        return view('veiculos.show', compact('veiculo'));
    }


    public function edit(Veiculo $veiculo)
    {
        return view('veiculos.edit', compact('veiculo'));
    }


    public function update(Request $request, Veiculo $veiculo)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required',
            'placa' => 'required',
            'valor_diaria' => 'required'
        ]);


        $veiculo->update($request->all());


        return redirect()
            ->route('veiculos.index')
            ->with('success', 'Veículo atualizado!');
    }


    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();


        return redirect()
            ->route('veiculos.index')
            ->with('success', 'Veículo excluído!');
    }
}