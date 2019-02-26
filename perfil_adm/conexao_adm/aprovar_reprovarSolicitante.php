<?php 
require('conexao_adm.php');
$con = new ConexaoAdm();

		date_default_timezone_set('America/Sao_Paulo');
		$aprovado = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
		//$reprovado = isset($_POST['id_usuarioRE']) ? $_POST['id_usuarioRE'] : '';
    	
    	if($aprovado){
			//$sql = "UPDATE solicitante_cond SET liberado = 'nao' WHERE id= '$aprovado'";
			//$con->AprovarReprovarSolicitante($sql);
			$con->DeletarSolicitante($aprovado);
			header("Location: ../adm_solicitantes.php");
		}else{
			echo "erro";
		}
		

		


        
        
	
