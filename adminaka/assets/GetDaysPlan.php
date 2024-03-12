<?php
// Подключаем файл конфигурации
include "../../cfg.php";
include "../../ini.php";



$id = $_POST['id'];
			$res = db_result_to_array(DB::Query("SELECT `days`, `weekend`, `period`, `average_percent`, `minsum`, `maxsum` FROM `plans` WHERE `id`= '".$id."'"));

				$days = $res[0]['days'];
				$weekend = $res[0]['weekend'];
				$period = $res[0]['period'];
				$percent = $res[0]['average_percent'];
				$minsum = $res[0]['minsum'];
				$maxsum = $res[0]['maxsum'];


				$res = array('days' => $days, 'weekend' => $weekend, 'period' => $period, 'percent' => $percent, 'minsum' => $minsum, 'maxsum' => $maxsum);
				$res = json_encode($res);


		print $res;
?>