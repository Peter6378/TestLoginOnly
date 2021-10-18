<?php

$db_host = 'localhost'; 
$db_user = 'login'; 
$db_password = '123'; 
$database = 'testbd1'; 

$link = mysql_connect($db_host, $db_user, $db_password);
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
$db_selected = mysql_select_db($database, $link);
if (!$db_selected) {
    die ("Не удалось выбрать базу $database: " . mysql_error());
}

if (isset($_POST['login']) && $_POST['login'] != '') {
	$login = mysql_real_escape_string(trim($_POST['login'])); 
}

if (isset($_POST['password']) && $_POST['password'] != '') {
	$password = trim($_POST['password']);
}

if (empty($login) or empty($password)) {
    exit ("Vi ne vveli info v polya!");
}
  
$query = "SELECT * FROM users WHERE login='$login'";

$result = mysql_query($query, $link);
if (empty ($result)) {
	die ("Fuck you, Spielberg!");
}

$myrow = mysql_fetch_array($result, MYSQL_ASSOC);

if ($myrow['password']== md5( "$password" )) {
	echo "Congrats! You are successfulli voshli na sait!";
} else {
	echo "Sorry Bitch your login or password is wrong";
}

mysql_close($link);		
?>