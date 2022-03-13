<?php

    $NOME = $_REQUEST['NOME'];
    $DATA_NASC = $_REQUEST['DATA_NASC'];
    $BEBIDA = $_REQUEST['BEBIDA'];

    // separando yyyy, mm, ddd
    list($dd, $mm, $yyyy) = explode('/', $DATA_NASC);

    // data atual
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento da pessoa
    $nascimento = mktime( 0, 0, 0, $dd, $mm, $yyyy);

    // cálculo
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
    //echo "Idade: $idade Anos";

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
                "mensagem" => 'Idade: '.$idade.' anos'
            );
            break;

            case $idade >= 18 : $dados = array(
                "tipo" => 'Você pode beber',
                "mensagem" => 'Idade: '.$idade.' anos'
            );
            break;
        }

        echo json_encode($dados);
    }