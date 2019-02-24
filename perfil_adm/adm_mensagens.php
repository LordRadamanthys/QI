<?php 
	require('conexao_adm/conexao_adm.php');
	$con = new ConexaoAdm();
	$conversas = $con->listarConversasSolicitante();
	$conversasSindico = $con->listarConversasSindico();
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
	<title>Página principal - ADM - Qi do condomínio</title>
  	<script type="text/javascript">
		function Voltar() {
  			window.history.back();
		}
  	</script>
</head>
<body id="mensagem">
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
							<li><a href="adm_principal.php"><i class="fas fa-th"></i> Principal</a></li>
							<li class="active"><a href="adm_mensagens.php#mensagem"><i class="far fa-envelope"></i> Mensagens</a></li>
							<li><a href="adm_vagas.php#vaga"><i class="fas fa-clipboard"></i> Vagas</a></li>
							<li><a href="adm_sindicos.php#candidato"><i class="far fa-user"></i> Síndico</a></li>
							<li><a href="adm_condominios.php#condominio"><i class="fas fa-building"></i> Condomínios</a></li>
							<li><a href="adm_solicitantes.php#solicitante"><i class="fas fa-user"></i> Solicitante</a></li>
							<li><a href="adm_configuracoes.php"><i class="fas fa-cog"></i> Configurações</a></li>
							<li><a href=""><i class="fas fa-sign-out-alt"></i> Sair</a></li>							
						</ul>
					</nav>
				</div>
			</div>
			<div class="cont-conteudo">
				<div class="pop-up-excluir" id="excluir">
					<div class="excluir-txt">
						Você tem certeza que quer excluir o (Condomínio)?
						<form>
							<button type="submit" style="margin-bottom: 10px">Sim</button>
							<button type="reset" onclick="document.getElementById('excluir').style.display='none'">Não</button>
						</form>
					</div>
				</div>
				<div class="c1">
					<div class="linha-conteudo">
						<div class="vaga principal">
							<div class="texto "> <!-- texto-infos-vagas"> -->
								<div class="vagas-opcao-cont">
									<div class="quadros quadros-2">
										<div class="quadro active" style="margin-bottom: 0;">
											<a href="adm_mensagens.html#mensagem">
												<div class="quadro-img" style="background-color: #009900; filter: none"><i class="far fa-envelope"></i></div>
												<div class="quadro-txt" style="background-color: #006600;"><div>Mensagens Solicitante</div></div>
											</a>
										</div>
										<div class="caixa-emails" style="margin: 0 0.6%; margin-bottom: 10px; width: 100%">
											<div class="quadros-titulo"><span class="titulo-perfil" style="color: #009900"><h2>Caixa de entrada</h2></span></div>
						<?php
						$controle = array();
						$i=0;
							$result = $con->tipoMensagem; 
							if($conversas > 0){    
	                             do{
	                             	$usuario=$con->PegarSolicitante($conversas['id_usuario']);
	                             	$num=$con->NumeroDeMensagens($conversas['id_usuario'],"sol");
	                             	if(!in_array($conversas['id_usuario'],$controle)){
						?>
											<a href="adm_caixa_mensagens.php?h=<?= $conversas['id'] ?>&idh=<?= $conversas['id_usuario']?>&t=sol">
												<div class="mensagem">
													<div class="contagem_mensagem"><?=$num?></div>
													<b><?=  $usuario['nome'] ?> - <?=  $conversas['tipo_usuario'] ?></b><br>
													<span class="texto-mensagem"><?= substr($conversas['mensagem'], 0, 20)?></span><br>
													<span class="data-mensagem"><?=  $conversas['hora'] ?> - <?=  $conversas['data'] ?></span>
												</div>
											</a>
						<?php }$controle[$i]=$conversas['id_usuario'];
								$i++;
						 		}while ($conversas = mysqli_fetch_assoc($result));
							}else{
							echo "";
							} ?>

											
										</div>



<div class="quadro active" style="margin-bottom: 0;">
											<a href="adm_mensagens.html#mensagem">
												<div class="quadro-img" style="background-color: #009900; filter: none"><i class="far fa-envelope"></i></div>
												<div class="quadro-txt" style="background-color: #006600;"><div>Mensagens Sindico</div></div>
											</a>
										</div>
										<div class="caixa-emails" style="margin: 0 0.6%; margin-bottom: 10px; width: 100%">
											<div class="quadros-titulo"><span class="titulo-perfil" style="color: #009900"><h2>Caixa de entrada</h2></span></div>
						<?php
						$controle2 = array();
						$i=0;
							$result = $con->tipoMensagemSind; 
							if($conversasSindico > 0){    
	                             do{
	                             	$usuarioSindico=$con->PegarSolicitanteOuUsuario($conversasSindico['id_usuario'],"sindico");
	                             	$num=$con->NumeroDeMensagens($conversasSindico['id_usuario'],"sin");
	                             	if(!in_array($conversasSindico['id_usuario'],$controle2)){
						?>
											<a href="adm_caixa_mensagens.php?h=<?= $conversasSindico['id'] ?>&idh=<?= $conversasSindico['id_usuario']?>&t=sin">
												<div class="mensagem">
													<div class="contagem_mensagem"><?=$num?></div>
													<b><?=  $usuarioSindico['nome'] ?> - <?=  $conversasSindico['tipo_usuario'] ?></b><br>
													<span class="texto-mensagem"><?= substr($conversasSindico['mensagem'], 0, 20)?></span><br>
													<span class="data-mensagem"><?=  $conversasSindico['hora'] ?> - <?=  $conversasSindico['data'] ?></span>
												</div>
											</a>
						<?php }$controle2[$i]=$conversasSindico['id_usuario'];
								$i++;
								}while ($conversasSindico = mysqli_fetch_assoc($result));
							}else{
							echo "";
							} ?>

											
										</div>



										<div class="quadro">
											<a href="adm_vagas.html#vaga">
												<div class="quadro-img"><i class="fas fa-clipboard"></i></div>
												<div class="quadro-txt"><div>Vagas</div><i class="fas fa-angle-down seta"></i></div>
											</a>
										</div>
										<div class="quadro">
											<a href="adm_sindicos.html#candidato">
												<div class="quadro-img"><i class="far fa-user"></i></div>
												<div class="quadro-txt"><div>Candidatos</div><i class="fas fa-angle-down seta"></i></div>
											</a>
										</div>
										<div class="quadro">
											<a href="adm_condominios.html#condominio">
												<div class="quadro-img"><i class="fas fa-building"></i></div>
												<div class="quadro-txt"><div>Condomínios</div><i class="fas fa-angle-down seta"></i></div>
											</a>
										</div>
										<div class="quadro" >
											<a href="adm_solicitantes.html#solicitante">
												<div class="quadro-img"><i class="fas fa-user"></i></div>
												<div class="quadro-txt"><div>Solicitante</div><i class="fas fa-angle-down seta"></i></div>
											</a>
										</div>
										<div class="quadro">
											<a href="adm_configuracoes.html">
												<div class="quadro-img"><i class="fas fa-cog"></i></div>
												<div class="quadro-txt"><div>Configurações</div></div>
											</a>
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
