<?php  
require('conexao_adm/conexao_adm.php');
$con = new ConexaoAdm();
$id = $_GET['idh'];
$usu  = $con->listarDadosSind($id);
$dados_usuario = $usu[0];
$dados_usuario_exp = $usu[1];
$dados_usuario_esco = $usu[2];

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
	<title>Editar perfil do síndico - ADM - Qi do condomínio</title>
  	<script type="text/javascript">
   		$(document).ready(function(){
      		$("#cel").mask("99999-9999");
      		$("#ddd").mask("(99)");
      		$("#tel").mask("9999-9999");
      		$("#ddd-tel").mask("(99)");
      		$("#cnpj").mask("99.999.999/9999-99");
      		$("#cpf").mask("999.999.999-99");
      		$("#cep").mask("99999-999");
      		$(".data").mask("99/99/9999");
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
						<h2 class="caminho-ativo"><i class="fas fa-user-edit"></i> Editar dados - Síndico <?= $dados_usuario['nome'] ?></h2>
					</div>
					<div class="vaga">
						<form action="conexao_adm/editar_adm_sindico.php" method="post" enctype="multpart/form-data">
							<fieldset>
								<legend>Dados de login <span style="color: red">*</span></legend>
								<div class="linha-conteudo">
									<div class="c2">
										<input type="email" name="email" value="<?= $dados_usuario['email'] ?>" placeholder="E-mail" required title="Seu e-mail">
										<input type="hidden" name="id" value="<?= $id ?>">
										<input type="text" name="tel-cel" id="cel" value="<?= $dados_usuario['telefone'] ?>" placeholder="Telefone / Whatsapp" required title="Seu telefone / whatsapp" style="width: 30%">
										<input type="hidden" name="nivel" value="<?= $dados_usuario['nivel'] ?>">

									</div>
									<div class="c2">
										<input type="password" name="senha" placeholder="Senha" required title="Sua senha">
										<input type="password" name="confirm_senha_candidato" placeholder="Confirmar senha" required title="Confirme a sua senha">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Dados pessoais <span style="color: red">*</span></legend>
								<div class="linha-conteudo">
									<div class="c2">
										<input type="text" name="nome" placeholder="Nome" required title="Seu nome" value="<?= $dados_usuario['nome'] ?>">
										<input type="text" name="cpf" id="cpf" placeholder="CPF"  required title="Seu CPF" value="<?= $dados_usuario['cpf'] ?>">
										<input type="text" name="tel_fix" id="tel" placeholder="Telefone / Fixo" title="Seu telefone / fixo" style="width: 30%" value="<?= $dados_usuario['telefone_fixo'] ?>"><br>
										<label class="label-tit">Data de nascimento:</label>&nbsp;&nbsp;<input type="text" name="data_aniv" class="data" required title="Sua data de nascimento" style="width: 30%" value="<?= date('d-m-Y', strtotime($dados_usuario['data_aniversario'])) ?>"><br>
										<label class="text-super label_tit">Gênero:</label>&nbsp;&nbsp;
										<?php if($dados_usuario['sexo']=="masculino" ){ ?>
										<input type="radio" name="genero" value="masculino" checked required title="Seu gênero: masculino"> <label class="text-super opcao">Masculino</label>&nbsp;&nbsp;
										<input type="radio" name="genero" value="feminino"   title="Seu gênero: feminino"> <label class="text-super opcao">Feminino</label>
										<?php }else{ ?>
											<input type="radio" name="genero" value="masculino" required title="Seu gênero: masculino"> <label class="text-super opcao">Masculino</label>&nbsp;&nbsp;
	  									<input type="radio" name="genero" value="feminino"  checked title="Seu gênero: feminino"> <label class="text-super opcao">Feminino</label>
	  								<?php } ?>
									</div>
									<div class="c2">
	  									<textarea placeholder="Apresentação" name="apresentacao" required title="Uma breve apresentação sua" ><?= $dados_usuario['apresentacao'] ?></textarea>
	  									<input type="text" placeholder="Idioma (as)" name="idiomas" title="Idiomas que você fala" value="<?= $dados_usuario['idiomas'] ?>">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Apresentação do Candidato</legend>
								<div class="linha-conteudo">
									<div class="c2">
										<input type="text" name="link_video" placeholder="Link do vídeo" required title="O link do seu vídeo (Youtube, Vimeo, etc)" value="<?= $dados_usuario['link_video'] ?>">
										<label class="input-file index_btn"><i class="fas fa-upload"></i>&nbsp;&nbsp;Upload do seu currículo
	    									<input type="file" name="curriculo" placeholder="Envie o seu currículo"  title="Envie o seu currículo" accept="application/pdf">
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
										<input type="text" name="cep" id="cep" placeholder="CEP" required title="Seu CEP"  value="<?= $dados_usuario['cep'] ?>">
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
										<input type="text" name="cidade" placeholder="Cidade" required title="Sua cidade" value="<?= $dados_usuario['cidade'] ?>">
										<input type="text" name="endereco" placeholder="Endereço" required title="Seu endereço" value="<?= $dados_usuario['endereco'] ?>">
										<input type="text" name="complemento" placeholder="Complemento" title="Seu complemento (se tiver)" value="<?= $dados_usuario['complemento'] ?>">
										<input type="text" name="numero" placeholder="Número" required title="O número da sua residência" style="width: 16%" value="<?= $dados_usuario['numero_casa'] ?>">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Escolaridade / Cursos</legend>
								<div class="linha-conteudo">
									<div class="c2">
										<input type="text" name="nome_curso" placeholder="Nome do curso" title="Nome do curso"  value="<?= $dados_usuario_esco['nome_curso'] ?>">
										<input type="text" name="nome_instituicao" placeholder="Nome da Instituição" title="Nome da intituição (publica ou particular)"  value="<?= $dados_usuario_esco['instituicao'] ?>">
										<input type="text" name="pais_instituicao" placeholder="País onde cursou" title="País onde cursou"  value="<?= $dados_usuario_esco['pais'] ?>">
										<select name="tipo_curso" title="Tipo do curso">
											<?php if($dados_usuario_esco['tipo_curso']=="pressencial"){ ?>
											<option value="">Tipo de curso</option>
											<option selected="" value="pressencial">Pressencial</option>
											<option value="semi_presencial">Semi-pressencial</option>
											<option value="distancia">A distância</option>
										<?php }else if($dados_usuario_esco['tipo_curso']=="semi_presencial"){ ?>
											<option value="">Tipo de curso</option>
											<option  value="pressencial">Pressencial</option>
											<option selected="" value="semi_presencial">Semi-pressencial</option>
											<option value="distancia">A distância</option>

										<?php }else{ ?>
											<option value="">Tipo de curso</option>
											<option  value="pressencial">Pressencial</option>
											<option  value="semi_presencial">Semi-pressencial</option>
											<option selected="" value="distancia">A distância</option>
										<?php } ?>
										</select><br>
										<label class="label-tit">Início do curso:</label>&nbsp;&nbsp;<input type="text" class="data" style="width: 30%" name="inicio_curso"  title="Início do curso" value="<?= $dados_usuario_esco['inicio'] ?>"><br>
										<label class="label-tit">Conclusão do curso:</label>&nbsp;&nbsp;<input type="text" class="data" style="width: 30%" name="conclusao_curso"  title="Conclusão do curso" value="><?= $dados_usuario_esco['conclusao'] ?>"><br>
										<label class="text-super label-tit">Situação:</label>&nbsp;&nbsp;
										<?php if($dados_usuario_esco['situacao']=="interrompido"){ ?>
										<input type="radio" name="situacao_curso" value="interrompido" checked title="Sua situação referênte ao curso: interrompido"> <label class="text-super opcao">Interrompido</label>&nbsp;&nbsp;
	  									<input type="radio" name="situacao_curso" value="cursando" title="Sua situação referênte ao curso: cursando"> <label class="text-super opcao">Cursando</label>&nbsp;&nbsp;
	  									<input type="radio" name="situacao_curso" value="concluido" title="Sua situação referênte ao curso: concluído"> <label class="text-super opcao">Concluído</label><br>
	  									<?php }else if($dados_usuario_esco['situacao']=="cursando"){ ?>
	  									<input type="radio" name="situacao_curso" value="interrompido" title="Sua situação referênte ao curso: interrompido"> <label class="text-super opcao">Interrompido</label>&nbsp;&nbsp;
	  									<input type="radio" name="situacao_curso"  value="cursando" checked title="Sua situação referênte ao curso: cursando"> <label class="text-super opcao">Cursando</label>&nbsp;&nbsp;
	  									<input type="radio" name="situacao_curso" value="concluido" title="Sua situação referênte ao curso: concluído"> <label class="text-super opcao">Concluído</label><br>
	  									<?php }else{ ?>
	  									<input type="radio" name="situacao_curso" value="interrompido" title="Sua situação referênte ao curso: interrompido"> <label class="text-super opcao">Interrompido</label>&nbsp;&nbsp;
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
										<input type="text" name="nome_empresa" placeholder="Nome da empresa" title="Nome da empresa" value="<?= $dados_usuario_exp['nome_empresa'] ?>">
										<input type="text" name="cargo" placeholder="Cargo" title="Nome do cargo" value="<?= $dados_usuario_exp['cargo'] ?>"><br>
										<label class="label-tit">Período início:</label>&nbsp;&nbsp;<input type="text" class="data" style="width: 30%" name="inicio_empresa" title="Data de ínicio na empresa" value="<?= $dados_usuario_exp['inicio'] ?>"><br>
										<label class="label-tit">Período fim:</label>&nbsp;&nbsp;<input type="text" class="data" style="width: 30%" name="fim_empresa" title="Data de término na empresa (Se ainda estiver trabalhando, deixe vazio)" value="<?= $dados_usuario_exp['fim'] ?>"><br>
										<label class="text-super">Situação:</label>&nbsp;&nbsp;
										<?php if($dados_usuario_exp['situacao']=="trabalhando"){ ?>
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