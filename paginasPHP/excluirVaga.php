<?php
require('../php/conexao.php');
//include('conexao.php');
$con = new Banco();
$con->verificaLoginSoli();
		
		if(isset($_POST['aprovado'])){
			$con->DeletarVagasId($_POST['aprovado']);
		}
							
?>