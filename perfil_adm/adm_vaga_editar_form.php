<?php  
require('conexao_adm/conexao_adm.php');
$con = new ConexaoAdm();
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
	<title>Editar dados do condomínio - ADM - Qi do condomínio</title>
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
							<li><a href="adm_principal.html"><i class="fas fa-th"></i> Principal</a></li>
							<li><a href="adm_mensagens.html#mensagem"><i class="far fa-envelope"></i> Mensagens</a></li>
							<li><a href="adm_vagas.html#vaga"><i class="fas fa-clipboard"></i> Vagas</a></li>
							<li><a href="adm_sindicos.html#candidato"><i class="far fa-user"></i> Candidatos</a></li>
							<li><a href="adm_condominios.html#condominio"><i class="fas fa-building"></i> Condomínios</a></li>
							<li><a href="adm_solicitantes.html#solicitante"><i class="fas fa-user"></i> Solicitante</a></li>
							<li><a href="adm_configuracoes.html"><i class="fas fa-cog"></i> Configurações</a></li>
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
						<h2 class="caminho-ativo"><i class="fas fa-clipboard"></i> Editar vaga</h2>
					</div>
					<div class="vaga">
						<form>
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
										<input type="text" name="nivel_escolaridade" placeholder="Nível de escolaridade" required title="Nível de escolaridade para a vaga" value="<?= $vaga['nivel_escolaridade'] ?>">
										<input type="text" name="honorario_vaga" id="dinheiro" placeholder="Honorário" required title="Honorário para a vaga" value="<?= $vaga['honorario'] ?>">
  										<textarea name="descricao_vaga" placeholder="Descrição da vaga" required title="Descrição da vaga"><?= $vaga['descricao'] ?></textarea>
									</div>
									<div class="c2">
  										<textarea placeholder="Competências da vaga" name="competencias_vaga" required title="Competências da vaga"><?= $vaga['competencias'] ?></textarea>
  										<textarea placeholder="Requesitos da vaga" name="requesitos_vaga" required title="requesitos da vaga"><?= $vaga['requesitos'] ?></textarea><br><br>
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