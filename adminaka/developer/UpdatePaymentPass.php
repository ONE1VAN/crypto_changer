<?

ignore_user_abort(true);
set_time_limit(0);
include "../../cfg.php";
include "../../ini.php";



$key_first  = 'huifHUdf66((&&HG';
$key_second = 'dfdDDW34#RFE#d23';

$Key = $_POST['code'];
(int)$id_user = clear_data($_POST['user']);


        $Key    = $key_first."".$Key."".$key_second;
        (string)$hash = hash('ripemd320', $Key);


$Date		= date("d.m.Y H:i");
$Str		= strtotime($Date);


$result = db_result_to_array(DB::Query("SELECT * FROM `ResetPayPass` WHERE `id_user` = '".$id_user."'  ORDER BY `id` DESC LIMIT 1"));

$res = db_result_to_array(DB::Query("SELECT `login`, `user` FROM `users` WHERE `id` = '".$id_user."'"));
        $user = $res[0]['user'];
        $login = $res[0]['login'];



(string)$DBhash = $result[0]['hash'];
$idOperation    = $result[0]['id'];

$newpass = rand(1000, 9999);
$NewHash = $key_first."".$newpass."".$key_second;
(string)$NewHash = hash('ripemd320', $NewHash); 

if($DBhash === $hash){

    $result = DB::Query("UPDATE `PayPassStatus` SET `hashPass` = '".$NewHash."', `DateTime` = '".$Date."', `str` = '".$Str."' WHERE `id_user` = '".$id_user."'");
    if($result == true){
        
        DB::Query("UPDATE `ResetPayPass` SET `status` = '2' WHERE `id` = '".$idOperation."'");

        $error = '<p class="erok">Платежный пароль изменен!</p>';
        $status = 1;
    }else{
        $error = '<p class="er">Платежный пароль не сохранен! Повторите!</p>';
        $status = 0;
    }
}else{
      $status = 0;
    $error =  "<p class='er'>Несовпадение ключа!</p>";
}



	$res = array('error' => $error, 'status' => $status, 'pass' => $newpass);
                    $res = json_encode($res);
                    print $res;    



?>