<?php

include "../../cfg.php";
include "../../ini.php";
if($status == 2 || $status == 1) {
	$id = intval($_GET['id']);

	$res = db_result_to_array(DB::Query("SELECT `login` FROM `users` WHERE `id` = '".$id."'"));

	DB::Query("DELETE FROM `users` WHERE `id` = '".$id."' LIMIT 1");
	DB::Query("DELETE FROM `income_usd` WHERE `login` = '".$res[0]['login']."' LIMIT 1");
	DB::Query("DELETE FROM `income_points` WHERE `login` = '". $res[0]['login']."' LIMIT 1");
	DB::Query("DELETE FROM `CountDepositsplan` WHERE `login` = '". $res[0]['login']."' LIMIT 1");
	DB::Query("DELETE FROM `CountUserReferals` WHERE `login` = '". $res[0]['login']."' LIMIT 1");
	DB::Query("DELETE FROM `ftp_min_remainder` WHERE `login` = '". $res[0]['login']."' LIMIT 1");
	DB::Query("DELETE FROM `get_briliants` WHERE `login` = '". $res[0]['login']."' LIMIT 1");
	DB::Query("DELETE FROM `ftp_percentInvoice` WHERE `login` = '". $res[0]['login']."' LIMIT 1");
	DB::Query("DELETE FROM `notification` WHERE `login` = '". $res[0]['login']."' LIMIT 1");
	DB::Query("DELETE FROM `deposits` WHERE `username` = '". $res[0]['login']."'");
	DB::Query("DELETE FROM `enter` WHERE `login` = '". $res[0]['login']."'");
	DB::Query("DELETE FROM `output` WHERE `login` = '". $res[0]['login']."'");
	DB::Query("DELETE FROM `oborot` WHERE `login` = '". $res[0]['login']."'");
	DB::Query("DELETE FROM `openTable` WHERE `login` = '". $res[0]['login']."'");
	DB::Query("DELETE FROM `paymentsUser` WHERE `login` = '". $res[0]['login']."'");
	DB::Query("DELETE FROM `points_buy` WHERE `login` = '". $res[0]['login']."'");
	DB::Query("DELETE FROM `points_sell` WHERE `login` = '". $res[0]['login']."'");
	DB::Query("DELETE FROM `TimeMatrix` WHERE `login` = '". $res[0]['login']."'");



	print "<html><head><script language=\"javascript\">alert('Пользователь удалён!'); location.href='../adminstation.php?a=users&page=".$_GET['page']."'</script></head></html>";
} else {
	print "<html><head><script language=\"javascript\">alert('У Вас нет прав на выполнение данной операции!'); location.href='../adminstation.php?a=users&page=".$_GET['page']."'</script></head></html>";
}
?>