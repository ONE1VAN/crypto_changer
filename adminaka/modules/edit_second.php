<?php
	defined('ACCESS') or die();

	if($_GET["action"] == "update") {


		$name 	  = addslashes($_POST['name']);
		$currency   = addslashes($_POST['currency']);
		$min  = addslashes($_POST['min']);
		$max 	  = addslashes($_POST['max']);
		$placeholder 	  = addslashes($_POST['placeholder']);



	    if(!empty($name) || !empty($currency) || !empty($min) || !empty($max) || !empty($wallet) || !empty($network)) {
	             /* fixed MMiC */ DB::Query('UPDATE `second_curr` SET `name` = "'.$name.'", `currency` = "'.$currency.'",`min` = "'.$min.'", `max` = "'.$max.'",`placeholder` = "'.$placeholder.'" WHERE `id` = "'.intval($_GET['id']).'" LIMIT 1');
	            print "<font color=\"green\">Данные обновлены!</font><br />";
                header("Location:?a=edit_second&id=".$_GET['id']);

	    } else {
	        print "<font color=\"blue\">Данные не обновлены</font><br />";
            header("Location:?a=edit_second&id=".$_GET['id']);
	    }

	    
	}


	$get_enter = DB::Query("SELECT * FROM `second_curr` WHERE `id` = '".intval($_GET['id'])."'  LIMIT 1");
	$rows =  mysqli_fetch_assoc($get_enter);
   


	?>
	<script>
		document.title = 'Редактирвание валюты ';
	</script>
	<fieldset style="border: solid #666666 1px; padding: 10px;">
		<legend><b>Редактирвание валюты <span style="color:red"><?=$rows['name']?></span> </legend>
		
		
		<form action="?a=edit_second&id=<?php print intval($rows['id']);?>&action=update" method="post">
			
			<table align="center" border="0" cellpadding="3" cellspacing="0" style="border: solid #cccccc 1px;" width="612">
                 <tr bgcolor="#DDDDDD">
					<td><font color="red"><b>!</b></font> <b>Название</b> :</td>
					<td align="right"><input maxlength="30" name="name" size="70" style="width: 480px;" type="text" value="<?php print $rows['name']; ?>" required></td>
				</tr>
				<tr bgcolor="#DDDDDD">
					<td><font color="red"><b>!</b></font> <b>Заглушка в текстовом поле под кошелек</b>:</td>
					<td align="right"><input maxlength="30" name="placeholder" size="70" style="width: 480px;" type="text" value="<?php print $rows['placeholder']; ?>" required></td>
				</tr>
				<tr bgcolor="#DDDDDD">
					<td><font color="red"><b>!</b></font> <b>Максимальная  сумма</b>:</td>
					<td align="right"><input maxlength="30" name="max" size="70" style="width: 480px;" type="text" value="<?php print $rows['max']; ?>" required></td>
				</tr>
				<tr bgcolor="#DDDDDD">
					<td><b>Минимальная сумма</b>:</td>
					<td align="right"><input maxlength="30" name="min" size="70" style="width: 480px;" type="text" value="<?php print $rows['min']; ?>" /></td>
				</tr>
   	          
				<tr bgcolor="#DDDDDD">
					<td><b>Валюта</b>:</td>
					<td align="right"><input maxlength="50" name="currency" size="70" style="width: 480px;" type="text" value="<?php print $rows['currency']?>" /></td>
				</tr>



			</table>
			<table align="center" border="0" width="624">
				<tr>
					<td align="right"><input height="29" src="images/save.gif" title="Сохранить!" type="image" width="28"></td>
				</tr>
			</table>
		</form>
	</fieldset>




