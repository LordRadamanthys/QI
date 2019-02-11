<?php
require('../php/conexao.php');
$con = new Banco();

		$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
		$id_condominio = isset($_POST['id_condominio']) ? $_POST['id_condominio'] : '';
		$seguindo = isset($_POST['seguindo']) ? $_POST['seguindo'] : '';
    
		$sql = "INSERT INTO candidato_vaga (id_usuario, id_condominio) 
                            VALUES('$id_usuario','$id_condominio')";
		
        $con->Candidatar($sql);
        header("Location: ../perfil_sindico/sindico_info_vaga.php?h=$id_condominio&v=$id_usuario");
        
	

?>