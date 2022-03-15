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
                        <div class="col-10 col-sm-8 col-md-6 mt-5">
                            <div>
                                <h2 class="teste">
                                    ${dados.mensagem2}
                                    </br>
                                    ${dados.mensagem3}
                                    </br>
                                    ${dados.mensagem4}
                                </h1>
                                <img src="../../img/${dados.img}" class="img-fluid rounded">
                            </div>
                            <div class="mt-3 alert-danger">
                                <h1 class="text-center text-dark alerta">
                                    ${dados.mensagem}
                                    </br>
                                    ${dados.tipo}
                                </h1>
                            </div>
                            </br>
                            </br>
                            </br>
                        </div>
                    </div>
                </div>
                `)

            }

        })

    })
})