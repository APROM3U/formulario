<?php

require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';
require_once 'Connection/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//use PHPMailer\PHPMailer\SMTP;

function send($contato, $mensagem){

    try {
        $mail = new PHPMailer(true);

        $mail->setLanguage('br');
        $mail->isSMTP();
        $mail->SMTPAuth = true;                 // Autenticação
        $mail->SMTPDebug = 0;                   // 1 para debug
        $mail->SMTPSecure = CRIPTOGRAFIA;       // Criptografia - SSL/TLS
        $mail->Host = SERVIDOR;                 // Servidor de e-mail SMTP
        $mail->Username = EMAIL_ORIGEM;         // Conta de e-mail - Origem (disparo)
        $mail->Password = SENHA_EMAIL;          // Senha do e-mail - Origem (disparo)
        $mail->Port = PORTA;                    // Porta 465 (SSL)/587(TLS)
        $mail->setFrom(EMAIL_ORIGEM);           
        $mail->addAddress(EMAIL_DESTINO);       // E-mail de destino (recebe)
        $mail->addReplyTo(EMAIL_DESTINO);
        $mail->isHTML(true);    
        $mail->CharSet = 'UTF-8';               // Charset
        $mail->Subject = $contato;
        $mail->Body = $mensagem;
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
         echo "ERRO: {$mail->ErrorInfo}";
    }
}
