<?php 

require('conexao_adm.php');
$con = new ConexaoAdm();
		date_default_timezone_set('America/Sao_Paulo');
		$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
		$id_mensagem = isset($_POST['id_mensagem']) ? $_POST['id_mensagem'] : '';
		$tipo_usuario = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : '';
		$t = isset($_POST['t']) ? $_POST['t'] : '';
        $mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';
        $data =date ("d-m-Y");
        $hora = date('H:i:s');
    	
    	if($t == "sol"){
		$sql = "INSERT INTO mensagens_solicitante_adm (tipo_usuario, id_usuario,mensagem, data, hora) 
                            VALUES('$tipo_usuario','$id_usuario','$mensagem','$data','$hora')";

		$con->InserirMensagemSolicitanteAdm($sql);
		header("Location: ../adm_caixa_mensagens.php?h=$id_mensagem&idh=$id_usuario&t=sol");
		}else if($t == "sin"){
			$sql = "INSERT INTO mensagens_sindico_adm (tipo_usuario, id_usuario,mensagem, data, hora) 
                            VALUES('$tipo_usuario','$id_usuario','$mensagem','$data','$hora')";
        $con->InserirMensagemSolicitanteAdm($sql);
		header("Location: ../adm_caixa_mensagens.php?h=$id_mensagem&idh=$id_usuario&t=sin");
		}else {
			echo "erro";
		}


		


        
        
	
