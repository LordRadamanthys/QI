<?php
require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();

	
		$nome = isset($_POST['nome_soli']) ? $_POST['nome_soli'] : '';
		$senha = isset($_POST['senha_cond']) ? base64_encode(sha1('tomaLixo'. $_POST['senha_cond'])) : '';
		$email = isset($_POST['e_mail_cond']) ? strtolower($_POST['e_mail_cond']) : '';
        $tel_cel = isset($_POST['tel_cel_cond']) ? $_POST['tel_cel_cond'] : '';
        $nivel = isset($_POST['nivel']) ? $_POST['nivel'] : '';
        $id = $_POST['id'];
        //dados
        $cpf = isset($_POST['cpf_soli']) ? $_POST['cpf_soli'] : '';
        $funcao_soli = isset($_POST['funcao_soli']) ? $_POST['funcao_soli'] : '';
        $tel_fix_soli = isset($_POST['tel_fix_soli']) ? $_POST['tel_fix_soli'] : '';
        $data_aniv_soli = isset($_POST['data_aniv_soli']) ? $_POST['data_aniv_soli'] : '';
        $sexo = isset($_POST['genero_soli']) ? $_POST['genero_soli'] : '';

        $cep_soli = isset($_POST['cep_soli']) ? $_POST['cep_soli'] : '';
        $pais_soli = isset($_POST['pais_soli']) ? $_POST['pais_soli'] : '';
        $estado_soli = isset($_POST['estado_soli']) ? $_POST['estado_soli'] : '';
        $cidade_soli = isset($_POST['cidade_soli']) ? $_POST['cidade_soli'] : '';
        $endereco_soli = isset($_POST['endereco_soli']) ? $_POST['endereco_soli'] : '';
        $complemento_soli = isset($_POST['complemento_soli']) ? $_POST['complemento_soli'] : '';
        $numero_soli = isset($_POST['numero_soli']) ? $_POST['numero_soli'] : '';
        


        $liberado = "sim";
        $sqlSoli = "UPDATE solicitante_cond SET nome='$nome', senha='$senha', email='$email', celular='$tel_cel', cpf='$cpf', funcao='$funcao_soli', tel_fixo='$tel_fix_soli', data_aniversario='$data_aniv_soli', sexo='$sexo', cep='$cep_soli', pais='$pais_soli', estado='$estado_soli', cidade='$cidade_soli', endereco='$endereco_soli', complemento='$complemento_soli', numero='$numero_soli',liberado='$liberado' WHERE id='$id'";
        
        
     $con->AtualizarSolicitante($sqlSoli);
    
?>