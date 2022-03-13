$(document).ready(function() {

    //Monitorar o clique em cima do botão btn-send
    $('.btn-send').click(function(e) {
        e.preventDefault()

        //alert('Você clicou no botão enviar!!!')

        //Coletar o que foi escrito e selecionado em nosso formulário
        let dados = $('#form').serialize()

        $('#retorno').empty()

        //console.log(dados)

        //ajax faz o retorno e tranforma em .php
        //copiar correto se não dá erro
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            assync: true,
            data: dados,
            url: '../modelo/retorno_aula.php',
            success: function(dados) {
                $('#retorno').append(`
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-10 col-sm-8 col-md-6 mt-3">
                            <div class="alert-primary">
                                <h1 class="text-center text-dark">
                                    ${dados.mensagem}
                                    </br>
                                    ${dados.tipo}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                `)

            }

        })

    })
})