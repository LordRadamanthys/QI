<?php  
require('conexao_adm/conexao_adm.php');
$con = new ConexaoAdm();
$id = $_GET['idh'];
//$usuario=$con->PegaUsuario($id);

$usu  = $con->listarDadosSind($id);
$dados_usuario = $usu[0];
$dados_usuario_exp = $usu[1];
$dados_usuario_esco = $usu[2];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
	<script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>

	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
	<link rel="icon" type="image/png" href="imagens/favicon.png" />
	<link rel="icon" type="image/x-icon" href="imagens/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="imagens/favicon.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="imagens/favicon.png">
	<link rel="apple-touch-icon-precomposed" href="imagens/favicon.png">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<title>Síndico Perfil - ADM - Qi do condomínio</title>
  	<script type="text/javascript">
		function Voltar() {
  			window.history.back();
		}
  	</script>
  	  	<script>
function aprovar(valor, nome) {
    /*document.getElementById('aprovado').value = valor;
    document.getElementById('question').innerHTML = nome;*/

    document.getElementById('reprovado1').value = valor;
    document.getElementById('question1').innerHTML = nome;

    document.getElementById('reprovado2').value = valor;
    document.getElementById('question2').innerHTML = nome;
}
function enviarEmail(id, email, nome) {
    document.getElementById('nome_email').value = nome;
    document.getElementById('email_enviar').value = email;
    document.getElementById('id_email').value = id;
}

</script>
</head>
<body>
	<header>
		<div class="caixalogo">
			<img src="imagens/logo.png">
		</div>
		<h1>do Condomínio</h1>
		<a href="https://redeecominio.com.br/ecossistema/" target="_blank">
			<div class="ecossistema">
				<img src="imagens/ecossistema.png">
			</div>
		</a>
	</header>
	<main>
		<div class="linha">
			<a href="" class="iconmenu"><i class="fas fa-bars"></i></a>
			<div class="cont-menu" id="lateral">
				<div class="menu-lateral">
					<div class="pesquisa">
						<!-- <form>
							<i class="fas fa-search"></i><input type="text" name="pesquisa">
						</form> -->
					</div>
					<nav class="menu2" style="margin-top: 10px;">
						<ul>
							<li><a href="adm_principal.html"><i class="fas fa-th"></i> Principal</a></li>
							<li><a href="adm_mensagens.html#mensagem"><i class="far fa-envelope"></i> Mensagens</a></li>
							<li><a href="adm_vagas.html#vaga"><i class="fas fa-clipboard"></i> Vagas</a></li>
							<li><a href="adm_sindicos.html#candidato"><i class="far fa-user"></i> Candidatos</a></li>
							<li><a href="adm_condominios.html#condominio"><i class="fas fa-building"></i> Condomínios</a></li>
							<li><a href="adm_solicitantes.html#solicitante"><i class="fas fa-user"></i> Solicitante</a></li>
							<li><a href="adm_configuracoes.html"><i class="fas fa-cog"></i> Configurações</a></li>
							<li><a href=""><i class="fas fa-sign-out-alt"></i> Sair</a></li>						
						</ul>
					</nav>
				</div>
			</div>
			<div class="cont-conteudo">
				<div class="c1">
					<div class="caminho">
						<a onclick="Voltar()">
							<div class="index_btn btn-caminho">
								<i class="fas fa-arrow-alt-circle-left"></i> Voltar
							</div>
						</a>
						<h2 class="caminho-ativo"><i class="fas fa-user"></i> Perfil Síndico</h2>
					</div>
					<div class="pop-up-excluir" id="reprovar">
						<div class="excluir-txt">
							<span>Você tem certeza que quer reprovar o <span id="question1">?</span>
							<form  method="post" action="conexao_adm/aprovar_reprovar.php">
								<input type="hidden" name="id_usuarioRE" id="reprovado1">
								<button class="submit" type="submit" style="margin-bottom: 10px">Sim</button>
								<button class="reset" type="reset" onclick="document.getElementById('reprovar').style.display='none'">Não</button>
							</form>
						</div>
					</div>
					<div class="pop-up-excluir" id="excluir">
						<div class="excluir-txt">
							<span>Você tem certeza que quer excluir o <span id="question2">?</span>
							<form  method="post" action="conexao_adm/aprovar_reprovar.php">
								<input type="hidden" name="id_usuarioRE" id="reprovado2">
								<button type="submit" class="submit" style="margin-bottom: 10px">Sim</button>
								<button class="reset" type="reset" onclick="document.getElementById('excluir').style.display='none'">Não</button>
							</form>
						</div>
					</div>
					<div class="pop-up-excluir" id="notificar">
						<div class="excluir-txt" style="background-color: #c7c7c7">
							<form style="display: inline-block; text-align: center; margin-top: -2px;" >
								Escreva o texto da notificação
								<input type="hidden" name="id_email" id="id_email">
								<input type="hidden" name="email_enviara" id="email_enviar">
								<input type="hidden" name="nome_emaila" id="nome_email">
								<textarea  required="" name="mensagem" placeholder="Escreva uma mensagem"></textarea>
								<button type="submit" class="submit" style="margin-top: 10px;">Enviar</button>
								<button class="reset" onclick="document.getElementById('notificar').style.display='none'">Cancelar</button>
							</form>
						</div>
					</div>
					<div class="linha-conteudo">
						<div class="vaga">
							<div class="vagas-opcao-cont">
								<div class="texto texto-infos-vagas">
									<div class="banner-perfil">
										<div class="linha-banner">
											<div class="img-perfil-conteudo" style="background-image: url(../src/usuarios_sind/<?= $id ?>/foto/1.jpg);"></div>
											<div class="nome-perfil">
												<h2><?= $dados_usuario['nome'] ?></h2>
												<hr>
												<h3><?= $dados_usuario_exp['cargo'] ?></h3>
											</div>
										</div>
									</div>
									<div class="sobre-perfil">
										<div class="texto-sobre-perfil">
											<div class="texto">
												<?php if($con->VerificarUsuarioAprovado($id)<1){ ?>
												<form style="padding-bottom: 10px" method="post" action="conexao_adm/aprovar_reprovar.php">
													<input type="hidden" name="id_usuario" value="<?= $id ?>">
													<button type="submit" class="submit">Aprovar o síndico</button>			
													<button type="reset" class="reset" onclick="document.getElementById('reprovar').style.display='flex'; aprovar(<?= $id?>,'<?= $dados_usuario["nome"] ?>')">Não aprovar o síndico</button>
													<a href="adm_sindico_editar_form.php?idh=<?= $dados_usuario["id"] ?>" style="margin-top: 5px">
														<div class="index_btn btn-reg">
															Editar informações
														</div>
													</a>
												</form>
												<?php }else if($con->VerificarUsuarioAprovado($id)>0){ ?>
												<form style="padding-bottom: 10px">	
												Depois de ser aprovado aparecem essas opções:			
													<button type="reset" class="submit" onclick="document.getElementById('notificar').style.display='flex';enviarEmail('<?= $dados_usuario["id"] ?>', '<?= $dados_usuario["email"] ?>', '<?= $dados_usuario["nome"] ?>')">Notificar o síndico</button>
													<button type="reset" class="reset" onclick="document.getElementById('excluir').style.display='flex'; aprovar(<?= $id?>,'<?= $dados_usuario["nome"] ?>')">Excluir o síndico</button>
													<a href="adm_sindico_editar_form.php?idh=<?= $dados_usuario["id"] ?>" style="margin-top: 5px">
														<div class="index_btn btn-reg">
															Editar informações
														</div>
													</a>
												</form>
											<?php } ?>
												<span class="titulo-perfil">Apresentação</span><br><br>
												<?= $dados_usuario['apresentacao'] ?>
											</div>
											<div class="texto">
												<div class="linha-conteudo">
													<div class="quadro-sobre">
														<div class="titulo-quadro">Vídeo apresentação</div>
														<div class="text-quadro">
															<div class="quadrovideo">
																<div class="videoresponsivo">
																	<iframe src="<?= $dados_usuario['link_video'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
																</div>
															</div>
														</div>
													</div>
													<div class="quadro-sobre">
														<div class="titulo-quadro">
															Sobre
														</div>
														<div class="text-quadro">
															<span class="info-titulo">Perfil público:</span> ID<br>
															<span class="info-titulo">Nome:</span> <?= $dados_usuario['nome'] ?><br>
															<span class="info-titulo">Data de aniversário:</span> <?= $dados_usuario['data_aniversario'] ?><br>
															<span class="info-titulo">Gênero:</span> <?= $dados_usuario['sexo'] ?><br>
															<span class="info-titulo">Idiomas:</span> <?= $dados_usuario['idiomas'] ?><br>											
														</div>
													</div>
													<div class="quadro-sobre quadro-experiencia">
														<div class="titulo-quadro" onclick="AbrirContEsco()">
															Escolaridade / Cursos
														</div>
														<div class="text-quadro animated fade-in-down" id="escolaridade">
															<span class="info-titulo">Nome do curso:</span> <?=$dados_usuario_esco['nome_curso']?><br>
															<span class="info-titulo">Nome da instituição:</span> <?=$dados_usuario_esco['instituicao']?><br>
															<span class="info-titulo">País onde cursou:</span> <?=$dados_usuario_esco['pais']?><br>
															<span class="info-titulo">Tipo de curso:</span> <?=$dados_usuario_esco['tipo_curso']?><br>
															<span class="info-titulo">Inicio do curso:</span> <?=$dados_usuario_esco['inicio']?><br>
															<span class="info-titulo">Conclusão do curso:</span>  <?=$dados_usuario_esco['conclusao']?><br>
															<span class="info-titulo">Situação:</span> <?=$dados_usuario_esco['situacao']?><br>
															<hr>
														</div>
													</div>
													<div class="quadro-sobre quadro-experiencia">
														<div class="titulo-quadro" onclick="AbrirContProf()">
															Experiência profissional
														</div>
														<div class="text-quadro animated fade-in-down" id=profissional>
															<span class="info-titulo">Nome da empresa:</span> <?=$dados_usuario_exp['nome_empresa']?><br>
															<span class="info-titulo">Cargo:</span> <?=$dados_usuario_exp['cargo']?><br>
															<span class="info-titulo">Data inicio:</span> <?=$dados_usuario_exp['inicio']?><br>
															<span class="info-titulo">Data termino:</span> <?=$dados_usuario_exp['fim']?><br>
															<span class="info-titulo">Situação:</span> <?=$dados_usuario_exp['situacao']?><br>
															<hr>										
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>