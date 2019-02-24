<?php
require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();

	if(!empty($_POST['nome_soli'])  && !empty($_POST['senha_cond']) && !empty($_POST['e_mail_cond'])){
        //usuario sindico
		$nome = isset($_POST['nome_soli']) ? $_POST['nome_soli'] : '';
		$senha = isset($_POST['senha_cond']) ? base64_encode(sha1('tomaLixo'. $_POST['senha_cond'])) : '';
		$email = isset($_POST['e_mail_cond']) ? strtolower($_POST['e_mail_cond']) : '';
        $tel_cel = isset($_POST['tel_cel_cond']) ? $_POST['tel_cel_cond'] : '';
        $nivel = isset($_POST['nivel']) ? $_POST['nivel'] : '';
        
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
        
        //foto
        $foto=$_FILES['Img_perfil_soli']['name'];
        $foto_nome = $_FILES['Img_perfil_soli']['name'];
        $foto_temp = $_FILES['Img_perfil_soli']['tmp_name'];
        $foto_tipo = $_FILES['Img_perfil_soli']['type'];
        $array_foto = array($foto_nome,$foto_temp,$foto_tipo);

        $liberado = "nao";
        $sqlSoli = "INSERT INTO solicitante_cond ( nome, senha, email, celular, cpf, funcao, tel_fixo, data_aniversario, sexo, cep, pais, estado, cidade, endereco, complemento, numero, nivel,liberado) VALUES ('$nome','$senha','$email','$tel_cel','$cpf','$funcao_soli','$tel_fix_soli','$data_aniv_soli','$sexo','$cep_soli','$pais_soli','$estado_soli','$cidade_soli','$endereco_soli','$complemento_soli','$numero_soli','$nivel','$liberado')";
        
        $key = $con->verificaEmail($email);
        if($key[0]==false){
            echo $key[1];
        }else{
        $con->cadastroCondominioSolicitante($sqlSoli, $array_foto);
        }
	}else{
		die("erro");
	}
?>