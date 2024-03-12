<?php
// Подключаем файл конфигурации
include "../../cfg.php";
include "../../ini.php";




$PaymentId = $_POST['Typeid'];
$userlogin = $_POST['Typelogin'];
$namePayment = $_POST['NamePayment'];


		$res = db_result_to_array(DB::Query("SELECT `comment` FROM `paysystems` WHERE `name`= '".$namePayment."'"));

			$abr = $res[0]['comment'];

			$sql = db_result_to_array(DB::Query("UPDATE `users` SET `$abr` = '".$PaymentId."' WHERE `user` = '".$userlogin."'"));

			$newWallet = $PaymentId;

		$result = array('newWallet' => $newWallet);

		$res =json_encode($result);
		print $res;
?>