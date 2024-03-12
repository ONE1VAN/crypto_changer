<?php

	defined('ACCESS') or die();



	if($_GET["action"] == "update") {





		$name 	  = addslashes($_POST['name']);


		$wallet 	  = addslashes($_POST['wallet']);







	    if(!empty($name) || !empty($abr) || !empty($min) || !empty($max) || !empty($wallet)) {



	            DB::Query('UPDATE `wallet` SET `name` = "'.$name.'", `wallet` = "'.$wallet.'" WHERE `id` = "'.intval($_GET['id']).'" LIMIT 1');

	            print "<font color=\"green\">Данные обновлены!</font><br />";

                header("Location:?a=edit_first_curr&id=".$_GET['id']);



	    } else {

	        print "<font color=\"blue\">Данные не обновлены</font><br />";

            header("Location:?a=edit_first_curr&id=".$_GET['id']);

	    }



	    

	}





	$get_enter = DB::Query("SELECT * FROM `wallet` WHERE `id` = '".intval($_GET['id'])."'  LIMIT 1");

	$rows =  mysqli_fetch_assoc($get_enter);

   





	?>

	<script>

		document.title = 'Редактирвание валюты ';

	</script>

	<fieldset style="border: solid #666666 1px; padding: 10px;">

		<legend><b>Редактирвание валюты <span style="color:red"><?=$rows['name']?></span> </legend>

		

		

		<form action="?a=edit_first_curr&id=<?php print intval($rows['id']);?>&action=update" method="post">

			

			<table align="center" border="0" cellpadding="3" cellspacing="0" style="border: solid #cccccc 1px;" width="612">

                 <tr bgcolor="#DDDDDD">

					<td><font color="red"><b>!</b></font> <b>Название</b> :</td>

					<td align="right"><input maxlength="30" name="name" size="70" style="width: 480px;" type="text" value="<?php print $rows['name']; ?>" required></td>

				</tr>

			

				<tr bgcolor="#DDDDDD">

					<td><b>Счет в платежной системе</b>:</td>

					<td align="right"><input maxlength="50" name="wallet" size="70" style="width: 480px;" type="text" value="<?php print $rows['wallet']?>" /></td>

				</tr>









			</table>

			<table align="center" border="0" width="624">

				<tr>

					<td align="right"><input height="29" src="images/save.gif" title="Сохранить!" type="image" width="28"></td>

				</tr>

			</table>

		</form>

	</fieldset>









