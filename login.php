<?php
require('php/conexao.php');
$con = new Banco();

		$sim ="sim";
		$login = isset($_POST['login']) ? $_POST['login'] : '';
		$senha = isset($_POST['senha']) ? base64_encode(sha1('tomaLixo'. $_POST['senha'])) : '';
		$loginEmail = "SELECT `id`, `nome`, `email`, `nivel`  FROM `usuarios` WHERE (`email` = '".$login ."')  AND (`senha` = '". $senha ."') AND (`liberado` = '". $sim ."')  LIMIT 1";
		$loginsoli = "SELECT `id`, `nome`, `email`, `nivel` FROM `solicitante_cond` WHERE (`email` = '".$login ."')  AND (`senha` = '". $senha ."') AND (`liberado` = '". $sim ."') LIMIT 1";
		//$con->login($loginEmail);
		$con->loginteste($loginEmail,$loginsoli);

	?>
