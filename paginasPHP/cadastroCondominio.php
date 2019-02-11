<?php
require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();
$con->verificaLoginSoli();
	if(!empty($_POST['nome_cond'])){
        
        $id = $_SESSION['UsuarioID'];
        //foto
        $foto=$_FILES['Img_cond']['name'];
        $foto_nome = $_FILES['Img_cond']['name'];
        $foto_temp = $_FILES['Img_cond']['tmp_name'];
        $foto_tipo = $_FILES['Img_cond']['type'];
        $array_foto = array($foto_nome,$foto_temp,$foto_tipo);

        $nome_cond = isset($_POST['nome_cond']) ? $_POST['nome_cond'] : '';
        $cnpj_cond = isset($_POST['cnpj_cond']) ? $_POST['cnpj_cond'] : '';
        $tel_fix_cond = isset($_POST['tel_fix_cond']) ? $_POST['tel_fix_cond'] : '';
        $tipo_cond = isset($_POST['tipo_cond']) ? $_POST['tipo_cond'] : '';
        $unidades_cond = isset($_POST['unidades_cond']) ? $_POST['unidades_cond'] : '';
        $cep_cond = isset($_POST['cep_cond']) ? $_POST['cep_cond'] : '';
        $idade_cond = isset($_POST['idade_cond']) ? $_POST['idade_cond'] : '';
        $pais_cond = isset($_POST['pais_cond']) ? $_POST['pais_cond'] : '';
        $estado_cond = isset($_POST['estado_cond']) ? $_POST['estado_cond'] : '';
        $cidade_cond = isset($_POST['cidade_cond']) ? $_POST['cidade_cond'] : '';
        $endereco_cond = isset($_POST['endereco_cond']) ? $_POST['endereco_cond'] : '';
        $complemento_cond = isset($_POST['complemento_cond']) ? $_POST['complemento_cond'] : '';
        $numero_cond = isset($_POST['numero_cond']) ? intval($_POST['numero_cond']) : '';
 
        

        $sqlCond = "INSERT INTO condominio ( id_solicitante, nome_cond, cnpj_cond, tel_fix_cond, tipo_cond, unidades_cond,cep_cond, idade_cond, pais_cond, estado_cond, cidade_cond, endereco_cond, complemento_cond, numero_cond) 
        VALUES ('$id','$nome_cond','$cnpj_cond','$tel_fix_cond','$tipo_cond','$unidades_cond','$cep_cond','$idade_cond','$pais_cond','$estado_cond','$cidade_cond','$endereco_cond','$complemento_cond','$numero_cond')";

        
        $con->cadastroCondominio($sqlCond, $array_foto);
        
	}else{
		die("erro");
	}
?>