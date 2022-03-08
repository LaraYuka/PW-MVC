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
            url: '../modelo/retorno.php',
            success: function(dados) {
                $('#retorno').append(`
                <div class="col-12 col-sm-8 col-md-6">

                <div class="alert-primary">
                    <h1 class="text-center text-dark">
                        ${dados.mensagem}
                    </h1>
                </div>
    
                <img src="../../img/${dados.tipo}" class="img-fluid">
    
            </div>
                `)

            }

        })

    })
})