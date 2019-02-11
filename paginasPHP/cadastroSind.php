<?php
require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();

	if(!empty($_POST['nome'])  && !empty($_POST['senha']) && !empty($_POST['email'])){
        //usuario sindico
		$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
		$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
        $tel_cel = isset($_POST['tel-cel']) ? $_POST['tel-cel'] : '';
        $nivel = isset($_POST['nivel']) ? $_POST['nivel'] : '';
        
        //dados
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
        $telefone_fix = isset($_POST['tel_fix']) ? $_POST['tel_fix'] : '';
        $data_aniversario = isset($_POST['data_aniv']) ? $_POST['data_aniv'] : '';
        $sexo = isset($_POST['genero']) ? $_POST['genero'] : '';
        $apresentacao = isset($_POST['apresentacao']) ? $_POST['apresentacao'] : '';
        $idiomas = isset($_POST['idiomas']) ? $_POST['idiomas'] : '';
        $link_video = isset($_POST['link_video']) ? $_POST['link_video'] : '';

        //curriculo
        $curriculo=$_FILES['curriculo']['name'];
        $curriculo_nome = $_FILES['curriculo']['name'];
        $curriculo_temp = $_FILES['curriculo']['tmp_name'];
        $curriculo_tipo = $_FILES['curriculo']['type'];
        $array_curriculo = array($curriculo_nome,$curriculo_temp,$curriculo_tipo);

        //foto
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
        $numero_casa = isset($_POST['numero_casa']) ? $_POST['numero_casa'] : '';

        //cursos
        $nome_curso = isset($_POST['nome_curso']) ? $_POST['nome_curso'] : '';
        $nome_instituicao = isset($_POST['nome_instituicao']) ? $_POST['nome_instituicao'] : '';
        $pais_instituicao = isset($_POST['pais_instituicao']) ? $_POST['pais_instituicao'] : '';
        $tipo_curso = isset($_POST['tipo_curso']) ? $_POST['tipo_curso'] : '';
        $inicio_curso = isset($_POST['inicio_curso']) ? $_POST['inicio_curso'] : '';
        $conclusao_curso = isset($_POST['conclusao_curso']) ? $_POST['conclusao_curso'] : '';
        $situacao_curso = isset($_POST['situacao_curso']) ? $_POST['situacao_curso'] : '';
        $array_curso = array($nome_curso,$nome_instituicao,$pais_instituicao,$tipo_curso,$inicio_curso,$conclusao_curso,$situacao_curso);

        //curriculo
        $nome_empresa = isset($_POST['nome_empresa']) ? $_POST['nome_empresa'] : '';
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
        $inicio = isset($_POST['inicio_empresa']) ? $_POST['inicio_empresa'] : '';
        $fim = isset($_POST['fim_empresa']) ? $_POST['fim_empresa'] : '';
        $situacao = isset($_POST['situacao']) ? $_POST['situacao'] : '';


	

		$sql = "INSERT INTO usuarios (nome, email, telefone, senha, cpf, telefone_fixo, data_aniversario, sexo, apresentacao, idiomas, link_video, cep, pais, estado, cidade, endereco, complemento, numero_casa,curriculo,nivel) 
                            VALUES('$nome','$email','$tel_cel','$senha','$cpf','$telefone_fix','$data_aniversario','$sexo','$apresentacao','$idiomas','$link_video','$cep','$pais','$estado','$cidade','$endereco','$complemento','$numero_casa','$curriculo','$nivel')";
		//$sql2 = "INSERT INTO exp_profissional (nome_empresa,cargo) VALUES('$empresa','$cargo')";
		//$login = "SELECT `id`, `nome` FROM `usuarios` WHERE (`email` = '".$email ."') AND (`senha` = '". $senha ."')  LIMIT 1";
        $con->cadastroUsuario($sql, $nome_empresa, $cargo,$inicio,$fim, $situacao,$array_curriculo, $array_foto, $array_curso);
        
	}else{
		die("erro");
	}
?>