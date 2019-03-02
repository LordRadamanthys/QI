<?php  
require('conexao_adm/conexao_adm.php');
$con = new ConexaoAdm();
$id = $_GET['idh'];
$usu = $con->listarDadosSolicitante($id);
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
	<title>Solicitante perfil - ADM - Qi do condomínio</title>
  	<script type="text/javascript">
		function Voltar() {
  			window.history.back();
		}
  	</script>
  	 	  	<script>
function aprovar(valor, nome) {
    document.getElementById('reprovado').value = valor;
    document.getElementById('question').innerHTML = nome;
}

function enviarEmail(id, email, nome) {
    document.getElementById('nome_email').value = nome;
    document.getElementById('email_enviar').value = email;
    document.getElementById('id_email').value = id;
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
					<nav class="menu2">
						<ul>
							<li><a href="adm_principal.html"><i class="fas fa-th"></i> Principal</a></li>
							<li><a href="adm_mensagens.php#mensagem"><i class="far fa-envelope"></i> Mensagens</a></li>
							<li><a href="adm_vagas.php#vaga"><i class="fas fa-clipboard"></i> Vagas</a></li>
							<li><a href="adm_sindicos.php#candidato"><i class="far fa-user"></i> Candidatos</a></li>
							<li><a href="adm_condominios.php#condominio"><i class="fas fa-building"></i> Condomínios</a></li>
							<li><a href="adm_solicitantes.php#solicitante"><i class="fas fa-user"></i> Solicitante</a></li>
							<li><a href="adm_configuracoes.php"><i class="fas fa-cog"></i> Configurações</a></li>
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
						<h2 class="caminho-ativo"><i class="fas fa-user"></i> Perfil Solicitante</h2>
					</div>
					<div class="pop-up-excluir" id="excluir">
						<div class="excluir-txt">
							Você tem certeza que quer excluir o <span id="question"></span>?
							<form method="post" action="conexao_adm/aprovar_reprovarSolicitante.php">
								<input type="hidden" name="id_usuario" id="reprovado">
								<button type="submit" class="submit" style="margin-bottom: 10px">Sim</button>
								<button class="reset" type="reset" onclick="document.getElementById('excluir').style.display='none'">Não</button>
							</form>
						</div>
					</div>
					<div class="pop-up-excluir" id="notificar">
						<div class="excluir-txt" style="background-color: #c7c7c7">
							<form style="display: inline-block; text-align: center; margin-top: -2px;" >
								Escreva o texto da notificação
								<input type="hidden" name="id_email" id="id_email">
							<input type="hidden" name="email_enviara" id="email_enviar">
							<input type="hidden" name="nome_emaila" id="nome_email">
							<textarea  required="" name="mensagem" placeholder="Escreva uma mensagem"></textarea>
								<button type="submit" class="submit" style="margin-top: 10px;">Enviar</button>
								<button class="reset" type="reset" onclick="document.getElementById('notificar').style.display='none'">Cancelar</button>
							</form>
						</div>
					</div>
					<div class="linha-conteudo">
						<div class="vaga">
							<div class="vagas-opcao-cont">
								<div class="texto texto-infos-vagas">
									<div class="banner-perfil">
										<div class="linha-banner">
											<div class="img-perfil-conteudo" style="background-image: url(../src/usuarios_soli/<?=$dados_solicitante['id']?>/foto/perfil.jpg);"></div>
											<div class="nome-perfil">
												<h2><?= $dados_solicitante['nome']; ?></h2>
												<hr>
												<h3><?= $dados_solicitante['funcao']; ?></h3>
											</div>
										</div>
									</div>
									<div class="sobre-perfil">
										<div class="texto-sobre-perfil">
											<div class="texto">
												<form style="padding-bottom: 10px">				
													<form style="padding-bottom: 10px">				
														<button type="reset" class="submit" onclick="document.getElementById('notificar').style.display='flex';enviarEmail('<?= $dados_solicitante["id"] ?>', '<?= $dados_solicitante["email"] ?>', '<?= $dados_solicitante["nome"] ?>')">Notificar o solicitante</button>
														<button type="reset" class="reset" onclick="document.getElementById('excluir').style.display='flex';aprovar(<?= $dados_solicitante["id"] ?>,'<?= $dados_solicitante["nome"] ?>')">Excluir o solicitante</button>
														<a href="adm_solicitante_editar_form.php?idh=<?= $dados_solicitante["id"] ?>" style="margin-top: 5px">
															<div class="index_btn btn-reg">
																Editar informações
															</div>
														</a>
													</form>
												</form>
												<div class="linha-conteudo">
													<div class="quadro-sobre quadro-experiencia">
														<div class="titulo-quadro">
															Dados Solicitante
														</div>
														<div class="text-quadro">
															<span class="info-titulo">Perfil público:</span> ID<br>
															<span class="info-titulo">Nome do solicitante:</span> <?= $dados_solicitante['nome']; ?><br>
															<span class="info-titulo">Data de aniversário:</span> <?= $dados_solicitante['data_aniversario']; ?><br>
															<span class="info-titulo">Gênero:</span> <?= $dados_solicitante['sexo']; ?><br>
																									
														</div>
													</div>
													<div class="quadro-sobre quadro-experiencia">
														<div class="titulo-quadro" onclick="AbrirContCond()">
															Condomínios
														</div>
														<div class="text-quadro animated fade-in-down" id="condominio">

						<?php
						$result = $con->result; 
						if($dados_cod > 0){    
                             do{
                         ?>
															<span class="info-titulo">Nome do condomínio:</span>  <?= $dados_cod['nome_cond'] ?><br>
															<span class="info-titulo">Tipo:</span>  <?= $dados_cod['tipo_cond'] ?><br>
															<span class="info-titulo">Quantidade de unidades:</span> <?= $dados_cod['unidades_cond'] ?><br>
															<span class="info-titulo">Idade do empreendimento:</span> <?= $dados_cod['idade_cond'] ?><br>
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
														</div>
														<div class="text-quadro animated fade-in-down" id="vagas">
															<?php
						$dados_vaga = $con->listarVagasCondominios($id);
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