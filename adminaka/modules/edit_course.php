<?php

	defined('ACCESS') or die();



	if($_GET["action"] == "update") {





		$iden 	  = addslashes($_POST['identificator']);

		$first_curr   = addslashes($_POST['first_curr']);

		$second_curr   = addslashes($_POST['second_curr']);

		$course   = addslashes($_POST['course']);

		$plus   = addslashes($_POST['plus']);

		$minus   = addslashes($_POST['minus']);






	    if(!empty($iden) || !empty($first_curr) || !empty($second_curr) || !empty($course) || !empty($plus) || !empty($minus)) {



	            DB::Query('UPDATE `rate` SET `uniq_name` = "'.$iden.'", `symbol_to` = "'.$first_curr.'",`symbol_from` = "'.$second_curr.'", `course` = "'.$course.'",`plus` = "'.$plus.'",`minus` = "'.$minus.'" WHERE `id` = "'.intval($_GET['id']).'" LIMIT 1');

	            print "<font color=\"green\">Данные обновлены!</font><br />";

                header("Location:?a=edit_course&id=".$_GET['id']);



	    } else {

	        print "<font color=\"blue\">Данные не обновлены</font><br />";

            header("Location:?a=edit_course&id=".$_GET['id']);

	    }



	    

	}





	$get_enter = DB::Query("SELECT * FROM `rate` WHERE `id` = '".intval($_GET['id'])."'  LIMIT 1");

	$rows =  mysqli_fetch_assoc($get_enter);

   





	?>

	<script>

		document.title = 'Курс обмена';

	</script>

	<fieldset style="border: solid #666666 1px; padding: 10px;">

		<legend><b>Курс обмена <span style="color:red"><?=$rows['identificator']?></span> </legend>

		

		

		<form action="?a=edit_course&id=<?php print intval($rows['id']);?>&action=update" method="post">

			

			<table align="center" border="0" cellpadding="3" cellspacing="0" style="border: solid #cccccc 1px;" width="612">

                 <tr bgcolor="#DDDDDD">

					<td> <b>Идентификатор</b> :</td>

					<td align="right"><input maxlength="30" name="identificator" size="70" style="width: 480px;" type="text" value="<?php print $rows['uniq_name']; ?>" required></td>

				</tr>

				<tr bgcolor="#DDDDDD">

					<td> <b>Отправляемая валюта</b>:</td>

					<td align="right"><input maxlength="30" name="first_curr" size="70" style="width: 480px;" type="text" value="<?php print $rows['symbol_to']; ?>" required></td>

				</tr>

				<tr bgcolor="#DDDDDD">

					<td> <b>Получаемая валюта</b>:</td>

					<td align="right"><input maxlength="30" name="second_curr" size="70" style="width: 480px;" type="text" value="<?php print $rows['symbol_from']; ?>" required></td>

				</tr>

				<tr bgcolor="#DDDDDD">

					<td><b>Курс</b>:</td>

					<td align="right"><input maxlength="30" name="course" size="70" style="width: 480px;" type="text" value="<?php print $rows['course']; ?>" /></td>

				</tr>

   	          

				<tr bgcolor="#DDDDDD">

					<td><b>Добавить к курсу</b>:</td>

					<td align="right"><input maxlength="50" name="plus" size="70" style="width: 480px;" type="text" value="<?php print $rows['plus']?>" /></td>

				</tr>

				<tr bgcolor="#DDDDDD">

					<td><b>Отнять от курса</b>:</td>

					<td align="right"><input maxlength="50" name="minus" size="70" style="width: 480px;" type="text" value="<?php print $rows['minus']?>" /></td>

				</tr>



				





			</table>

			<table align="center" border="0" width="624">

				<tr>

					<td align="right"><input height="29" src="images/save.gif" title="Сохранить!" type="image" width="28"></td>

				</tr>

			</table>

		</form>

	</fieldset>









