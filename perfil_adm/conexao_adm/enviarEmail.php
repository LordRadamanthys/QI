<?php 
require('conexao_adm.php');
$con = new ConexaoAdm();
	
	$mensagem = isset($_POST["mensagem"]) ? $_POST["mensagem"] :"";
	$nome = isset($_POST["nome_emaila"]) ? $_POST["nome_emaila"] :"";
	$email_para = isset($_POST["email_enviara"]) ? $_POST["email_enviara"] :"";

	$con->emailEnviar($nome,$email_para,$mensagem);