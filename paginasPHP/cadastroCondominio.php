<?php
require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();
$con->verificaLoginSoli();

	if(!empty($_POST['nome_cond'])){
        $id_cond = $_POST['id_cond'];
        $id = $_SESSION['UsuarioID'];
        //foto
        $foto= isset($_FILES['Img_cond']['name']) ? $_FILES['Img_cond']['name'] : '';
        $foto_nome = isset($_FILES['Img_cond']['name']) ? $_FILES['Img_cond']['name'] : '';
        $foto_temp = isset($_FILES['Img_cond']['tmp_name']) ? $_FILES['Img_cond']['tmp_name'] : '';
        $foto_tipo = isset($_FILES['Img_cond']['type']) ? $_FILES['Img_cond']['type'] : '';
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
 
        
                if(empty($_POST["editar"])){
                        $sqlCond = "INSERT INTO condominio ( id_solicitante, nome_cond, cnpj_cond, tel_fix_cond, tipo_cond, unidades_cond,cep_cond, idade_cond, pais_cond, estado_cond, cidade_cond, endereco_cond, complemento_cond, numero_cond) 
                        VALUES ('$id','$nome_cond','$cnpj_cond','$tel_fix_cond','$tipo_cond','$unidades_cond','$cep_cond','$idade_cond','$pais_cond','$estado_cond','$cidade_cond','$endereco_cond','$complemento_cond','$numero_cond')";
                        $con->cadastroCondominio($sqlCond, $array_foto);
                }else{
                        $sqlAtu = "UPDATE condominio SET nome_cond='$nome_cond', cnpj_cond='$cnpj_cond', tel_fix_cond='$tel_fix_cond', tipo_cond='$tipo_cond', unidades_cond='$unidades_cond',cep_cond='$cep_cond', idade_cond='$idade_cond', pais_cond='$pais_cond', estado_cond='$estado_cond', cidade_cond='$cidade_cond', endereco_cond='$endereco_cond', complemento_cond='$complemento_cond', numero_cond='$numero_cond' WHERE id = $id_cond";
                        $con->AtualizarCondominio($sqlAtu,$array_foto,$id_cond);
                        header("Location: ../perfil_solicitante/solicitante_painel_condominio.php"); exit;
                }
	}else{
		die("erro");
	}
?>