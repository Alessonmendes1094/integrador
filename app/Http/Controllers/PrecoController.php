<?php

namespace App\Http\Controllers;

use App\MovCotacao;
use App\Cotacao;
use App\ProdutoWeb;
use App\Prod_Preco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class PrecoController extends Controller
{

    public function index()
    {
        $cotacoes = DB::connection('mysql')->table('cotacoes')
            ->where('exportado','<>','S')->orWhere('exportado', null)
            ->where('status','=','Encerrado')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('prod_cotacao')
                    ->join('prod_precos','prodpr_produto_id','=','prod_cotacao.id')
                    ->whereRaw('prod_cotacao_id = cotacoes.id');
            })
            ->select('titulo','cotacoes.id')
            ->get();

        return view('ExportarPrecos.index', compact('cotacoes'));
    }

    public function salvar(Request $req)
    {
        $this->validacao($req);

        #busca preços da cotação
        $precos = DB::connection('mysql')->table('prod_cotacao')
            ->join('prod_precos','prodpr_produto_id','=','prod_cotacao.id')
            ->join('users','users.id','=','prodpr_user_id')
            ->where('prod_cotacao_id','=',$req->cotacao)
            ->get();

        #delete movCotação da data informada no filtro
        MovCotacao::where('mcot_data','=',$req->data)->delete();

        #Insere os preços da web para o flex
        $qtd=0;
        foreach ($precos as $preco) {
            $qtd= $qtd + 1;
            $precoprod = new MovCotacao();
            $precoprod->mcot_forn_codigo = $preco->codigo;
            $precoprod->mcot_prod_codigo = $preco->prod_codigo;
            $precoprod->mcot_preco = $preco->prodpr_valor;
            $precoprod->mcot_data =  $req->data;
            $precoprod->mcot_unid_codigo = '001';
            $precoprod->mcot_obs = '(WEB) '.$preco->observacao;
            $precoprod->mcot_icms = 0.000;
            $precoprod->mcot_subtrib = 0.000;
            $precoprod->mcot_perc = 0.000;
            $precoprod->mcot_frete = 0.000;
            $precoprod->mcot_fcpst = 0.000;
            $precoprod->save();
        }

        #Altera o status de exportação dos preços na tabela cotacoes
        $cotacao = Cotacao::find($req->cotacao);
        $cotacao->data_exp = Carbon::now()->toDateTimeString();
        $cotacao->exportado = 'S';
        $cotacao->save();

        Session::flash('success', $qtd . ' Preços Importados com sucesso');
        return view('welcome');
    }


    public function validacao(Request $req)
    {
        $dados = $req->all();

        $valid = [
            'cotacao' => 'required',
        ];
        $messages = [
            'required' => 'O campo é de preenchimento obrigatório!',
        ];
        $validacao = Validator($dados, $valid, $messages)->validate();
    }
}
