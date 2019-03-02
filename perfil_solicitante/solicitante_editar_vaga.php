<?php
require('../php/conexao.php');
$con = new Banco();
$con->verificaLoginSoli();
$id = $_GET['idh'];
$vaga  = $con->PegarVaga($id);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
	<script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
	<script type="text/javascript" src="js/jquery.maskMoney.min.js"></script>

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
			$("#dinheiro").maskMoney({symbol:'R$: ', thousands:'.', decimal:',', symbolStay: true});
			$("#dataNascimento").mask("99/99/9999");
    	});
		function Voltar() {
  			window.history.back();
		}
    </script>
<!--       		$("#cep").mask("99999-999");
//       		$("#money").mask("9,99");
// $('#rg').mask('99.999.999-9');
// $('#placaCarro').mask('AAA-9999');
// $('#horasMinutos').mask('99:99');
// 
// $('#estado').mask('AA');
// $('#cartaoCredito').mask('9999 9999 9999 9999');
     	// });
    </script> -->
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
					<div class="img-perfil" style="background-image: url(imagens/pessoa.jpg);"></div>
					<nav class="menu2">
						<ul>
							<li><a href="solicitante_principal.html"><i class="far fa-user"></i> Principal</a></li>
							<li><a href="solicitante_painel_vagas.html"><i class="fas fa-clipboard"></i> Minhas Vagas</a></li>
							<li><a href="solicitante_painel_condominio.html"><i class="fas fa-building"></i> Meus Condomínios</a></li>
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
						<h2 class="caminho-ativo"><i class="fas fa-clipboard"></i> Editar vaga</h2>
					</div>
					<div class="vaga">
						<form method="post" action="../paginasPHP/editarVaga.php">
							<fieldset>
								<legend>Dados do solicitante <span style="color: red">*</span></legend>
								<div class="linha-conteudo">
									<div class="c2">
										
										<select name="posicao_vaga" required title="Posição da vaga">
											<option value="">Posição</option>
											<option value="sindico">Síndico (a)</option>
											<option value="gerente">Gerente predial</option>
											<option value="aadministrador">Administrador (a)</option>
										</select><br>
										<label class="label-tit">Perído de trabalho (em horas):</label>&nbsp;&nbsp;<input type="time" min="00:00" max="24:00" name="periodo_vaga" required title="Período de trabalho" value="<?= $vaga['horas_trabalho'] ?>">
										<input type="text" name="nivel_escolaridade_vaga" placeholder="Nível de escolaridade" required title="Nível de escolaridade para a vaga" value="<?= $vaga['nivel_escolaridade'] ?>">
										<input type="text" name="honorario_vaga" id="dinheiro" placeholder="Honorário" required title="Honorário para a vaga" value="<?= $vaga['honorario'] ?>">
  										<textarea name="descricao_vaga" placeholder="Descrição da vaga" required title="Descrição da vaga"><?= $vaga['descricao'] ?></textarea>
  										<input type="hidden" name="id_vaga" value="<?= $id ?>">
									</div>
									<div class="c2">
  										<textarea placeholder="Competências da vaga" name="competencias_vaga" required title="Competências da vaga"><?= $vaga['competencias'] ?></textarea>
  										<textarea placeholder="Requesitos da vaga" name="requesitos_vaga" required title="requesitos da vaga"><?= $vaga['requisitos'] ?></textarea><br><br>
										<button type="submit" class="submit">Adicionar vaga</button>
										<button type="reset" class="reset">Cancelar</button>
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