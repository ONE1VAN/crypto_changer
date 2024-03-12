<?php
// Подключаем файл конфигурации
include "../../cfg.php";
include "../../ini.php";




$PaymentId = $_POST['Typeid'];
$userlogin = $_POST['Typelogin'];
$Forms     = $_POST['Forms'];


		$res = db_result_to_array(DB::Query("SELECT `comment` FROM `paysystems` WHERE `name`= '".$PaymentId."'"));

			$abr = $res[0]['comment'];

			$sql = db_result_to_array(DB::Query("SELECT * FROM `users` WHERE `user` = '".$userlogin."'"));

				$wallet = $sql[0][$abr];

	if($Forms == 'enter'){
		if($wallet == ""){
			$wallet = '<span style="color:red">Кошелек не установлен!<br>Установка нового кошелька для '.$PaymentId.'<br>
			<input maxlength="50" name="NewWalletOut" id="purseNew" size="70" onchange="newEnterWallet(this.value)" style="width: 480px;" type="text" value="" placeholder="" />';
			$status = 1;
		}else{
			$status = 2;
		}
	}else{
		if($wallet == ""){
			$wallet = '<span style="color:red">Кошелек не установлен!<br>Установка нового кошелька для '.$PaymentId.'<br>
			<input maxlength="50" name="NewWalletOut" id="purseNewOut" size="70" onchange="newOutputWallet(this.value)" style="width: 480px;" type="text" value="" placeholder="" />';
			$status = 1;
		}else{
			$status = 2;
		}
	}	

		

		$result = array('wallet' => $wallet, 'status' => $status);

		$res =json_encode($result);
		print $res;
?>