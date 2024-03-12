<?php



include "../cfg.php";

include "../ini.php";

date_default_timezone_set("Europe/Kirov");

print "

<span class='DateTimeAdmin'>Текушая дата

<br>".date("d.m.Y")."<br>".date("H:i")."</span>";



if (($status == 1 || $status == 2) ) {

?>

	<html>



	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<title>Система управления проектом «<?php print $cfgURL; ?>»</title>

		<link href="files/favicon.ico" type="image/x-icon" rel="shortcut icon">

		<link href="files/styles.css" rel="stylesheet" type="text/css" />

		<script src="files/jquery.js"></script>

		<!-- Подключаем наш файл скрптов -->

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script type="text/javascript" src="files/script.js"></script>

		<script src="files/form_admin.js?v=2"></script>

		<script src="files/JsFunc.js"></script>

		<script src="files/searchForms.js"></script>

		<style>

			.list_search_block {

				display: block;

				text-decoration: none;

				list-style: none;

				text-align: left;

				font-size: 12px;

				line-height: 2.0em;

				color: #000;

				background: #f8f8f8;

				border-radius: 15px;

				margin-top: 5px;

				margin-left: 40px;

			}



			.item_list_search a:hover {

				color: green;

			}

		</style>

	</head>



	<body>

		<script>

			$(document).ready(function() {

				$("#menuEdit").on("click", "a", function(event) {

					event.preventDefault();

					var id = $(this).attr('href'),

						top = $(id).offset().top;

					$('body,html').animate({

						scrollTop: top

					}, 1500);

				});

			});

		</script>

		<table align="center" width="1200" height="100%" border="0" cellpadding="0" cellspacing="0">

			<tr height="65">

				<td>

					<table align="center" width="1200" height="65" border="0" cellpadding="0" cellspacing="0">

						<tr valign="top">

							<td><a href="adminstation.php"><img src="images/logo.jpg" width="202" height="65" alt="CMS AdminStation" border="0" /></a></td>







							<td width="30"><img style="cursor: pointer;" onclick="if(confirm('Вы действительно хотите выйти?')) top.location.href='/service_file/exit.php';" src="images/exit.gif" width="30" height="48" border="0" alt="Выход" title="Выход" /></td>

						</tr>

					</table>

				</td>

			</tr>

			<tr>

				<td height="1">

					<table class="menu">

						<tr>

							<td><a class="menutop" href="?a=edit_user">Настройки пользователя</a></td>



							<td><a class="menutop" href="?a=first_curr">Настройка кошельков</a></td>


							<td><a class="menutop" href="?a=index">Транзакции</a></td>



							

						</tr>





					</table>

				</td>

			</tr>



			<tr>

				<td height="5"></td>

			</tr>

			<tr>

				<td valign="top" style="border-radius: 4 4 0 0px; padding: 10 10 10 10px; border: 1px solid #547898; background:URL(images/logo_down.jpg) no-repeat bottom right;">

					<?php

					$a	= substr(addslashes(htmlspecialchars($_GET['a'], ENT_QUOTES, '')), 0, 15);



					if (!$a) {

						include "modules/index.php";

					} elseif (file_exists("modules/" . $a . ".php")) {

						include "modules/" . $a . ".php";

					} 



					?>&nbsp;

				</td>

			</tr>

			<tr height="33" bgcolor="#5e87a9">

				<td align="center" style="color: #ffffff;">&copy; 2007-<?php print date('Y'); ?> <br />

					Все права защищены!</td>

			</tr>

		</table>





	</body>



	</html>

<?php

} else {

	print "<html><head><script language=\"javascript\">top.location.href='index.php';</script></head><body><a href=\"index.php\"><b>Index</b></a></body></html>";

}

?>