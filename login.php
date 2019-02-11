<?php
require('php/conexao.php');
$con = new Banco();

	
		$login = isset($_POST['login']) ? $_POST['login'] : '';
		$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
		$loginEmail = "SELECT `id`, `nome`, `email`, `nivel` FROM `usuarios` WHERE (`email` = '".$login ."')  AND (`senha` = '". $senha ."')  LIMIT 1";
		$loginsoli = "SELECT `id`, `nome`, `email`, `nivel` FROM `solicitante_cond` WHERE (`email` = '".$login ."')  AND (`senha` = '". $senha ."')  LIMIT 1";
		//$con->login($loginEmail);
		$con->loginteste($loginEmail,$loginsoli);

	?>
