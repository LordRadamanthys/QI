<?php
require('../php/conexao.php');
$con = new Banco();
$VerificaSeguindo = $con->verificarSeguindo($_POST['id_usuario'],$_POST['id_condominio']);
if($VerificaSeguindo['seguindo'] == ""){
	if($_POST['seguindo'] == 1){
        //Seguir
		$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
		$id_condominio = isset($_POST['id_condominio']) ? $_POST['id_condominio'] : '';
		$seguindo = isset($_POST['seguindo']) ? $_POST['seguindo'] : '';
    
		$sql = "INSERT INTO seguindo (id_usuario, id_condominio, seguindo) 
                            VALUES('$id_usuario','$id_condominio','$seguindo')";
		
        $con->seguir($sql);
        header("Location: ../perfil_sindico/sindico_info_condominio.php?h=$id_condominio");
        
	}else if($_POST['seguindo'] == 0){
		//Deixar de Seguir
        $id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
        $id_condominio = isset($_POST['id_condominio']) ? $_POST['id_condominio'] : '';
        $seguindo = isset($_POST['seguindo']) ? $_POST['seguindo'] : '';
    
        $sql = "UPDATE seguindo SET id_usuario = '$id_usuario', id_condominio = '$id_condominio', seguindo = '$seguindo' WHERE id_usuario = '$id_usuario' AND id_condominio = '$id_condominio'";
        
        $con->seguir($sql);
        header("Location: ../perfil_sindico/sindico_info_condominio.php?h=$id_condominio");
	}
}else{
    if($_POST['seguindo'] == 1){
        //Seguir
        $id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
        $id_condominio = isset($_POST['id_condominio']) ? $_POST['id_condominio'] : '';
        $seguindo = isset($_POST['seguindo']) ? $_POST['seguindo'] : '';
    
        $sql = "UPDATE seguindo SET id_usuario = '$id_usuario', id_condominio = '$id_condominio', seguindo = '$seguindo' WHERE id_usuario = '$id_usuario' AND id_condominio = '$id_condominio'";
        
        $con->seguir($sql);
        header("Location: ../perfil_sindico/sindico_info_condominio.php?h=$id_condominio");
        
    }else if($_POST['seguindo'] == 0){
        //Deixar de Seguir
        $id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
        $id_condominio = isset($_POST['id_condominio']) ? $_POST['id_condominio'] : '';
        $seguindo = isset($_POST['seguindo']) ? $_POST['seguindo'] : '';
    
        $sql = "UPDATE seguindo SET id_usuario = '$id_usuario', id_condominio = '$id_condominio', seguindo = '$seguindo' WHERE id_usuario = '$id_usuario' AND id_condominio = '$id_condominio'";
        
        $con->seguir($sql);
        header("Location: ../perfil_sindico/sindico_info_condominio.php?h=$id_condominio");
    }
}
?>