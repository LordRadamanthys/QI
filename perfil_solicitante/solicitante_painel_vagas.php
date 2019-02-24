<?php
require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();
$con->verificaLoginSoli();

$usu = $con->listarDadosSolicitante($_SESSION['UsuarioID']);
$vagas= $con->listarVagasCondominios($_SESSION['UsuarioID']);
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
    	function AbrirFiltro() {
  			filtro = document.getElementById('filtro');
  			if(filtro.style.display=='none'){
  				filtro.style.display='flex';
  			}
  			else{
  				filtro.style.display='none';
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
						<h2 class="caminho-ativo"><i class="fas fa-clipboard"></i> Vagas</h2>
					</div>
					<div class="pop-up-excluir" id="excluir">
						<div class="excluir-txt">
							Você tem certeza que quer excluir a vaga (Nome da vaga) do (Condomínio)?
							<form>
								<button type="submit" class="submit" style="margin-bottom: 10px">Sim</button>
								<button type="reset" class="reset" onclick="document.getElementById('excluir').style.display='none'">Não</button>
							</form>
						</div>
					</div>
					<div class="linha-conteudo">
						<div class="vaga">
							<div class="texto texto-infos-vagas">
								<div class="vagas-opcao-cont" style="background-color: #fff">
  									<a class="filtro-icone" id="filtro-btn" onclick="AbrirFiltro()" title="Filtros"><i class="fas fa-filter"></i></a> 
									<div class="filtro" id="filtro">
										<div class="caixa-drop">
											<button class="drop-btn">Tipos de Candidatos <i class="fa fa-caret-down"></i></button>
	    									<div class="drop-conteudo">
	      										<a href="#">Síndicos</a>
	      										<a href="#">Gerentes Predial</a>
	      										<a href="#">Administradores</a>
	    									</div>
	  									</div>
									</div>
									<div class="quadros-titulo"><span class="titulo-perfil"><h2>Minhas vagas</h2></span></div>
									<div class="quadros">
										<div class="quadro" >
											<a href="solicitante_vaga_form.php">
												<div class="quadro-img"><i class="fas fa-plus-circle"></i></div>
												<div class="quadro-txt" style="align-items: center; padding-bottom: 0px; height: 130px;"><div>Adicionar<hr>vaga</div></div>
											</a>
										</div>
					<?php
						$result = $con->result;  
						if($vagas > 0){   
                             do{
                             $nome_cond = $con->listarCondominiosPerfil($vagas['id_condominio']);
                    ?>
										<div class="quadro" >
											<a href="solicitante_editar_vaga.php" title="Editar vaga"><i class="fas fa-user-edit"></i></a>
											<i class="fas fa-times-circle" title="Excluir vaga" onclick="document.getElementById('excluir').style.display='flex'"></i>
											<a href="solicitante_info_vaga.php?h=<?= $vagas['id_condominio'] ?>&v=<?= $vagas['id'] ?>">
												<div class="quadro-img" style="background-image: url(../src/usuarios_cond/<?= $nome_cond['id']?>/foto/perfil.jpg);"></div>
												<div class="quadro-txt"><div><?= $vagas['posicao'] ?><hr><?= $nome_cond['nome_cond'] ?></div></div>
											</a>
										</div>
					<?php }while ($vagas = mysqli_fetch_assoc($result)); 
						}else{
							echo "";
						}
							?>
										
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