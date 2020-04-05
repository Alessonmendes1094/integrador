@include('layout._includes.topo')

@yield('conteudo')


<div id="blanket"></div>
<div id="aguarde">
    <img src="{{asset('imagens/loading.gif')}}">
</div>

@include('layout._includes.footer')
