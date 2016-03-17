<?php

$logins = array('luiz' => '123456',
				'joao' => '654321',
				'joana' => '123123');

if (isset($_POST['btn_send'])) {
	
	if (isset($logins[$_POST['login']])) {
		
		if ($logins[$_POST['login']] == $_POST['senha']) {
			
			include('templates/admin_tpl.php');
			
		}
	
	} else {
				
		$msg = 'Usuário ou Senha Inválidos';
				
		include('templates/login_tpl.php');			
				
	}
	
} else {
	
	include('templates/login_tpl.php');	
	
}
?>