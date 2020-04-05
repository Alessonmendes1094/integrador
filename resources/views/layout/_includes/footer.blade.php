<!--JavaScript at end of body for optimized loading-->
<!-- Compiled and minified JavaScript -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script
    src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script> <!--Scrips MArcaras https://igorescobar.github.io/jQuery-Mask-Plugin/docs.html-->

<script type="text/javascript">
    $(document).ready(function () {

        $('.sidenav').sidenav();
        $('select').formSelect();
        $('.dropdown-trigger').dropdown();
        $('.modal').modal();
        $('.button-collapse').sidenav();
        $('.money2').mask("0000.000", {reverse: true});

        $('.collapsible').collapsible();

        $('.cpf').mask('000-000.000-00');
        $('.cnpj').mask('00.000.000/0000-00');

        setTimeout(function () {
            $('.card-panel').fadeOut();
        }, 5000);

        $("input, select", "form , table , .timepicker").keypress(function (e) {// busca input e select no form ou table // evento ao presionar uma tecla válida keypress
            var k = e.which || e.keyCode; // pega o código do evento
            var caixasInput = $("input , select , button");
            if (k == 13) { // se for ENTER
                e.preventDefault(); // cancela o submit
                var caixaAtual = caixasInput.index(this);
                if (caixasInput[caixaAtual + 1] != null)
                    caixasInput[caixaAtual + 1].focus();
                e.preventDefault();
                return false;
            }
        });

        $('.aguarde').click(function () {
            $('#aguarde, #blanket').css('display', 'block');
        });
    });

    function valor(i) {
        var v = i.value;
        var inteiro = /^[0-9]+$/;
        if (v.match(inteiro)) {
            v = v + '.000';
            i.value = v;
        }
        ;

    }
</script>
@yield('script')
</body>
</html>
