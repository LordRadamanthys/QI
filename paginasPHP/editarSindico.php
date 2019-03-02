<?php
require('../php/conexao.php');
$con = new Banco();

	if(!empty($_POST['nome'])){
        //usuario sindico
		$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
		//$senha = isset($_POST['senha']) ? base64_encode(sha1('tomaLixo'. $_POST['senha'])) : '';
		//$email = isset($_POST['email']) ? strtolower($_POST['email']) : '';
        //$tel_cel = isset($_POST['tel-cel']) ? $_POST['tel-cel'] : '';
        $nivel = isset($_POST['nivel']) ? $_POST['nivel'] : '';
        $id_usuario = $_POST['id_usuario'];
        
        //dados
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
        $telefone_fix = isset($_POST['tel_fix']) ? $_POST['tel_fix'] : '';
        $data_aniversario = isset($_POST['data_aniv']) ? $_POST['data_aniv'] : '';
        $sexo = isset($_POST['genero']) ? $_POST['genero'] : '';
        $apresentacao = isset($_POST['apresentacao']) ? $_POST['apresentacao'] : '';
        $idiomas = isset($_POST['idiomas']) ? $_POST['idiomas'] : '';
        $link_video = isset($_POST['link_video']) ? $_POST['link_video'] : '';

        //curriculo
        /*$curriculo=$_FILES['curriculo']['name'];
        $curriculo_nome = $_FILES['curriculo']['name'];
        $curriculo_temp = $_FILES['curriculo']['tmp_name'];
        $curriculo_tipo = $_FILES['curriculo']['type'];
        $array_curriculo = array($curriculo_nome,$curriculo_temp,$curriculo_tipo);*/

        
        $foto=$_FILES['Img-perfil']['name'];
        $foto_nome = $_FILES['Img-perfil']['name'];
        $foto_temp = $_FILES['Img-perfil']['tmp_name'];
        $foto_tipo = $_FILES['Img-perfil']['type'];
        $array_foto = array($foto_nome,$foto_temp,$foto_tipo);

       //endereco
        $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
        $pais = isset($_POST['pais']) ? $_POST['pais'] : '';
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
        $numero_casa = isset($_POST['numero']) ? $_POST['numero'] : '';

        //cursos
        $nome_curso = isset($_POST['nome_curso']) ? $_POST['nome_curso'] : '';
        $nome_instituicao = isset($_POST['nome_instituicao']) ? $_POST['nome_instituicao'] : '';
        $pais_instituicao = isset($_POST['pais_instituicao']) ? $_POST['pais_instituicao'] : '';
        $tipo_curso = isset($_POST['tipo_curso']) ? $_POST['tipo_curso'] : '';
        $inicio_curso = isset($_POST['inicio_curso']) ? $_POST['inicio_curso'] : '';
        $conclusao_curso = isset($_POST['conclusao_curso']) ? $_POST['conclusao_curso'] : '';
        $situacao_curso = isset($_POST['situacao_curso']) ? $_POST['situacao_curso'] : '';
        $array_curso = array($nome_curso,$nome_instituicao,$pais_instituicao,$tipo_curso,$inicio_curso,$conclusao_curso,$situacao_curso);

        //exp
        $nome_empresa = isset($_POST['nome_empresa']) ? $_POST['nome_empresa'] : '';
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
        $inicio = isset($_POST['inicio_empresa']) ? $_POST['inicio_empresa'] : '';
        $fim = isset($_POST['fim_empresa']) ? $_POST['fim_empresa'] : '';
        $situacao = isset($_POST['situacao']) ? $_POST['situacao'] : '';

        $liberado ="sim";
	

		$sql = "UPDATE usuarios SET nome='$nome',  cpf='$cpf', telefone_fixo='$telefone_fix', data_aniversario='$data_aniversario', sexo='$sexo', apresentacao='$apresentacao', idiomas='$idiomas', link_video='$link_video', cep='$cep', pais='$pais', estado='$estado', cidade='$cidade', endereco='$endereco', complemento='$complemento', numero_casa='$numero_casa',nivel='$nivel',liberado='$liberado' WHERE id='$id_usuario'";

        $con->AtualizarSindico($sql,$id_usuario, $nome_empresa, $cargo,$inicio,$fim, $situacao, $array_curso, $array_foto);
        header("Location: ../perfil_sindico/sindico_perfil.php"); exit;
	}else{
		die("erro");
	}
?>