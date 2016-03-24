<?php

include ('estilo/estilo.php');
include ('config/db.php');

if (isset($_POST['btn_send'])) {

	$db_conn = mysqli_connect ("HOST_DB","USUARIO_DB","SENHA_DB","NOME_DB");
	
	$stmt = mysqli_prepare ($db_conn,'	SELECT
											cod_usuario
										FROM
											pi_usuario
										WHERE
											login = ?
										AND
											senha = ?');
											
	mysql_stmt_bind_param ($stmt,'ss',	$_POST['login'],
										$_POST['senha']
							);
	
	if (isset($logins[$_POST['login']])) {
		
		if ($logins[$_POST['login']] == $_POST['senha']) {
			
			include('templates/admin_tpl.php');
			
		} else {
			
			echo '<h3>Algo não deu certo. Tente Novamente! <br> <br> 
			Você está sendo redirecionado para a tela de login. </h3> ';
			
			header("refresh:5;url=index.php"); 
			
		}
	
	
	} else {
				
		$msg = 'Usuário ou Senha Inválidos';
				
		include('templates/login_tpl.php');			
				
	}
	
} else {
	
	include('templates/login_tpl.php');	
	
}
?>
</html>