@extends('layout.site')

@section('conteudo')
    <div class="row">
        @if(Session::has('success'))
            <div class="card-panel green lighten-2">
                {{session::get('success')}}
            </div>
        @endif
        <div class="col s6 m6">
            <div class="card ">
                <div class="card-content black-text">
                    <span class="card-title">Importar Produtos</span>
                    <hr>
                    <p>Importar produtos da tabela ProdCotacao do ERP. (ERP -> Cotação)</p>
                    <p>Produtos Visiveis no caminho "Modulos->Cotacao->Produtos Cotação"</p>
                    <br>
                    <p>Somente poderão ser importados caso a cotação ainda esteja aberta e sem nenhum lançamento
                        de
                        preços para a mesma.</p>
                </div>
                <div class="card-action center-align">
                    <a class="btn" href="{{route('produtos.index')}}">Clique aqui para importar</a>
                </div>

            </div>
        </div>
        <div class="col s6 m6">
            <div class="card">
                    <div class="card-content black-text">
                        <span class="card-title">Exportar Preços Lançados</span>
                        <hr>
                        <p>Exporta os preços informados pelos fornecedores para a tabela MovCotacao do ERP. (Cotação
                            ->
                            ERP)</p>
                        <br>
                        <p>Somente poderá ser exportado os preços caso a cotação esteja Encerrada.</p>
                        <p>Obs.: Após importação, nao poderá mais ser informado nenhum preço na Cotação</p>
                    </div>
                    <div class="card-action center-align">
                        <a class="btn" href="{{route('precos.index')}}">Clique aqui para importar</a>
                    </div>
            </div>
        </div>
    </div>
@endsection
