<?php
	defined('ACCESS') or die();

	$res = db_result_to_array(DB::Query("SELECT `user` FROM `users` WHERE `id` = 1"));

	if($_GET["action"] == "update") {


		$pass 	= addslashes($_POST['pass']);



	    $hash 		= as_md5($key, $pass);

	if ($pass) {
		if ($pass != "") {
			DB::Query('UPDATE `users` SET `pass` = "' . $pass . '", `hash` = "' . $hash . '" WHERE `id` = 1 LIMIT 1');
			print "<font color=\"green\">1. Пароль изменён!</font><br />";
		} else {
			print "<font color=\"red\">1. Пароль не изменён!</font><br />";
		}
	} else {
		print "<font color=\"blue\">1. Пароль остался преждним!</font><br />";
	}

	    
	}
	if($_GET["action"] == "log_update") {


		$login 	= addslashes($_POST['login']);



	if ($login) {
			DB::Query('UPDATE `users` SET `user` = "' . $login . '" WHERE `id` = 1 LIMIT 1');
			print "<font color=\"green\">1. Логин изменён!</font><br />";
	} else {
		print "<font color=\"blue\">1. Логин остался преждним!</font><br />";
	}

	    
	}


	// Sirius777
	// c16e7c40f8f020fa8ca5d1349ea72fda

	?>
	<script>
		document.title = 'Смена пароля';
	</script>
	<fieldset style="border: solid #666666 1px; padding: 10px;">
		<legend><b>Смена пароля для Админа> </legend>
		<form action="?a=edit_user&action=log_update" method="post">
			
			<table align="center" border="0" cellpadding="3" cellspacing="0" style="border: solid #cccccc 1px;" width="612">
                 <tr bgcolor="#DDDDDD">
					<td><font color="red"><b>!</b></font> <b>Укажите логин</b> :</td>
					<td align="right"><input maxlength="30" name="login" size="70" style="width: 480px;" type="text" value="<?=$res[0]['user']?>" required></td>
				</tr>
				

			</table>
			<table align="center" border="0" width="624">
				<tr>
					<td align="right"><input height="29" src="images/save.gif" title="Сохранить!" type="image" width="28"></td>
				</tr>
			</table>
		</form>
		
		<form action="?a=edit_user&action=update" method="post">
			
			<table align="center" border="0" cellpadding="3" cellspacing="0" style="border: solid #cccccc 1px;" width="612">
                 <tr bgcolor="#DDDDDD">
					<td><font color="red"><b>!</b></font> <b>Укажите пароль</b> :</td>
					<td align="right"><input maxlength="30" name="pass" size="70" style="width: 480px;" type="text" value="" required></td>
				</tr>
				

			</table>
			<table align="center" border="0" width="624">
				<tr>
					<td align="right"><input height="29" src="images/save.gif" title="Сохранить!" type="image" width="28"></td>
				</tr>
			</table>
		</form>
	</fieldset>




