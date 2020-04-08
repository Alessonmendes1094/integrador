@extends('layout.site')

@section('conteudo')
    <div class="row">
        <div class="col s12 m6">

            <form action="{{route('precos.salvar')}}" method="POST">
                @csrf
                <div class="card ">
                    <div class="card-content">
                        <span class="card-title">Selecione a Cotação para Exportar os Preços</span>

                        <select name="cotacao" id="cotacao">
                            <option value="" disabled selected>Selecione a Cotação</option>
                            @foreach($cotacoes as $cotacao)
                                <option value="{{$cotacao->id}}">{{$cotacao->titulo}}</option>
                            @endforeach
                        </select>
                        @error('cotacao')
                        <span class="helper-text" style="color:red">{{ $message }}</span>
                        @enderror

                        <input type="date" name="data" id="data">
                        @error('data')
                        <span class="helper-text" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-action">
                        <button class="btn green white-text  aguarde">Exportar</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

@endsection
