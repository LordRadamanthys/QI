<?php  

require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();
$con->verificaLoginSoli();

$mensagens = $con->pegarMensagemSolicitante($_SESSION['UsuarioID']);

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
		function AbrirEmail() {
			var acc = document.getElementsByClassName("mensagem");
			var i;

			for (i = 0; i < acc.length; i++) {
		  		acc[i].addEventListener("click", function() {
		    		this.classList.toggle("active");
		    		var conteudo = this.nextElementSibling;
		    		if (conteudo.style.display === "block") {
		      			conteudo.style.display = "none";
		    		} else {
		      			conteudo.style.display = "block";
		    		}
		  		});
			}
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
						<a href="solicitante_perfil.php"><i class="far fa-user"></i><br>Perfil</a>
						<a href="../sair.php"><i class="fas fa-sign-out-alt"></i><br>Sair</a>
					</nav>
					<div class="img-perfil" style="background-image: url(../src/usuarios_soli/<?=$_SESSION['UsuarioID']?>/foto/perfil.jpg);"></div>
					<nav class="menu2">
						<ul>
							<li><a href="solicitante_principal.php"><i class="far fa-user"></i> Principal</a></li>
							<li><a href="solicitante_painel_vagas.php"><i class="fas fa-clipboard"></i> Minhas Vagas</a></li>
							<li><a href="solicitante_painel_condominio.php"><i class="fas fa-building"></i> Meus Condomínios</a></li>
							<li><a href="solicitante_candidaturas.php"><i class="far fa-folder"></i> Candidaturas</a></li>
							<li><a href="solicitante_mensagem.php"><i class="far fa-envelope"></i> Mensagens</a></li>
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
											<div class="caixa-emails" style="background-color: #c7c7c7">
												<div class="quadros-titulo"><span class="titulo-perfil" style="color: #009900"><h2>Caixa de entrada</h2></span></div>
												<div oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
													<div class="mensagem" onclick="AbrirEmail()">
														<div class="e-mail-contato">
															E-mail<br>
															
														</div>
													</div>
													<div class="mensagem-cont animated fade-in-dow" style="display: block;">
														<div class="email-conteudo">
															<div class="e-mails">
						<?php
						$result = $con->soli_mensagem;  
						if($mensagens > 0){   
                             do{
                             	if($mensagens['tipo_usuario']=="solicitante"){
                    	?>
								<div class="email-mensagem-contato">Eu: <?= $mensagens['mensagem'] ?><br><span class="data-mensagem"><?= $mensagens['hora'] ?> - <?= $mensagens['data'] ?></span></div>
						<?php 
							}else if($mensagens['tipo_usuario']=="admin"){ ?>
								<div class="email-mensagem-perfil">ADM: <?= $mensagens['mensagem'] ?><br><span class="data-mensagem"><?= $mensagens['hora'] ?> - <?= $mensagens['data'] ?></span></div>
						<?php }	
							}while ($mensagens = mysqli_fetch_assoc($result)); 
						}else{
							echo "<center>Nenhuma Mensagem</center>";
						}
							?>
																
															</div>
															<div class="e-mail-mesnagem">
																<form method="post" action="../paginasPHP/solicitante_mensagem.php"c style="display: inline-block; text-align: center; margin-top: -2px;" >
														<input type="hidden" name="id_usuario" value="<?=$_SESSION['UsuarioID']?>">
														<input type="hidden" name="tipo_usuario" value="solicitante">
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
	</main>
<script>
alert("Versão de testes!!!!!!!");
</script>
</body>
</html>