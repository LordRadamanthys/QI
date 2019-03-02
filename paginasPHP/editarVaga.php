<?php
require('../php/conexao.php');
$con = new Banco();
$con->verificaLoginSoli();
	if(!empty($_POST['posicao_vaga'])){
        
        //$id_usuario = $_SESSION['UsuarioID'];
        $id_vaga = isset($_POST['id_vaga']) ? $_POST['id_vaga'] : '';
        $posicao_vaga = isset($_POST['posicao_vaga']) ? $_POST['posicao_vaga'] : '';
        $periodo_vaga = isset($_POST['periodo_vaga']) ? $_POST['periodo_vaga'] : '';
        $nivel_escolaridade_vaga = isset($_POST['nivel_escolaridade_vaga']) ? $_POST['nivel_escolaridade_vaga'] : '';
        $honorario_vaga = isset($_POST['honorario_vaga']) ? $_POST['honorario_vaga'] : '';
        $descricao_vaga = isset($_POST['descricao_vaga']) ? $_POST['descricao_vaga'] : '';
        $competencias_vaga = isset($_POST['competencias_vaga']) ? $_POST['competencias_vaga'] : '';
        $requesitos_vaga = isset($_POST['requesitos_vaga']) ? $_POST['requesitos_vaga'] : '';

        
 
        

      

        $sqlVaga = "UPDATE vagas_condominio SET posicao='$posicao_vaga', horas_trabalho='$periodo_vaga', nivel_escolaridade='$nivel_escolaridade_vaga', honorario='$honorario_vaga', descricao='$descricao_vaga', competencias='$competencias_vaga', requisitos='$requesitos_vaga' WHERE id = '$id_vaga'";

        
        $con->EditarVaga($sqlVaga);
        
	}else{ 
		die("erro");
	}
?>