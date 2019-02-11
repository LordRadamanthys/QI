<?php
require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();
$con->verificaLoginSoli();
	if(!empty($_POST['cond_vaga'])){
        
        $id_usuario = $_SESSION['UsuarioID'];
        $cond_vaga = isset($_POST['cond_vaga']) ? $_POST['cond_vaga'] : '';
        $posicao_vaga = isset($_POST['posicao_vaga']) ? $_POST['posicao_vaga'] : '';
        $periodo_vaga = isset($_POST['periodo_vaga']) ? $_POST['periodo_vaga'] : '';
        $nivel_escolaridade_vaga = isset($_POST['nivel_escolaridade_vaga']) ? $_POST['nivel_escolaridade_vaga'] : '';
        $honorario_vaga = isset($_POST['honorario_vaga']) ? $_POST['honorario_vaga'] : '';
        $descricao_vaga = isset($_POST['descricao_vaga']) ? $_POST['descricao_vaga'] : '';
        $competencias_vaga = isset($_POST['competencias_vaga']) ? $_POST['competencias_vaga'] : '';
        $requesitos_vaga = isset($_POST['requesitos_vaga']) ? $_POST['requesitos_vaga'] : '';

        
 
        

      

        $sqlVaga = "INSERT INTO vagas_condominio (id_condominio,id_solicitante, posicao, horas_trabalho, nivel_escolaridade, honorario, descricao, competencias, requisitos)
                        VALUES ('$cond_vaga','$id_usuario','$posicao_vaga','$periodo_vaga','$nivel_escolaridade_vaga','$honorario_vaga','$descricao_vaga','$competencias_vaga','$requesitos_vaga')";

        
        $con->cadastroVagaCondominio($sqlVaga);
        
	}else{ 
		die("erro");
	}
?>