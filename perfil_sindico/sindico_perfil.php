<?php
require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();
$con->verificaLoginCandidato();

$usu    = $con->listarDadosSind($_SESSION['UsuarioID']);
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
	<title>Deals</title>
  	<script type="text/javascript">
    	function AbrirContEsco() {
  			contesco = document.getElementById('escolaridade');
  			if(contesco.style.display=='none'){
  				contesco.style.display='block';
  			}
  			else{
  				contesco.style.display='none';
  			}
		}
    	function AbrirContProf() {
  			contprof = document.getElementById('profissional');
  			if(contprof.style.display=='none'){
  				contprof.style.display='block';
  			}
  			else{
  				contprof.style.display='none';
  			}
		}
		function Voltar() {
  			window.history.back();
		}
  	</script>
</head>
<body>

	<!-- <a onclick="document.getElementById('faleconosco').style.display='block'" title="Fale Conosco">
		<div class="faleconoscobtn" id="btnfale">
			<div class="fale" style="color: #fff; background-color: #000;">Fale conosco</div>
		</div>
	</a>
	<div id="faleconosco" class="modal">
        <div class="campo animated bounceInRight"  style="background-color: #fff; color:#000;">
            <i class="fas fa-times-circle" id="fechar" onclick="document.getElementById('faleconosco').style.display='none'" title="Fechar"></i><br><br>
            <div class="texto">
				<a href="https://wa.me/551122271595?text=Não%20quero%20em%20perder%20mais%20campanhas%20do%20Ecossistema" target="_blank" class="sociais-btn" title="whatsapp"><i class="fab fa-whatsapp"></i></a><br>
				<a href="https://m.me/ecossistemacondominial" target="_blank" class="sociais-btn" title="messenger"><i class="fab fa-facebook-messenger"></i></a><br>
				<a href="https://br.linkedin.com/company/ecossistemacondominial" target="_blank" class="sociais-btn" title="linkedin"><i class="fab fa-linkedin-in"></i></a>
				<a href="https://www.facebook.com/ecossistemacondominial/" target="_blank" class="sociais-btn" title="facebook"><i class="fab fa-facebook-f"></i></a>
				<a href="https://www.youtube.com/channel/UCkTVUd0vOs-aKbUxPB_gO5Q?view_as=subscriber" target="_blank" class="sociais-btn" title="youtube"><i class="fab fa-youtube"></i></a>
				<a href="https://redeecominio.com.br/ecossistema/" target="_blank" class="sociais-btn" title="site"><i class="fas fa-globe"></i></a>
			</div>
		</div>
	</div> -->

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
					<nav class="menu1">
						<a href=""><i class="fas fa-sliders-h"></i><br>Conta</a>
						<a href="sindico_perfil.php"><i class="far fa-user"></i><br>Perfil</a>
						<a href="../sair.php"><i class="fas fa-sign-out-alt"></i><br>Sair</a>
					</nav>
					<div class="img-perfil" style="background-image: url(../src/usuarios_sind/<?=$dados_usuario['id']?>/foto/1.jpg);"></div>
					<nav class="menu2">
						<ul>
							<li><a href="sindico_principal.php"><i class="far fa-user"></i> Principal</a></li>
							<li><a href="sindico_painel_vagas.php"><i class="fas fa-clipboard"></i> Vagas</a></li>
							<li><a href="sindico_painel_seguindo.php"><i class="far fa-building"></i> Seguindo</a></li>
							<!--li><a href="sindico_painel_condominio.php"><i class="fas fa-building"></i> Condomínios</a></li-->
							<li><a href="sindico_candidaturas.php"><i class="far fa-folder"></i> Minhas Candidaturas</a></li>
							<li><a href="sindico_mensagem.php"><i class="far fa-envelope"></i> Mensagens</a></li>
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
					<div class="linha-conteudo">
						<div class="vaga">
							<div class="vagas-opcao-cont">
								<div class="texto texto-infos-vagas">
									<div class="banner-perfil">
										<div class="linha">
											<div class="img-perfil-conteudo" style="background-image: url(../src/usuarios_sind/<?=$dados_usuario['id']?>/foto/1.jpg);"></div>
											<div class="nome-perfil">
												<h2><?=$dados_usuario['nome']?></h2>
												<hr>
												<h3><?=$dados_usuario_exp['cargo']?></h3>
											</div>
										</div>
									</div>
									<div class="sobre-perfil">
										<div class="texto-sobre-perfil">
											<div class="texto">
												<span class="titulo-perfil">Apresentação</span><br><br>
												<?=$dados_usuario['apresentacao']?>
											</div>
											<div class="texto">
												<div class="linha-conteudo">
													<div class="quadro-sobre">
														<div class="titulo-quadro">Vídeo apresentação 
															<a href="sindico_editar_form.html">
															<i class="fas fa-user-edit"></i>
														</a></div>
														<div class="text-quadro">
															<div class="quadrovideo">
																<div class="videoresponsivo">
																	<iframe src="<?=$dados_usuario['link_video']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
																</div>
															</div>
														</div>
													</div>
													<div class="quadro-sobre">
														<div class="titulo-quadro">
															Sobre 
															<a href="sindico_editar_form.html">
																<i class="fas fa-user-edit"></i>
															</a>
														</div>
														<div class="text-quadro">
															<span class="info-titulo">Perfil público:</span> ID<br>
															<span class="info-titulo">Nome:</span> <?=$dados_usuario['nome']?><br>
															<span class="info-titulo">Data de aniversário:</span> <?=$dados_usuario['data_aniversario']?><br>
															<span class="info-titulo">Gênero:</span> <?=$dados_usuario['sexo']?><br>
															<span class="info-titulo">Idiomas:</span> <?=$dados_usuario['idiomas']?><br>											
														</div>
													</div>
													<div class="quadro-sobre quadro-experiencia">
														<div class="titulo-quadro" onclick="AbrirContEsco()">
															Escolaridade / Cursos 
															<a href="sindico_editar_form.html">
																<i class="fas fa-user-edit"></i>
															</a>
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
															<a href="sindico_editar_form.html">
																<i class="fas fa-user-edit"></i>
															</a>
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
