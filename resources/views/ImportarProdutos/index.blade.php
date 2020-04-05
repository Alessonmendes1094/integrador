@extends('layout.site')

@section('conteudo')
    <form action="{{route('produtos.salvar')}}" method="POST">
        @csrf
        <div class="card">
            <div class="card-content">
                <div class="input-field col s12">
                    <span class="card-title">Selecione a Cotação para importar os produtos</span>
                    <select name="cotacao" id="cotacao">
                        <option value="" disabled selected>Selecione a Cotação</option>
                        @foreach($cotacoes as $cotacao)
                            <option value="{{$cotacao->id}}">{{$cotacao->titulo}}</option>
                        @endforeach
                    </select>
                    @error('cotacao')
                    <span class="helper-text" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <span class="card-title">Selecione os produtos para Importar</span>

                <div class="col s12 right btnacoes">
                    <button class="btn green white-text right aguarde"><i
                            class=" material-icons right ">add</i>Importar
                    </button>
                </div>
                <div class="col s12 ">
                    <label>
                        <input type="checkbox" id="ckAll_produtos"/>
                        <span>Selecionar Todos os Produtos</span>
                    </label>
                    <hr>
                    <table>
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descrição</th>
                            <th>Complemento</th>
                            <th>Marca</th>
                            <th>Barras</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <td>
                                    <label>
                                        <input class="ckAll_produtos" name="produtos[{{$produto->proc_codigo}}]" type="checkbox"/>
                                        <span>{{$produto->proc_codigo}}</span>
                                    </label>
                                </td>
                                <td>{{isset($produto->proc_descricao) ? $produto->proc_descricao : '' }}</td>
                                <td>{{isset($produto->proc_complemento) ? $produto->proc_complemento : '' }}</td>
                                <td>{{isset($produto->proc_marca) ? $produto->proc_marca : '' }}</td>
                                <td>{{isset($produto->proc_codbarras) ? $produto->proc_codbarras : '' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {

            $("#ckAll_produtos").click(function () {  // minha chk que marcará as outras
                if ($("#ckAll_produtos").prop("checked"))   // se ela estiver marcada...
                    $(".ckAll_produtos").prop("checked", true);  // as que estiverem nessa classe ".chk" tambem serão marcadas
                else $(".ckAll_produtos").prop("checked", false);   // se não, elas tambem serão desmarcadas
            });

        });
    </script>
@endsection
