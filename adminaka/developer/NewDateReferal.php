<?php
include "../../cfg.php";
include "../../ini.php";


	(int)$id = $_POST['id'];
	$date = $_POST['date']." ".$_POST['time'].":00";
	$str = strtotime($date);


	$res = DB::Query("UPDATE `users` SET `reg_time` = '".$str."' WHERE `id` = '".$id."'");

		if($res == true){
			print "<p class=\"erok\">Успешно изменено</font><br />";
		}else{
			print "<p style=\"background: red\">Ошибка</font><br />";
		}
	
?>