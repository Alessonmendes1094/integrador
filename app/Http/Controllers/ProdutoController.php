<?php

namespace App\Http\Controllers;

use App\Produto;
use App\ProdutoWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;

class ProdutoController extends Controller
{
    public function index()
    {
        $cotacoes = DB::connection('mysql')->select("select id , titulo from cotacoes where cotacoes.id not in (
                        SELECT cotacoes.id FROM cotacao.cotacoes
                        inner join  prod_cotacao on prod_cotacao_id = cotacoes.id
                        inner join prod_precos on prodpr_produto_id = prod_cotacao.id
                        where status = 'Aberta' group by cotacoes.id) and status = 'Aberta'");
        $produtos = DB::connection('pgsql')->select('select * from prodcotacao');

        return view('ImportarProdutos.index', compact('produtos', 'cotacoes'));
    }

    public function salvar(Request $req)
    {
        $this->validacao($req);

        $ids = array_keys($req->produtos);
        $produtos = Produto::whereIn('proc_codigo', $ids)->get();
        ProdutoWeb::wherein('prod_codigo', $ids)->where('prod_cotacao_id', '=', $req->cotacao)->delete();

        $qtd = 0;

        foreach ($produtos as $produto) {
            $qtd = $qtd + 1;

            $prodweb = new ProdutoWeb;
            $prodweb->prod_codigo = $produto->proc_codigo;
            $prodweb->prod_descricao = $produto->proc_descricao;
            $prodweb->prod_barras = $produto->proc_codbarras;
            $prodweb->prod_qtde = $produto->proc_qtde;
            $prodweb->prod_complemento = $produto->proc_complemento;
            $prodweb->prod_sequencial = $qtd;
            $prodweb->prod_cotacao_id = $req->cotacao;
            $prodweb->save();
        }
        Session::flash('success', $qtd.' produtos Importados com sucesso');
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
