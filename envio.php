<?php

require_once 'mail.php';

if (
    isset($_POST['nome']) && !empty($_POST['nome']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['mensagem']) && !empty($_POST['mensagem'])
) {
    $contato = $_POST['nome']." - ".$_POST['email'];
    $mensagem = $_POST['mensagem'];

    if (send($contato, $mensagem)) {

        echo "E-mail enviado com sucesso!";
        
        $v = phpversion();
        echo "Versão de PHP que está rodando: $v";
        // if(true){
        //     header('Location: /formulario');
        // }

    } else {
        echo "Erro";
    }
} else {
    echo "Preencha todos os campos";
}
