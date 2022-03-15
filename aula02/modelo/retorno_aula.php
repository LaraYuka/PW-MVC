<?php

    $NOME = $_REQUEST['NOME'];
    $DATA_NASC = $_REQUEST['DATA_NASC'];
    $BEBIDA = $_REQUEST['BEBIDA'];

    
    // separando yyyy, mm, ddd
    list($dd, $mm, $yyyy) = explode('/', $DATA_NASC);

    // data atual
    $hoje = mktime(0, 0, 0, date('d'), date('m'), date('y'));
    // Descobre a unix timestamp da data de nascimento da pessoa
    $nascimento = mktime( 0, 0, 0, $dd, $mm, $yyyy);

    // cálculo
    //$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365);
    //echo "Idade: $idade Anos";
    

     /* $data = new DateTime($DATA_NASC );
    $idade = $data->diff( new DateTime( date('dd/mm/YYY') ) );
    echo $idade->format( '%Y anos' ); */

    $nome = ucfirst($NOME);
    $bebida = ucfirst($BEBIDA);


    if(empty($NOME)){
        $dados = array(
            "tipo" => 'error',
            "mensagem" => 'Existe(m) campo(s) a ser(em) preenhido(s).'
        );
    }else{

        /*switch($ANIMAL){
            case '1' : $dados = array(
                "tipo" => 'cachorro.png',
                "mensagem" => 'Seja bem vindo, '.$NOME.', sabemos que seu animal de preferencia é o cachorro'
            );
            break;

            case '2' : $dados = array(
                "tipo" => 'gato.png',
                "mensagem" => 'Seja bem vindo, '.$NOME.', sabemos que seu animal de preferencia é o gato'
            );
            break;

            case '3' : $dados = array(
                "tipo" => 'peixe.png',
                "mensagem" => 'Seja bem vindo, '.$NOME.', sabemos que seu animal de preferencia é o peixe'
            );
            break;
        }*/

        switch($DATA_NASC){
            case $idade < 18 : $dados = array(
                "tipo" => 'Você não pode beber',
                "mensagem" => 'Idade: ' . $idade . ' anos',
                "mensagem2" => 'Nome: ' . $nome,
                "mensagem3" => 'Data de nascimento: ' . $DATA_NASC,
                "mensagem4" => 'Bebida: ' . $bebida,
            );
            break;

            case $idade >= 18 : $dados = array(
                "tipo" => 'Você pode beber',
                "mensagem" => 'Idade: '.$idade.' anos',
                "mensagem2" => 'Nome: ' . $NOME,
                "mensagem3" => 'Data de nascimento: ' . $DATA_NASC,
                "mensagem4" => 'Bebida: ' . $BEBIDA,
            );
            break;
        }

        echo json_encode($dados);
    }