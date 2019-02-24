<?php
require('../php/conexao.php');
$con = new Banco();

		$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
		$id_condominio = isset($_POST['id_condominio']) ? $_POST['id_condominio'] : '';
        $id_vaga = isset($_POST['id_vaga']) ? $_POST['id_vaga'] : '';
		$seguindo = isset($_POST['seguindo']) ? $_POST['seguindo'] : '';
    
		$sql = "INSERT INTO candidato_vaga (id_usuario, id_condominio,id_vaga) 
                            VALUES('$id_usuario','$id_condominio','$id_vaga')";
		

$con->Candidatar($sql);

        header("Location: ../perfil_sindico/sindico_info_vaga.php?h=$id_condominio&v=$id_vaga");
        
	

?>