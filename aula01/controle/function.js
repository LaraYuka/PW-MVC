$(document).ready(function() {

    //Monitorar o clique em cima do botão btn-send
    $('.btn-send').click(function(e) {
        e.preventDefault()

        //alert('Você clicou no botão enviar!!!')

        //Coletar o que foi escrito e selecionado em nosso formulário
        let dados = $('#form').serialize()

        console.log(dados)
    })

})