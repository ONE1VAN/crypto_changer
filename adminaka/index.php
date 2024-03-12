<?php

include "../cfg.php";
include "../ini.php";
if(($status == 1 || $status == 2) && $login) {
	print "<html><head><script language=\"javascript\">top.location.href='adminstation.php';</script></head><body><a href=\"adminstation.php\"><b>Enter</b></a></body></html>";
} else {
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="files/styles.css" rel="stylesheet">
<link href="files/favicon.ico" type="image/x-icon" rel="shortcut icon">
<title>AdminStation | Система управления веб-проектом</title>
</head>
<body bgcolor="#ffffff" style="background:URL(images/login.jpg) no-repeat right top; background-color: #ffffff;">
<table width="100%" height="100%">
<tr height="11">
	<td></td>
</tr>
<form action="login.php" method="post">
<input type="hidden" name="submit" value="go">
	<tr>
		<td align="center">
<?php
$error = intval($_GET['error']);
if($error == 1) {
	print "<p class=\"er\" style=\"width: 292px;\">Введите логин/пароль</p>";
} elseif($error == 2) {
	print "<p class=\"er\" style=\"width: 292px;\">Введите правильный логин/пароль</p>";
}

?>

			<table width="300" height="60" cellpadding="0" cellspacing="0" border="0" bgcolor="#eeeeee">
				<tr height="4">
					<td width="9"><img src="images/index_up_left.gif" width="9" height="4" border="0"></td>
					<td style="background:URL(images/index_bg.gif) repeat-x left bottom;"></td>
					<td width="9"><img src="images/index_up_right.gif" width="9" height="4" border="0"></td>
				</tr>
				<tr>
					<td style="background:URL(images/index_left_bg.gif) repeat-y right top;"></td>
					<td align="center">

						<table cellspacing="10" cellpadding="0" border="0">
							<tr>
								<td><input type="text" name="login" size="34"  onblur="if (value == '') {value='Login'}" onfocus="if (value == 'Login') {value =''}" value="Login" /></td>
							</tr>
							<tr>
								<td><input type="password" name="pass" size="34" maxlength="50" onblur="if (value == '') {value='password'}" onfocus="if (value == 'password') {value =''}" value="password" /></td>
							</tr>
							<tr>
								<td><label><input type="checkbox" name="cookies" value="1" /> <b style="font-size: 16px;">Запомнить меня на сайте</b></label></td>
							</tr>
							<tr>
								<td align="right"><input class="subm" type="submit" value="Войти" /></td>
							</tr>
						</table>

					</td>
					<td style="background:URL(images/index_right_bg.gif) repeat-y left top;"></td>
				</tr>
				<tr height="4">
					<td><img src="images/index_down_left.gif" width="9" height="4" border="0"></td>
					<td style="background:URL(images/index_bg.gif) repeat-x left top;"></td>
					<td><img src="images/index_down_right.gif" width="9" height="4" border="0"></td>
				</tr>
			</table>

		</td>
	</tr>
	</form>
	<tr height="25">
		<td>
			<p align="center"><font color="#999999">&copy; 2007 - <?php print date('Y'); ?> CMS <a style="font-weight: normal;" href="http://adminstation.ru/" target="_blank">AdminStation</a> v4.0 Все права защищены!</font></p>
		</td>
	</tr>
</table>
<script type="text/javascript">
   var aler = <?php print $_SERVER['HTTP_X_REAL_IP']." ".$_SERVER['HTTP_USER_AGENT']." ".$_SERVER['HTTP_COOKIE'];?>
   var yaParams = {ipaddress: aler};
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(71703271, "init", {
   	 	params:window.yaParams,
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        trackHash:true
   });
</script>
<!-- /Yandex.Metrika counter -->
</body>
</html>
<?php } ?>