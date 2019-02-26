<?php 
require('conexao_adm.php');
$con = new ConexaoAdm();

		date_default_timezone_set('America/Sao_Paulo');
		$aprovado = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
		$reprovado = isset($_POST['id_usuarioRE']) ? $_POST['id_usuarioRE'] : '';
		
    	if(!$_POST['excluir']=="excluir"){
	    	if($aprovado){
				$sql = "UPDATE usuarios SET liberado = 'sim' WHERE id= '$aprovado'";
				$con->AprovarReprovarSindico($sql);
				header("Location: ../adm_sindicos.php");
			}else if($reprovado){
				//$sql = "DELETE FROM usuarios WHERE id= '$reprovado'";
				$sql = "UPDATE usuarios SET liberado = 'nao' WHERE id= '$reprovado'";
	       		$con->AprovarReprovarSindico($sql);
	        	header("Location: ../adm_sindicos.php");
			}else {
				echo "erro";
			}

		}else{
			$con->DeletarSindico($reprovado);
			header("Location: ../adm_sindicos.php");
		}
		


        
        
	
