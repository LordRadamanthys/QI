<?php  
require('conexao_adm/conexao_adm.php');
$con = new ConexaoAdm();
$usuariosSolicitante=$con->PegarTodosSolicitante();
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
	<title>Página principal - ADM - Qi do condomínio</title>
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
<body id="principal">
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
							<li><a href="adm_mensagens.php#mensagem"><i class="far fa-envelope"></i> Mensagens</a></li>
							<li><a href="adm_vagas.php#vaga"><i class="fas fa-clipboard"></i> Vagas</a></li>
							<li><a href="adm_sindicos.php#candidato"><i class="far fa-user"></i> Candidatos</a></li>
							<li><a href="adm_condominios.php#condominio"><i class="fas fa-building"></i> Condomínios</a></li>
							<li class="active"><a href="adm_solicitantes.php#solicitante"><i class="fas fa-user"></i> Solicitante</a></li>
							<li><a href="adm_configuracoes.php"><i class="fas fa-cog"></i> Configurações</a></li>
							<li><a href=""><i class="fas fa-sign-out-alt"></i> Sair</a></li>							
						</ul>
					</nav>
				</div>
			</div>
			<div class="cont-conteudo">

				<div class="pop-up-excluir" id="excluir">
					<div class="excluir-txt">
						Você tem certeza que quer excluir o solicitante: <span id="question"></span>?
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
							Escreva o texto da notificação que será enviado para o solicitante
							<input type="hidden" name="id_email" id="id_email">
							<input type="hidden" name="email_enviara" id="email_enviar">
							<input type="hidden" name="nome_emaila" id="nome_email">
							<textarea  required="" name="mensagem" placeholder="Escreva uma mensagem"></textarea>
							<button type="submit" class="submit" style="margin-top: 10px;">Enviar</button>
							<button class="reset" onclick="document.getElementById('notificar').style.display='none'">Cancelar</button>
						</form>
					</div>
				</div>

				<div class="c1">
					<div class="linha-conteudo">
						<div class="vaga principal">
							<div class="texto "> <!-- texto-infos-vagas"> -->
								<div class="vagas-opcao-cont">
									<div class="quadros quadros-2">
										<div class="quadro">
											<a href="adm_mensagens.php#mensagem">
												<div class="quadro-img"><i class="far fa-envelope"></i></div>
												<div class="quadro-txt"><div>Mensagens</div><i class="fas fa-angle-down seta"></i></div>
											</a>
										</div>
										<div class="quadro">
											<a href="adm_vagas.php#vaga">
												<div class="quadro-img"><i class="fas fa-clipboard"></i></div>
												<div class="quadro-txt"><div>Vagas</div><i class="fas fa-angle-down seta"></i></div>
											</a>
										</div>
										<div class="quadro">
											<a href="adm_sindicos.php#candidato">
												<div class="quadro-img"><i class="far fa-user"></i></div>
												<div class="quadro-txt"><div>Candidatos</div><i class="fas fa-angle-down seta"></i></div>
											</a>
										</div>
										<div class="quadro" id="solicitante">
											<a href="adm_condominios.php#condominio">
												<div class="quadro-img"><i class="fas fa-building"></i></div>
												<div class="quadro-txt"><div>Condomínios</div><i class="fas fa-angle-down seta"></i></div>
											</a>
										</div>
										<div class="quadro active" style="margin-bottom: 0;">
											<a href="adm_solicitantes.php#solicitante">
												<div class="quadro-img" style="background-color: #009900; filter: none"><i class="fas fa-user"></i></div>
												<div class="quadro-txt" style="background-color: #006600;"><div>Solicitante</div></div>
											</a>
										</div>
										<div class="vagas-opcao-cont" style="background-color: #fff; overflow-x:auto; margin: 0 0.6%; margin-bottom: 10px; width: 100%">
											<div class="quadros-titulo"><span class="titulo-perfil"><h2>Solicitantes</h2></span></div>
											<table>
											  	<tr style="background-color: #009900; color: #fff;">
											    	<th></th>
											    	<th>Nome</th>
											    	<th>Nome (função) no condomínio</th>
											    	<th>Profissão</th>
											    	<th>Telefone</th>
											    	<th>E-mail</th>
											    	<th>Idade</th>
											    	<th>CEP</th>
											    	<th>Data de cadastro</th>
											    	<th>Botões</th>
											  	</tr>
					<?php
						$result = $con->pegaUsuario;  
						if($usuariosSolicitante > 0){   
                             do{
                    ?>
											  	<tr>
											    	<td onclick="location.href = 'adm_solicitante_perfil.php?idh=<?= $usuariosSolicitante['id'] ?>';" class="table_img" style="background-image: url(../src/usuarios_soli/<?=$usuariosSolicitante['id']?>/foto/perfil.jpg);"></td>
											    	<td onclick="location.href = 'adm_solicitante_perfil.php?idh=<?= $usuariosSolicitante['id'] ?>';"><?= $usuariosSolicitante['nome'] ?></td>
											    	<td onclick="location.href = 'adm_solicitante_perfil.php?idh=<?= $usuariosSolicitante['id'] ?>';"><?= $usuariosSolicitante['funcao'] ?></td>
											    	<td>Advogado</td>
											    	<td><?= $usuariosSolicitante['celular'] ?></td>
											    	<td><?= $usuariosSolicitante['email'] ?></td>
											    	<td><?= date('Y')-date('Y',  strtotime($usuariosSolicitante['data_aniversario'] ))?></td>
											    	<td><?= $usuariosSolicitante['cep'] ?></td>
											    	<td><?= $usuariosSolicitante['data_cadastro'] ?> - <?= $usuariosSolicitante['hora_cadastro'] ?></td>
												    <td>
												    	<div class="botoes">
													    	<i class="fas fa-comments" onclick="document.getElementById('notificar').style.display='flex';enviarEmail('<?= $usuariosSolicitante["id"] ?>', '<?= $usuariosSolicitante["email"] ?>', '<?= $usuariosSolicitante["nome"] ?>')" title="Notificar o solicitante"></i>
													    	<i class="far fa-trash-alt" onclick="document.getElementById('excluir').style.display='flex';aprovar(<?= $usuariosSolicitante["id"] ?>,'<?= $usuariosSolicitante["nome"] ?>')" title="Excluir o solicitante"></i>
													    	<i class="fas fa-edit" onclick="location.href = 'adm_solicitante_editar_form.php?idh=<?= $usuariosSolicitante["id"] ?>';" title="Editar informações do solicitante"></i>
												    	</div>
													</td>
											  	</tr>
						<?php }while ($usuariosSolicitante = mysqli_fetch_assoc($result)); 
						}else{
							echo "";
						}
							?>
											</table>
										</div>
										<div class="quadro" >
											<a href="adm_configuracoes.php">
												<div class="quadro-img"><i class="fas fa-cog"></i></div>
												<div class="quadro-txt"><div>Configurações</div></div>
											</a>
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