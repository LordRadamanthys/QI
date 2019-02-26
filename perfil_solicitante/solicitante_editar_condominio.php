<?php
require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();
$con->verificaLoginSoli();
$id_condominio = $_GET['idc'];
$usu = $con->listarDadosSolicitante($_SESSION['UsuarioID']);
$dados_solicitante = $usu[0];
$dados_condominio = $con->listarCondominiosPerfil($id_condominio);

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
						<a href="solicitante_perfil.php"><i class="far fa-user"></i><br>Perfil</a>
						<a href="../sair.php"><i class="fas fa-sign-out-alt"></i><br>Sair</a>
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
						<h2 class="caminho-ativo"><i class="fas fa-building"></i> Editar condomínio</h2>
					</div>
					<div class="vaga">
						<form method="POST" enctype="multipart/form-data" action="../paginasPHP/cadastroCondominio.php">
							<fieldset>
								<input type="hidden" name="editar" value="editar">
								<input type="hidden" name="id_cond" value="<?=  $id_condominio ?>">
								<legend>Dados do condomínio <span style="color: red">*</span></legend>
								<div class="linha-conteudo">
									<div class="c2">
										<input type="text" name="nome_cond" placeholder="Nome do condomínio" required title="Seu nome" value="<?= $dados_condominio['nome_cond'] ?>">
										<input type="text" name="cnpj_cond" id="cnpj" placeholder="CNPJ"  required title="Seu CNPJ" value="<?= $dados_condominio['cnpj_cond'] ?>">
										<input type="text" name="tel_fix_cond" id="tel" placeholder="Telefone / Fixo" title="Seu telefone / fixo" style="width: 30%" value="<?= $dados_condominio['tel_fix_cond'] ?>"><br>
										<label class="text-super label-tit">Tipo:</label>&nbsp;&nbsp;

										<?php if( $dados_condominio['tipo_cond']=="comercial"){ ?>
										<input type="radio" name="tipo_cond" value="comercial" checked required title="Tipo do condomínio: comercial"> <label class="text-super opcao">Comercial</label>&nbsp;&nbsp;
	  									<input type="radio" name="tipo_cond" value="residencial" title="Tipo do condomínio: residêncial"> <label class="text-super opcao">Residêncial</label>&nbsp;&nbsp;
	  									<input type="radio" name="tipo_cond" value="misto" title="Tipo do condomínio: misto"> <label class="text-super opcao">Misto</label><br>
	  								<?php }else if($dados_condominio['nome_cond']=="residencial") { ?>
	  									<input type="radio" name="tipo_cond" value="comercial"  required title="Tipo do condomínio: comercial"> <label class="text-super opcao">Comercial</label>&nbsp;&nbsp;
	  									<input type="radio" name="tipo_cond" value="residencial" checked title="Tipo do condomínio: residêncial"> <label class="text-super opcao">Residêncial</label>&nbsp;&nbsp;
	  									<input type="radio" name="tipo_cond" value="misto" title="Tipo do condomínio: misto"> <label class="text-super opcao">Misto</label><br>
	  								<?php }else{ ?>
	  									<input type="radio" name="tipo_cond" value="comercial"  required title="Tipo do condomínio: comercial"> <label class="text-super opcao">Comercial</label>&nbsp;&nbsp;
	  									<input type="radio" name="tipo_cond" value="residencial"  title="Tipo do condomínio: residêncial"> <label class="text-super opcao">Residêncial</label>&nbsp;&nbsp;
	  									<input type="radio" name="tipo_cond" value="misto" checked title="Tipo do condomínio: misto"> <label class="text-super opcao">Misto</label><br>
	  								<?php } ?>
										<input type="number" name="unidades_cond" placeholder="Quantidade de unidades" required title="Quantidades de unidades no condomínio" style="width: 60%" value="<?= $dados_condominio['unidades_cond'] ?>"><br>
										<input type="number" name="idade_cond" placeholder="Idade do empreendimento" required title="Idade do empreendimento" style="width: 60%" value="<?= $dados_condominio['idade_cond'] ?>">
									</div>
									<div class="c2">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Dados de localização <span style="color: red">*</span></legend>
								<div class="linha-conteudo">
									<div class="c2">
										<input type="text" name="cep_cond" id="cep" placeholder="CEP" required title="Seu CEP" value="<?= $dados_condominio['cep_cond'] ?>">
										<select name="pais_cond" required title="Seu país">
											<option value="">País</option>
											<option value="br">Brasil</option>
										</select>
										<select name="estado_cond" required title="Seu estado">
											<option value="">Estado</option>
											<option value="mg">Minas Gerais</option>
											<option value="pr">Paraná</option>
											<option value="rj">Rio de Janeiro</option>
											<option value="sp">São Paulo</option>
										</select>
										<input type="text" name="cidade_cond" placeholder="Cidade" required title="Sua cidade" value="<?= $dados_condominio['cidade_cond'] ?>">
										<input type="text" name="endereco_cond" placeholder="Endereço" required title="Seu endereço" value="<?= $dados_condominio['endereco_cond'] ?>">
										<input type="text" name="complemento_cond" placeholder="Complemento" title="Seu complemento (se tiver)" value="<?= $dados_condominio['complemento_cond'] ?>">
										<input type="text" name="numero_cond" placeholder="Número" required title="O número da sua residência" style="width: 16%" value="<?= $dados_condominio['numero_cond'] ?>">
									</div>
									<div class="c2">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Imagem do condomínio</legend>
								<div class="linha-conteudo">
									<div class="c2">
										<label class="input-file index_btn btn-img"><i class="fas fa-image"></i> Selecione uma imagem do condomínio
											<input type="file" name="Img_cond"  accept="image/png, image/jpeg">
	    								</label>									
									</div>
									<div class="c2">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<div class="linha-conteudo">
									<div class="c2">
										<button type="submit" class="submit">Salvar condomínio</button>
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