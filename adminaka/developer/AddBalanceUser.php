<?php
ignore_user_abort(true);
set_time_limit(0);
include "../../cfg.php";
include "../../ini.php";

if($_POST['action'] == 'addBalance'){

        $id             = $_POST['id'];
        $OldBalance     = $_POST['OldBalance'];
        $Amount         = $_POST['Amount'];

        $NewBalance  = $OldBalance + $Amount;



                       $result = DB::Query("UPDATE `users` SET `pm_balance` = '".$NewBalance."' WHERE `id` = '".$id."' LIMIT 1");





       if($result == true){
            $error = "<p class=\"erok\">Баланс успешно обновлён</p>";
            $status = 2;
        }else {
            $error = "<p class='er'>Баланс не изменен</p>";
            $status = 1;
        }

        $res = array('error' => $error, 'status' => $status);
        $res = json_encode($res);
        print $res;
}
?>
