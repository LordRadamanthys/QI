<?php
require('../php/conexao.php');
$con = new Banco();
		date_default_timezone_set('America/Sao_Paulo');
		$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
		$tipo_usuario = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : '';
        $mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';
        $data =date ("d-m-Y");
        $hora = date('H:i:s');
    
		$sql = "INSERT INTO mensagens_sindico_adm (tipo_usuario, id_usuario,mensagem, data, hora) 
                            VALUES('$tipo_usuario','$id_usuario','$mensagem','$data','$hora')";
		

$con->InserirMensagemSindico($sql);

        header("Location: ../perfil_sindico/sindico_mensagem.php");
        
	
