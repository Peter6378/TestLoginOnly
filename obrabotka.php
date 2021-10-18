<?php
	$login = 'login';
	$password = 'der_paro1';
	if (!empty($_REQUEST['Password']) && $_REQUEST['Password'] == $password && !empty($_REQUEST['Login']) && $_REQUEST['Login'] == $login) {
		echo 'Welcome, my Friend!';
	} else
		echo 'Access denied, Bitch!';
?>