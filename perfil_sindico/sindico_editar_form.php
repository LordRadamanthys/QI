<?php 
require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();
$id = $_GET['idh'];
$usu    = $con->listarDadosSind($id);
$sindico = $usu[0];
$sindico_exp = $usu[1];
$sindico_esco = $usu[2]
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
						<a href="sindico_perfil.html"><i class="far fa-user"></i><br>Perfil</a>
						<a href=""><i class="fas fa-sign-out-alt"></i><br>Sair</a>
					</nav>
					<div class="img-perfil" style="background-image: url(imagens/roberto.jpg);"></div>
					<nav class="menu2">
						<ul>
							<li><a href="sindico_principal.html"><i class="far fa-user"></i> Principal</a></li>
							<li><a href="sindico_painel_vagas.html"><i class="fas fa-clipboard"></i> Vagas</a></li>
							<li><a href="sindico_painel_seguindo.html"><i class="far fa-building"></i> Seguindo</a></li>
							<li><a href="sindico_painel_condominio.html"><i class="fas fa-building"></i> Condomínios</a></li>
							<li><a href="sindico_candidaturas.html"><i class="far fa-folder"></i> Minhas Candidaturas</a></li>
							<li><a href="sindico_mensagem.html"><i class="far fa-envelope"></i> Mensagens</a></li>
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
						<h2 class="caminho-ativo"><i class="fas fa-user-edit"></i> Editar meus dados - Síndico</h2>
					</div>
					<div class="vaga">
						<form action="../paginasPHP/editarSindico.php" method="post" enctype="multipart/form-data">
							<fieldset>
								<legend>Dados pessoais <span style="color: red">*</span></legend>
								<div class="linha-conteudo">
									<div class="c2">
										<input type="text" name="nome" placeholder="Nome" required title="Seu nome" value="<?= $sindico['nome'] ?>">
										<input type="text" name="cpf" id="cpf" placeholder="CPF"  required title="Seu CPF"  value="<?= $sindico['cpf'] ?>">
										<input type="text" name="tel_fix" id="tel" placeholder="Telefone / Fixo" title="Seu telefone / fixo" style="width: 30%"  value="<?= $sindico['telefone'] ?>"><br>
										<label class="label-tit">Data de aniversário:</label>&nbsp;&nbsp;<input type="date" name="data_aniv" required title="Sua data de aniversário"  value="<?= $sindico['data_aniversario'] ?>"><br>
										<label class="text-super label_tit">Gênero:</label>&nbsp;&nbsp;
										<?php if($sindico['sexo']=="masculino"){ ?>
										<input type="radio" name="genero" value="masculino" checked required title="Seu gênero: masculino"> <label class="text-super opcao">Masculino</label>&nbsp;&nbsp;
	  									<input type="radio" name="genero" value="feminino" title="Seu gênero: feminino"> <label class="text-super opcao">Feminino</label>
	  								<?php }else{ ?>
	  									<input type="radio" name="genero" value="masculino"  required title="Seu gênero: masculino"> <label class="text-super opcao">Masculino</label>&nbsp;&nbsp;
	  									<input type="radio" name="genero" value="feminino" checked title="Seu gênero: feminino"> <label class="text-super opcao">Feminino</label>
	  								<?php } ?>
									</div>
									<div class="c2">
	  									<textarea placeholder="Apresentação" name="apresentacao" required title="Uma breve apresentação sua"><?= $sindico['apresentacao'] ?></textarea>
	  									<input type="text" placeholder="Idioma (as)" name="idiomas" title="Idiomas que você fala" value="<?= $sindico['idiomas'] ?>">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Apresentação do Candidato</legend>
								<div class="linha-conteudo">
									<div class="c2">
										<input type="text" name="link_video" placeholder="Link do vídeo" required title="O link do seu vídeo (Youtube, Vimeo, etc)" value="<?= $sindico['link_video'] ?>">
										<label class="input-file index_btn"><i class="fas fa-upload"></i>&nbsp;&nbsp;Upload do seu currículo
	    									<input type="file" name="curriculo" placeholder="Envie o seu currículo" required title="Envie o seu currículo" accept="application/pdf">
	    								</label><label class="label-tit"> Perferência <span style="color: red">PDF *</span></label>	
									</div>
									<div class="c2">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Dados de localização <span style="color: red">*</span></legend>
								<div class="linha-conteudo">
									<div class="c2">
										<input type="text" name="cep" id="cep" placeholder="CEP" required title="Seu CEP" value="<?= $sindico['cep'] ?>">
										<select name="pais" required title="Seu país">
											<option value="">País</option>
											<option value="br">Brasil</option>
										</select>
										<select name="estado" required title="Seu estado">
											<option value="">Estado</option>
											<option value="mg">Minas Gerais</option>
											<option value="pr">Paraná</option>
											<option value="rj">Rio de Janeiro</option>
											<option value="sp">São Paulo</option>
										</select>
										<input type="text" name="cidade" placeholder="Cidade" required title="Sua cidade" value="<?= $sindico['cidade'] ?>">
										<input type="text" name="endereco" placeholder="Endereço" required title="Seu endereço" value="<?= $sindico['endereco'] ?>">
										<input type="text" name="complemento" placeholder="Complemento" title="Seu complemento (se tiver)" value="<?= $sindico['complemento'] ?>">
										<input type="text" name="numero" placeholder="Número" required title="O número da sua residência" style="width: 16%" value="<?= $sindico['numero_casa'] ?>">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Escolaridade / Cursos</legend>
								<div class="linha-conteudo">
									<div class="c2">
										<input type="text" name="nome_curso" placeholder="Nome do curso" title="Nome do curso" value="<?= $sindico_esco['nome_curso'] ?>">
										<input type="text" name="nome_instituicao" placeholder="Nome da Instituição" title="Nome da intituição (publica ou particular)" value="<?= $sindico_esco['instituicao'] ?>">
										<input type="hidden" name="id_usuario" value="<?= $sindico['id'] ?>">
										<input type="text" name="pais_instituicao" placeholder="País onde cursou" title="País onde cursou" value="<?= $sindico_esco['pais'] ?>">
										<select name="tipo_curso" title="Tipo do curso">
											<option value="">Tipo de curso</option>
											<option value="pressencial">Pressencial</option>
											<option value="semi_pressencial">Semi-pressencial</option>
											<option value="distância">A distância</option>
										</select><br>
										<label class="label-tit">Início do curso:</label>&nbsp;&nbsp;<input type="date" name="inicio_curso"  title="Início do curso" value="<?= $sindico_esco['inicio'] ?>"><br>
										<label class="label-tit">Conclusão do curso:</label>&nbsp;&nbsp;<input type="date" name="conclusao_curso"  title="Conclusão do curso" value="<?= $sindico_esco['fim'] ?>"><br>
										<label class="text-super label-tit">Situação:</label>&nbsp;&nbsp;
										<?php if($sindico_esco['nome_curso'] =="interrompido"){?>
										<input type="radio" name="situacao_curso" value="interrompido" checked title="Sua situação referênte ao curso: interrompido"> <label class="text-super opcao">Interrompido</label>&nbsp;&nbsp;
	  									<input type="radio" name="situacao_curso" value="cursando" title="Sua situação referênte ao curso: cursando"> <label class="text-super opcao">Cursando</label>&nbsp;&nbsp;
	  									<input type="radio" name="situacao_curso" value="concluido" title="Sua situação referênte ao curso: concluído"> <label class="text-super opcao">Concluído</label><br>
	  								<?php }else if($sindico_esco['nome_curso'] =="cursando"){ ?>
	  									<input type="radio" name="situacao_curso" value="interrompido"  title="Sua situação referênte ao curso: interrompido"> <label class="text-super opcao">Interrompido</label>&nbsp;&nbsp;
	  									<input type="radio" name="situacao_curso" value="cursando" checked title="Sua situação referênte ao curso: cursando"> <label class="text-super opcao">Cursando</label>&nbsp;&nbsp;
	  									<input type="radio" name="situacao_curso" value="concluido" title="Sua situação referênte ao curso: concluído"> <label class="text-super opcao">Concluído</label><br>
	  								<?php }else{ ?>
	  									<input type="radio" name="situacao_curso" value="interrompido"  title="Sua situação referênte ao curso: interrompido"> <label class="text-super opcao">Interrompido</label>&nbsp;&nbsp;
	  									<input type="radio" name="situacao_curso" value="cursando"  title="Sua situação referênte ao curso: cursando"> <label class="text-super opcao">Cursando</label>&nbsp;&nbsp;
	  									<input type="radio" name="situacao_curso" value="concluido" checked title="Sua situação referênte ao curso: concluído"> <label class="text-super opcao">Concluído</label><br>
	  								<?php } ?>
									</div>
									<div class="c2">
										<a href="" title="Adicionar mais uma escolaridade / curso">
											<div class="index_btn btn-add">
												<i class="fas fa-plus-circle"></i> Adicionar
											</div>
										</a>
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Experiência profissional</legend>
								<div class="linha-conteudo">
									<div class="c2">
										<input type="text" name="nome_empresa" placeholder="Nome da empresa" title="Nome da empresa" value="<?= $sindico_exp['nome_empresa'] ?>">
										<input type="text" name="cargo" placeholder="Cargo" title="Nome do cargo" value="<?= $sindico_exp['cargo'] ?>"><br>
										<label class="label-tit">Período início:</label>&nbsp;&nbsp;<input type="date" name="inicio_empresa" title="Data de ínicio na empresa" value="<?= $sindico_exp['inicio'] ?>"><br>
										<label class="label-tit">Período fim:</label>&nbsp;&nbsp;<input type="date" name="fim_empresa" title="Data de término na empresa (Se ainda estiver trabalhando, deixe vazio)" value="<?= $sindico_exp['fim'] ?>"><br>
										<label class="text-super">Situação:</label>&nbsp;&nbsp;
										<?php if($sindico_exp['situacao']=="trabalhando"){ ?>
										<input type="checkbox" name="situacao" checked="" value="trabalhando" title="Sua situação na empresa, assinale apenas se ainda estiver trabalhando nela"> <label class="text-super opcao" style="vertical-align:60%;">Trabalhando</label>
									<?php }else{ ?>
										<input type="checkbox" name="situacao" value="trabalhando" title="Sua situação na empresa, assinale apenas se ainda estiver trabalhando nela"> <label class="text-super opcao" style="vertical-align:60%;">Trabalhando</label>
									<?php } ?>
									</div>
									<div class="c2">
										<a href="" title="Adicionar mais uma experiência profissional">
											<div class="index_btn btn-add">
												<i class="fas fa-plus-circle"></i> Adicionar
											</div>
										</a>
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Imagem de perfil</legend>
								<div class="linha-conteudo">
									<div class="c2">
										<label class="input-file index_btn btn-img"><i class="fas fa-image"></i> Selecione uma imagem de perfil
											<input type="file" name="Img-perfil"  accept="image/jpeg">
	    								</label><label class="label-tit"> Perferência <span style="color: red">JPG *</span></label>	
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