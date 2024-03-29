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
   		$(document).ready(function(){
      		$("#cel").mask("99999-9999");
      		$("#ddd").mask("(99)");
      		$("#tel").mask("9999-9999");
      		$("#ddd-tel").mask("(99)");
      		$("#cnpj").mask("99.999.999/9999-99");
      		$("#cpf").mask("999.999.999-99");
      		$("#cep").mask("99999-999");
    	});
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
						<a href="solicitante_perfil.html"><i class="far fa-user"></i><br>Perfil</a>
						<a href=""><i class="fas fa-sign-out-alt"></i><br>Sair</a>
					</nav>
					<div class="img-perfil" style="background-image: url(../src/usuarios_soli/<?=$dados_solicitante['id']?>/foto/perfil.jpg);"></div>
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
						<h2 class="caminho-ativo"><i class="fas fa-user-edit"></i> Editar meus dados - Solicitante</h2>
					</div>
						<div class="vaga">
							<form action="../paginasPHP/editarSolicitante.php" method="post" >
								<input type="hidden" name="id" value="<?= $dados_solicitante['id'] ?>">
							<fieldset>
								<legend>Dados de login <span style="color: red">*</span></legend>
								<div class="linha-conteudo">
									<div class="c2">
										<input type="email" name="e_mail_cond" placeholder="E-mail"  title="Seu e-mail" disabled value="<?= $dados_solicitante['email'] ?>">
										<input type="text" name="tel_cel_cond" id="cel" placeholder="Telefone / Whatsapp" required value="<?= $dados_solicitante['celular'] ?>" title="Seu telefone / whatsapp" style="width: 30%" >

									</div>
									<div class="c2">
										<input type="password" name="senha_cond" placeholder="Senha" required title="Sua senha">
										<input type="password" name="confirm_senha_cond" placeholder="Confirmar senha" required title="Confirme a sua senha">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Dados do solicitante <span style="color: red">*</span></legend>
								<div class="linha-conteudo">
									<div class="c2">
										<input type="text" name="nome_soli" placeholder="Nome do solicitante" required title="Seu nome" value="<?= $dados_solicitante['nome'] ?>">
										<input type="text" name="cpf_soli" id="cpf" placeholder="CPF do solicitante"  required title="Seu CPF" value="<?= $dados_solicitante['cpf'] ?>">
										<input type="text" name="funcao_soli" placeholder="No condomínio, o solicitante é" required title="Seu cargo/função no condomínio" value="<?= $dados_solicitante['funcao'] ?>">
										<input type="text" name="tel_fix_soli" id="tel" placeholder="Telefone / Fixo" title="Seu telefone / fixo" style="width: 30%" value="<?= $dados_solicitante['tel_fix'] ?>"><br>
										<label class="label-tit">Data de aniversário:</label>&nbsp;&nbsp;<input type="date" name="data_aniv_soli" required title="Sua data de aniversário" value="<?= $dados_solicitante['data_aniversario'] ?>"><br>
										<label class="text-super label_tit">Gênero:</label>&nbsp;&nbsp;
										<?php if($dados_solicitante['sexo']=="masculino"){ ?>
										<input type="radio" name="genero_soli" value="masculino" checked required title="Seu gênero: masculino"> <label class="text-super opcao">Masculino</label>&nbsp;&nbsp;
	  									<input type="radio" name="genero_soli" value="feminino" title="Seu gênero: feminino"> <label class="text-super opcao">Feminino</label><br>
	  								<?php }else{ ?>
	  									<input type="radio" name="genero_soli" value="masculino"  required title="Seu gênero: masculino"> <label class="text-super opcao">Masculino</label>&nbsp;&nbsp;
	  									<input type="radio" name="genero_soli"  checked value="feminino" title="Seu gênero: feminino"> <label class="text-super opcao">Feminino</label><br>
	  								<?php } ?>
									</div>
									<div class="c2">
									</div>
								</div>
							</fieldset>
								<fieldset>
									<legend>Dados de localização <span style="color: red">*</span></legend>
									<div class="linha-conteudo">
										<div class="c2">
											<input type="text" name="cep_soli" id="cep" placeholder="CEP" required title="Seu CEP" value="<?= $dados_solicitante['cep'] ?>">
											<select name="pais_soli" required title="Seu país">
												<option value="">País</option>
												<option value="br">Brasil</option>
											</select>
											<select name="estado_soli" required title="Seu estado">
												<option value="">Estado</option>
												<option value="mg">Minas Gerais</option>
												<option value="pr">Paraná</option>
												<option value="rj">Rio de Janeiro</option>
												<option value="sp">São Paulo</option>
											</select>
											<input type="text" name="cidade_soli" placeholder="Cidade" required title="Sua cidade" value="<?= $dados_solicitante['cidade'] ?>">
											<input type="text" name="endereco_soli" placeholder="Endereço" required title="Seu endereço" value="<?= $dados_solicitante['endereco'] ?>">
											<input type="text" name="complemento_soli" placeholder="Complemento" title="Seu complemento (se tiver)" value="<?= $dados_solicitante['complemento'] ?>">
											<input type="text" name="numero_soli" placeholder="Número" required title="O número da sua residência" style="width: 16%" value="<?= $dados_solicitante['numero'] ?>">
										</div>
										<div class="c2">
										</div>
									</div>
								</fieldset>
							<fieldset>
								<legend>Imagem de perfil</legend>
								<div class="linha-conteudo">
									<div class="c2">
																	
									</div>
									<div class="c2">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<div class="linha-conteudo">
									<div class="c2">
										<button type="submit" class="submit">Salvar perfil</button>
										<button type="reset" class="reset">Cancelar</button>
									</div>
									<div class="c2">
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>