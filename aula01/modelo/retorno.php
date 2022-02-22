<?php

    $NOME = $_REQUEST['NOME'];
    $ANIMAL = $_REQUEST['ANIMAL'];

    if(empty($NOME)){
        $dados = array(
            "tipo" => 'error',
            "mensagem" => 'Existe(m) campo(s) a ser(em) preenhido(s).'
        );
    }else{

        switch($ANIMAL){
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
        }

        echo json_encode($dados);
    }