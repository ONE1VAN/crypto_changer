<?php
// Подключаем файл конфигурации
include "../../cfg.php";
include "../../ini.php";




$id = $_POST['Typeid'];
			$res = db_result_to_array(DB::Query("SELECT `bonus` FROM `reflevels` WHERE `id`= '".$id."'"));
				$count_block =  "к начислению  - ".$res[0]['bonus']." ".cfgSET('cfgNamePoint');
				$first_count = $res[0]['bonus'];

		$result = array('total_count' => $count_block, 'first_count' => $first_count);

		$res =json_encode($result);
		print $res;
?>