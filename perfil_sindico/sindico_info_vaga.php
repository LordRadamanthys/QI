<?php
require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();
$con->verificaLoginCandidato();
$id_condominio = $_GET['h'];
$id_vaga = $_GET['v'];
$usu = $con->listarDadosSind($_SESSION['UsuarioID']);
$dados_cond = $con->listarCondominiosPerfil($id_condominio);
$dados_vaga = $con->listarVagasCondominiosIdCond($id_vaga);

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
					<div class="img-perfil" style="background-image: url(../src/usuarios_sind/<?= $_SESSION['UsuarioID'] ?>/foto/perfil.jpg);"></div>
					<nav class="menu2">
						<ul>
							<li><a href="sindico_principal.html"><i class="far fa-user"></i> Principal</a></li>
							<li><a href="sindico_painel_vagas.php"><i class="fas fa-clipboard"></i> Vagas</a></li>
							<li><a href="sindico_painel_seguindo.php"><i class="far fa-building"></i> Seguindo</a></li>
							<li><a href="sindico_painel_condominio.php"><i class="fas fa-building"></i> Condomínios</a></li>
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
						<h2 class="caminho-ativo"><i class="fas fa-clipboard"></i> Informações da vaga</h2>
					</div>
					<div class="linha-conteudo">
						<div class="vaga">
							<div class="vagas-opcao-cont">
								<div class="texto texto-infos-vagas">
									<div class="banner-perfil">
										<div class="linha">
											<div class="img-perfil-conteudo" style="background-image: url(../src/usuarios_cond/<?= $dados_cond['id'] ?>/foto/perfil.jpg);"></div>
											<div class="nome-perfil">
												<h2><?= $dados_vaga['posicao'] ?></h2>
												<hr>
												<h3><?= $dados_cond['nome_cond'] ?></h3>
											</div>
										</div>
									</div>
								</div>
								<div class="texto texto-infos-vagas" style="background-color: #fff">
									<div style="width: 96%; padding: 5px 2%">
										<span class="titulo-perfil">Descrição da vaga</span><br><br>
										<?= $dados_vaga['descricao'] ?>
									</div>
									<div class="linha-conteudo" style="width: 96%; padding: 5px 2%">
										<div class="quadro-sobre">
											<div class="titulo-quadro">
												Sobre a vaga
											</div>
											<div class="text-quadro">
												<span class="info-titulo">Posição:</span> <?= $dados_vaga['posicao'] ?><br>
												<span class="info-titulo">Período (em horas):</span> <?= $dados_vaga['horas_trabalho'] ?><br>
												<span class="info-titulo">Honorário:</span> <?= $dados_vaga['honorario'] ?><br>
												<span class="info-titulo">Localidade:</span> <?= $dados_cond['endereco_cond'] ?><br>											
											</div>
										</div>
										<div class="quadro-sobre">
											<div class="titulo-quadro">Competências e Requesitos
											</div>
											<div class="text-quadro">
												<span class="info-titulo">Competências:</span> <?= $dados_vaga['competencias'] ?><br>
												<span class="info-titulo">Requesitos:</span> <?= $dados_vaga['requisitos'] ?><br>
											</div>
										</div>
										<div class="quadro-sobre">
											<div class="titulo-quadro">
												Informações do condomínio
											</div>
											<div class="text-quadro animated fade-in-down">
												<span class="info-titulo">Nome do condomínio:</span> <?= $dados_cond['nome_cond'] ?><br>
												<span class="info-titulo">Tipo:</span> <?= $dados_cond['tipo_cond'] ?><br>
												<span class="info-titulo">Quantidade de unidades:</span> <?= $dados_cond['unidades_cond'] ?><br>
												<span class="info-titulo">Idade do empreendimento:</span> <?= $dados_cond['idade_cond'] ?><br>	
											</div>
										</div>
										<div class="quadro-sobre">
											<div class="titulo-quadro">
												Localização
											</div>
											<div class="text-quadro animated fade-in-down">
												<span class="info-titulo">CEP:</span> <?= $dados_cond['cep_cond'] ?><br>
												<span class="info-titulo">País:</span> <?= $dados_cond['pais_cond'] ?><br>
												<span class="info-titulo">Estado:</span> <?= $dados_cond['estado_cond'] ?><br>
												<span class="info-titulo">Cidade:</span> <?= $dados_cond['cidade_cond'] ?><br>	
												<span class="info-titulo">Endereço:</span> <?= $dados_cond['endereco_cond'] ?><br>	
												<span class="info-titulo">Complemento:</span> <?= $dados_cond['complemento_cond'] ?><br>
												<span class="info-titulo">Número:</span> <?= $dados_cond['numero_cond'] ?><br>		
											</div>
										</div>
									</div>
									<?php
									$verificaCandidatura = $con->verificarCandidatura($_SESSION['UsuarioID'],$dados_cond['id']);
									if($verificaCandidatura<1){ ?>
									<form style="padding-bottom: 10px" method="post" action="../paginasPHP/candidato_vaga.php">
										<input type="hidden" name="id_usuario" value="<?= $_SESSION['UsuarioID'] ?>">
										<input type="hidden" name="id_condominio" value="<?= $dados_cond['id'] ?>">
										<button type="submit" class="submit">Me candidatar a vaga</button>
									</form>
								<?php } ?>
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