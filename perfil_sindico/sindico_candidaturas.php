<?php
require('../php/conexao.php');
$con = new Banco();
$con->verificaLoginCandidato();

$usu = $con->listarDadosSind($_SESSION['UsuarioID']);
$MinhasVagas = $con->MinhasVagas($_SESSION['UsuarioID']);
$seguindo = $con->pegaSeguindo($_SESSION['UsuarioID']);
$condominios = $con->listarTodosCondominios();

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
						<a href="sindico_perfil.php"><i class="far fa-user"></i><br>Perfil</a>
						<a href="../sair.php"><i class="fas fa-sign-out-alt"></i><br>Sair</a>
					</nav>
					<div class="img-perfil" style="background-image: url(../src/usuarios_sind/<?= $_SESSION['UsuarioID'] ?>/foto/1.jpg);"></div>
					<nav class="menu2">
						<ul>
							<li><a href="sindico_principal.php"><i class="far fa-user"></i> Principal</a></li>
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
						<h2 class="caminho-ativo"><i class="fas fa-clipboard"></i> Candidaturas</h2>
					</div>
					<div class="linha-conteudo">
						<div class="vagas-opcao principal">
							<div class="vagas-opcao-cont" style="background-color: #fff">
  								<a class="filtro-icone" id="filtro-btn" onclick="AbrirFiltro()" title="Filtros"><i class="fas fa-filter"></i></a> 
								<div class="filtro" id="filtro">
									<div class="caixa-drop">
										<button class="drop-btn">Vagas para <i class="fa fa-caret-down"></i></button>
    									<div class="drop-conteudo">
      										<a href="#">Síndicos</a>
      										<a href="#">Gerentes Predial</a>
      										<a href="#">Administradores</a>
    									</div>
  									</div> 
									<div class="caixa-drop">
										<button class="drop-btn">Localidade <i class="fa fa-caret-down"></i></button>
    									<div class="drop-conteudo">
      										<a href="#">São Paulo - Capital</a>
      										<a href="#">São Paulo - Litoral</a>
      										<a href="#">São Paulo - Interior</a>
    									</div>
  									</div>
								</div>
								<div class="quadros-titulo"><span class="titulo-perfil"><h2>Minhas Candidaturas</h2></span></div>
								<div class="quadros">
						<?php
						$result = $con->result2;  
						if($MinhasVagas > 0){   
                             do{
                             $aux = $con->listarMinhasVagas($MinhasVagas['id_vaga']);
                             $nome_cond = $con->listarCondominiosPerfil($MinhasVagas['id_condominio']);
                    	?>
									<div class="quadro" >
										<a href="sindico_info_vaga.php?h=<?= $MinhasVagas['id_condominio'] ?>&v=<?= $MinhasVagas['id_vaga'] ?>">
											<div class="quadro-img" style="background-image: url(../src/usuarios_cond/<?=$nome_cond['id']?>/foto/perfil.jpg);"></div>
											<div class="quadro-txt"><div><?=$aux['posicao'] ?><hr><?=$nome_cond['nome_cond'] ?></div></div>
										</a>
									</div>
						<?php }while ($MinhasVagas = mysqli_fetch_assoc($result)); 
						}else{
							echo "<center>Nenhuma vaga disponivel</center>";
						}$todasVagas = $con->listarTodasVagas();
							?>
								</div>
							</div>
						</div>
						<div class="outros-conteudos">
							<div class="tabelas-painel">
								<div class="txt-center"><span class="titulo-perfil titulo-table">Últimas vagas</span></div>
								<div class="table">
						<?php
						$result = $con->result;  
						$todasVagas = $con->listarTodasVagas();
						if($todasVagas > 0){   
                             do{
                             
                             $nome_cond = $con->listarCondominiosPerfil($todasVagas['id_condominio']);
                    	?>
									<a href="sindico_info_vaga.php?h=<?= $nome_cond['id'] ?>&v=<?= $todasVagas['id'] ?>">
										<div class="table-img" style="background-image: url(../src/usuarios_cond/<?=$nome_cond['id']?>/foto/perfil.jpg);"></div>
										<div class="table-txt"><div><?=$todasVagas['posicao']?><hr><?=$nome_cond['nome_cond']?></div></div>
									</a>
						<?php }while ($todasVagas = mysqli_fetch_assoc($result)); 
						}else{
							echo "<center>Nenhuma vaga disponivel</center>";
						}
							?>
								</div>
								<div class="txt-center"><span class="titulo-perfil titulo-table">Condomínios</span></div>
								<div class="table">
						<?php
						$result = $con->resultcondominio;  
						if($condominios > 0){   
                             do{
                    	?>
									<a href="sindico_info_condominio.php?h=<?= $condominios['id'] ?>">
										<div class="table-img" style="background-image: url(../src/usuarios_cond/<?=$condominios['id']?>/foto/perfil.jpg);"></div>
										<div class="table-txt"><div><?= $condominios['nome_cond'] ?></div></div>
									</a>

						<?php }while ($condominios = mysqli_fetch_assoc($result)); 
						}else{
							echo "<center>Nenhuma condominio disponivel</center>";
						}
					?>
									
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