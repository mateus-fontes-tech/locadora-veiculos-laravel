<?php

namespace App\Http\Controllers;

use App\Models\Locacao;
use App\Models\Cliente;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LocacaoController extends Controller
{

    public function index()
    {
        $locacoes = Locacao::with([
            'cliente',
            'veiculo'
        ])->get();


        return view('locacoes.index', compact('locacoes'));
    }


    public function create()
    {
        $clientes = Cliente::all();

        $veiculos = Veiculo::where(
            'status',
            'Disponivel'
        )->get();


        return view('locacoes.create', compact(
            'clientes',
            'veiculos'
        ));
    }


    public function store(Request $request)
    {

        $request->validate([
            'cliente_id' => 'required',
            'veiculo_id' => 'required',
            'data_retirada' => 'required',
            'data_devolucao' => 'required'
        ]);


        $veiculo = Veiculo::find(
            $request->veiculo_id
        );


        $dias = Carbon::parse(
            $request->data_retirada
        )->diffInDays(
            Carbon::parse($request->data_devolucao)
        );


        if($dias == 0){
            $dias = 1;
        }


        $valor = $dias * $veiculo->valor_diaria;


        Locacao::create([

            'cliente_id'=>$request->cliente_id,

            'veiculo_id'=>$request->veiculo_id,

            'data_retirada'=>$request->data_retirada,

            'data_devolucao'=>$request->data_devolucao,

            'dias'=>$dias,

            'valor_total'=>$valor,

            'status'=>'Ativa'
        ]);


        $veiculo->update([
            'status'=>'Alugado'
        ]);


        return redirect()
            ->route('locacoes.index')
            ->with('success','Locação criada!');
    }



    public function finalizar(Locacao $locacao)
    {

        $locacao->update([
            'status'=>'Finalizada'
        ]);


        $locacao->veiculo->update([
            'status'=>'Disponivel'
        ]);


        return redirect()
            ->route('locacoes.index')
            ->with('success','Veículo devolvido!');
    }



    public function destroy(Locacao $locacao)
    {
        $locacao->delete();


        return redirect()
            ->route('locacoes.index');
    }
}