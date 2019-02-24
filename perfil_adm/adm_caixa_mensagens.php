<?php 
require('conexao_adm/conexao_adm.php');
$con = new ConexaoAdm(); 
$id_usuario = $_GET['idh'];
$t=$_GET['t'];
$id_mensagem = $_GET['h'];
if($t=="sol"){
	$mensagens = $con->pegarMensagemSolicitante($id_usuario);
	$usuario = $con->PegarSolicitanteOuUsuario($id_usuario,"solicitante"); 
}else if($t=="sin"){
	$mensagens = $con->pegarMensagemSindico($id_usuario);
	$usuario = $con->PegarSolicitanteOuUsuario($id_usuario,"sindico"); 
}


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
	<title>Mensagem - Solicitante - Qi do condomínio</title>
  	<script type="text/javascript">
		function Voltar() {
  			window.history.back();
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
							<li><a href="adm_principal.php"><i class="fas fa-th"></i> Principal</a></li>
							<li><a href="adm_mensagens.php#mensagem"><i class="far fa-envelope"></i> Mensagens</a></li>
							<li><a href="adm_vagas.php#vaga"><i class="fas fa-clipboard"></i> Vagas</a></li>
							<li><a href="adm_sindicos.php#candidato"><i class="far fa-user"></i> Candidatos</a></li>
							<li><a href="adm_condominios.php#condominio"><i class="fas fa-building"></i> Condomínios</a></li>
							<li><a href="adm_solicitantes.php#solicitante"><i class="fas fa-user"></i> Solicitante</a></li>
							<li><a href="adm_configuracoes.php"><i class="fas fa-cog"></i> Configurações</a></li>
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
						<h2 class="caminho-ativo"><i class="far fa-envelope"></i> Mensagens</h2>
					</div>
					<div class="linha-conteudo">
						<div class="vaga">
							<div class="vagas-opcao-cont">
								<div class="linha-conteudo">
									<div class="vaga">
										<div class="caixa-emails" style="background-color: #fff;  margin-top: 0;">
											<div>
												<div class="mensagem" style="background-color: #eaeaea">
													<b><?= $usuario['nome'] ?> - <?= $mensagens['tipo_usuario'] ?></b>
												</div>
												<div class="mensagem-cont">
													<div class="email-conteudo">
														<div class="e-mails">

						<?php
						$result = $con->soli_mensagem;  
						if($mensagens > 0){   

                             do{
                             	if($mensagens['tipo_usuario']=="sindico" || $mensagens['tipo_usuario']=="solicitante"){
                    	?>
								<div class="email-mensagem-contato"><?= $mensagens['mensagem'] ?><br><span class="data-mensagem"><?= $mensagens['hora'] ?> - <?= $mensagens['data'] ?></span></div>
						<?php 
							}else if($mensagens['tipo_usuario']=="admin"){ ?>
								<div class="email-mensagem-perfil"><?= $mensagens['mensagem'] ?><br><span class="data-mensagem"><?= $mensagens['hora'] ?> - <?= $mensagens['data'] ?></span></div>
						<?php }	
							}while ($mensagens = mysqli_fetch_assoc($result)); 
						}else{
							echo "<center>Nenhuma Mensagem</center>";
						}
							?>
														</div>
													</div>
													<div class="e-mail-mesnagem">
														<form 
															method="post" action="conexao_adm/mensagens_adm_solicitante.php"
															style="display: inline-block; text-align: center; margin-top: -2px;" >
															<input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">
															<input type="hidden" name="id_mensagem" value="<?= $id_mensagem ?>">
															<input type="hidden" name="tipo_usuario" value="admin">
															<input type="hidden" name="t" value="<?= $t ?>">
															<textarea name="mensagem" placeholder="Escreva uma mensagem"></textarea>
															<button type="submit" class="submit" style="margin-top: 10px;">Enviar</button>
														</form>
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