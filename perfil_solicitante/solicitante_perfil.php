<?php
require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();
$con->verificaLoginSoli();
$usu = $con->listarDadosSolicitante($_SESSION['UsuarioID']);
$dados_solicitante = $usu[0];
$dados_cod = $usu[1];
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
    	function AbrirContVaga() {
  			contvaga = document.getElementById('vagas');
  			if(contvaga.style.display=='none'){
  				contvaga.style.display='block';
  			}
  			else{
  				contvaga.style.display='none';
  			}
		}
    	function AbrirContCond() {
  			contcond = document.getElementById('condominio');
  			if(contcond.style.display=='none'){
  				contcond.style.display='block';
  			}
  			else{
  				contcond.style.display='none';
  			}
		}
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
					<nav class="menu1">
						<a href=""><i class="fas fa-sliders-h"></i><br>Conta</a>
						<a href="solicitante_perfil.php"><i class="far fa-user"></i><br>Perfil</a>
						<a href="../sair.php"><i class="fas fa-sign-out-alt"></i><br>Sair</a>
					</nav>
					<div class="img-perfil" style="background-image: url(../src/usuarios_soli/<?=$dados_solicitante['id']?>/foto/perfil.jpg);"></div>
					<nav class="menu2">
						<ul>
							<li><a href="solicitante_principal.html"><i class="far fa-user"></i> Principal</a></li>
							<li><a href="solicitante_painel_vagas.php"><i class="fas fa-clipboard"></i> Minhas Vagas</a></li>
							<li><a href="solicitante_painel_condominio.php"><i class="fas fa-building"></i> Meus Condomínios</a></li>
							<li><a href="solicitante_candidaturas.html"><i class="far fa-folder"></i> Candidaturas</a></li>
							<li><a href="solicitante_mensagem.html"><i class="far fa-envelope"></i> Mensagens</a></li>
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
						<h2 class="caminho-ativo"><i class="fas fa-user"></i> Perfil Solicitante</h2>
					</div>
					<div class="linha-conteudo">
						<div class="vaga">
							<div class="vagas-opcao-cont">
								<div class="texto texto-infos-vagas">
									<div class="banner-perfil">
										<div class="linha">
											<div class="img-perfil-conteudo" style="background-image: url(../src/usuarios_soli/<?=$dados_solicitante['id']?>/foto/perfil.jpg);"></div>
											<div class="nome-perfil">
												<h2><?= $dados_solicitante['nome'] ?></h2>
												<hr>
												<h3><?= $dados_solicitante['funcao'] ?></h3>
											</div>
										</div>
									</div>
									<div class="sobre-perfil">
										<div class="texto-sobre-perfil">
											<div class="texto">
												<div class="linha-conteudo">
													<div class="quadro-sobre quadro-experiencia">
														<div class="titulo-quadro">
															Dados Solicitante
															<a href="solicitante_editar_form.html" title="Editar dados">
																<i class="fas fa-user-edit"></i>
															</a>
														</div>
														<div class="text-quadro">
															<span class="info-titulo">Perfil público:</span> ID<br>
															<span class="info-titulo">Nome do solicitante:</span> <?= $dados_solicitante['nome'] ?><br>
															<span class="info-titulo">Data de aniversário:</span> <?= $dados_solicitante['data_aniversario'] ?><br>
															<span class="info-titulo">Gênero:</span> <?= $dados_solicitante['sexo'] ?><br>
																										
														</div>
													</div>
													<div class="quadro-sobre quadro-experiencia">
														<div class="titulo-quadro" onclick="AbrirContCond()">
															Condomínios
															<a href="solicitante_condominio_form.html" title="Adicionar um condomínio">
																<i class="fas fa-plus-circle"></i>
															</a>
															<a href="solicitante_painel_condominio.html" title="Editar condomínio">
																<i class="fas fa-user-edit"></i>
															</a>
														</div>
														<div class="text-quadro animated fade-in-down" id="condominio">
					<?php
						$result = $con->result; 
						if($dados_cod > 0){    
                             do{
                         ?>
															<span class="info-titulo">Nome do condomínio:</span>  <?= $dados_cod['nome_cond'] ?><br>
															<span class="info-titulo">Tipo:</span>  <?= $dados_cod['tipo_cond'] ?><br>
															<span class="info-titulo">Quantidade de unidades:</span>  <?= $dados_cod['unidades_cond'] ?><br>
															<span class="info-titulo">Idade do empreendimento:</span>  <?= $dados_cod['idade_cond'] ?><br>
															<hr>
					<?php }while ($dados_cod = mysqli_fetch_assoc($result)); 
					   }else{
						   echo "Nenhum condominio cadastrado";
					   }?>		
														</div>
													</div>
													<div class="quadro-sobre quadro-experiencia">
														<div class="titulo-quadro" onclick="AbrirContVaga()">
															Vagas 
															<a href="solicitante_vaga_form.html" title="Adicionar uma vaga">
																<i class="fas fa-plus-circle"></i>
															</a>
															<a href="solicitante_painel_vagas.html" title="Editar vagas">
																<i class="fas fa-user-edit"></i>
															</a>
														</div>
														<div class="text-quadro animated fade-in-down" id="vagas">
					<?php
						$dados_vaga = $con->listarVagasCondominios($_SESSION['UsuarioID']);
						$result = $con->result;   
						if($dados_vaga > 0){  
                             do{
                         ?>	
													<span class="info-titulo">Posição:</span> <?= $dados_vaga['posicao']  ?><br>
													<span class="info-titulo">Período de trabalho:</span> <?= $dados_vaga['horas_trabalho']  ?><br>
													<span class="info-titulo">Nível de Escolaridade:</span> <?= $dados_vaga['nivel_escolaridade']  ?><br>
													<span class="info-titulo">Honorário:</span><?= $dados_vaga['honorario']  ?><br>
													<span class="info-titulo">Localidade:</span> Localização<br>
													<span class="info-titulo">Descrição da vaga:</span> <?= $dados_vaga['descricao']  ?><br>
													<span class="info-titulo">Competências:</span> <?= $dados_vaga['competencias']  ?><br>
													<span class="info-titulo">Requesitos:</span> <?= $dados_vaga['requisitos']  ?><br>
													<hr>
					<?php }while ($dados_vaga = mysqli_fetch_assoc($result));
						}else{
							echo "Nenhuma vaga cadastrada";
						} ?>										
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