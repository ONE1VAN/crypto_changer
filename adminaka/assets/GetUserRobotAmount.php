<?php
// Подключаем файл конфигурации
include "../../cfg.php";
include "../../ini.php";




$user = $_POST['User'];

			$res = db_result_to_array(DB::Query("SELECT `robot_summ`, `robot_status`, `robot_level` FROM `users` WHERE `user`= '".$user."'"));
				$robot_summ 	=  $res[0]['robot_summ'];
				$robot_status 	=  $res[0]['robot_status'];
				$robot_level 	=  $res[0]['robot_level'];

			$result = db_result_to_array(DB::Query("SELECT * FROM `robot_levels` WHERE `level` = '".$robot_level."'"));
				$min_percent 		=  $result[0]['percent_to'];
				$max_percent 		=  $result[0]['percent_from'];
				$average_percent 	=  $result[0]['average_percent'];
				
		$res = array('robot_summ' => $robot_summ, 'robot_status'=> $robot_status, 'robot_level'=> $robot_level, 'min_percent'=> $min_percent, 'max_percent'=> $max_percent, 'average_percent'=> $average_percent);
		$res = json_encode($res);
		
		print $res;
?>