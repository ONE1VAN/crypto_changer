<?

ignore_user_abort(true);
set_time_limit(0);
include "../../cfg.php";
include "../../ini.php";





(int)$id_user = clear_data($_POST['user']);

$pm  = clear_data($_POST['pm']);
$pe  = clear_data($_POST['pe']);
$adv = clear_data($_POST['adv']);
$eth = clear_data($_POST['eth']);
$btc = clear_data($_POST['btc']);
$ltc = clear_data($_POST['ltc']);
$xrp = clear_data($_POST['xrp']);
$trx = clear_data($_POST['trx']);
$doge = clear_data($_POST['doge']);
$usdt = clear_data($_POST['usdt']);
$card = clear_data($_POST['card']);



$result = DB::Query("UPDATE `users` SET `pm` = '".$pm. "', `pe` = '". $pe. "', `adv` = '". $adv. "', `eth` = '". $eth. "', `btc` = '". $btc. "', `ltc` = '". $ltc. "', `xrp` = '". $xrp. "', `trx` = '". $trx. "', `doge` = '". $doge. "', `usdt` = '". $usdt. "', `card` = '". $card."'  WHERE `id` = '".$id_user."'");

    if($result == true){

        $error = '<p class="erok">Номер кошелька изменен!</p>';
        $status = 1;
    }else{
        $error = '<p class="er">Номер кошелька не изменен! Повторите!</p>';
        $status = 0;
    }




	$res = array('error' => $error, 'status' => $status);
                    $res = json_encode($res);
                    print $res;    



?>