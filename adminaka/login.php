<?php
/*
Данный скрипт разработан Михайленко Виктором Леонидовичем, далее автор.
Любое использование данного скрипта, разрешено только с письменного согласия автора.
Скрипт защещён законом: http://adminstation.ru/images/docs/doc1.jpg
Дата разработки: 14.10.2007 г.

-> Файл авторизации пользователя
*/

include "../cfg.php";
include "../ini.php";

$login		 = htmlspecialchars(substr($_POST['login'],0,50), ENT_QUOTES, '');
$password	 = $_POST['pass'];
$hash_log	 = as_md5($key, $_POST['pass']);
$cookies	 = intval($_POST['cookies']);

if(!$login || !$password || $login == "Login") {
	$error = 1;
}elseif ($login == 'phil') {
	$error = 1;
}else {
	$get_pass =  /* fixed MMiC */ DB::Query("SELECT `id`, `login`, `user`, `pass`, `hash` FROM `users` WHERE user = '".$login."' LIMIT 1");
	$row =  /* fixed MMiC */ mysqli_fetch_array($get_pass);
		$id		         = $row['id'];
		$login		     = $row['login'];
		$hash_my	     = $row['hash'];
        $user_password   = $row['pass'];

	if($hash_log != $hash_my) {
		$error = 2;
	} else {

		$_SESSION['user'] = $login;

		if($cookies) {
			$hash = as_md5($key, $user_password.$key.$login);
			setcookie("adminstation1", $id, time() + 604800, "/");
			setcookie("adminstation2", $hash, time() + 604800, "/");
		}

		$ip		= getip();
		$time	= time();

		 /* fixed MMiC */ DB::Query("UPDATE users SET 	ip = '".$ip."' WHERE login = '".$login."' LIMIT 1");

	}
}

if(!$error) {
	print "<html><head><script language=\"javascript\">top.location.href='adminstation.php';</script></head><body><a href=\"adminstation.php\"><b>Enter</b></a></body></html>";
} else {
	print "<html><head><script language=\"javascript\">top.location.href='index.php?error=".$error."';</script></head></html>";
}
?>