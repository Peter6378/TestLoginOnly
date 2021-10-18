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

	$max_simbols = 25;
	$var = strip_tags($login);
	$count_var = count(preg_split("//u",$var,-1,PREG_SPLIT_NO_EMPTY));

	if($count_var > $max_simbols) {
	die ("Everything BAD");
}

if  (!preg_match('/([a-zA-Z])?/',$login)){
	die ("Everything bad");	
}

if (isset($_POST['password']) && $_POST['password'] != '') {
	$password = trim($_POST['password']);
}

$max_simbols1 = 20;
$min_simbols1 = 9;
$var1 = strip_tags($password);
$count_var1 = count(preg_split("//u",$var1,-1,PREG_SPLIT_NO_EMPTY));
		
if($count_var1 > $max_simbols1 || $count_var1 < $min_simbols1){
	die ("Everything BAD1");
}

if (empty($login) || empty($password)) {
    exit ("Vi ne vveli info v polya!");
}
  
$query1 = "SELECT u.id, u.name, u.password, a.adress, b.birthday FROM users AS u LEFT JOIN adress AS a ON a.id=u.id RIGHT JOIN birthday AS b ON b.id=a.id WHERE u.login='$login'";

$result1 = mysql_query($query1, $link);

if (empty ($result1)) {
	die ("Fuck you, Spielberg!");
}

$myrow1 = mysql_fetch_array($result1, MYSQL_ASSOC);

if ($myrow1['password']== md5( "$password" )) {
	echo "Congrats! You are successfulli voshli na sait! Vashi dannie: <br>";
	echo $myrow1['name'], PHP_EOL, "<br>";
	echo $myrow1['adress'], PHP_EOL, "<br>";
	echo $myrow1['birthday'];
} else {
	echo "Sorry Bitch your login or password is wrong";
}

mysql_close($link);
?>