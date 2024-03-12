<?php
// Подключаем файл конфигурации
include "../../cfg.php";
include "../../ini.php";




$id = $_POST['Typeid'];
			$res = db_result_to_array(DB::Query("SELECT `bonus_count` FROM `bonus_list` WHERE `id`= '".$id."'"));
				$count_block =  "от ".$res[0]['bonus_count']." ".cfgSET('cfgNamePoint');
				$count_total = $res[0]['bonus_count'];
				$f_count = explode("-", $count_total);
				$first_count = $f_count[0];

		$result = array('total_count' => $count_block, 'first_count' => $first_count);

		$res =json_encode($result);
		print $res;
?>