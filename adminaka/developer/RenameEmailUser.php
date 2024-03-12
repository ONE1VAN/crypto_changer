<?php
ignore_user_abort(true);
set_time_limit(0);
include "../../cfg.php";
include "../../ini.php";

if($_POST['action'] == 'renameEmail'){

        $id         = $_POST['id'];
        $OldEmail   = $_POST['OldEmail'];
        $NewEmail   = $_POST['NewEmail'];
       


        $res = db_result_to_array(DB::Query("SELECT `login` FROM `users` WHERE `id` = '".$id."' AND `login` = '".$OldEmail."' LIMIT 1"));
        $NewRes = db_result_to_array(DB::Query("SELECT `id` FROM `users` WHERE `login` = '".$NewEmail."' LIMIT 1"));

          if(count($NewRes) > 0){
            $logs = 1;
          }else if(count($res) > 0){
                 $result = DB::Query("UPDATE `users` SET `login` = '".$NewEmail."', `mail` = '".$NewEmail."' WHERE `login` = '".$OldEmail."' AND `id` = '".$id."'");

                    DB::Query("UPDATE `bonus_history` SET `email` = '".$NewEmail."' WHERE `email` = '".$OldEmail."'");
                    DB::Query("UPDATE `CountDepositsplan` SET `login` = '".$NewEmail."' WHERE `email` = '".$OldEmail."'");
                    DB::Query("UPDATE `CountUserReferals` SET `login` = '".$NewEmail."' WHERE `mail` = '".$OldEmail."'");
                    DB::Query("UPDATE `deposits` SET `username` = '".$NewEmail."', `ulog` = '".$NewEmail."' WHERE `username` = '".$OldEmail."'");
                    DB::Query("UPDATE `documents` SET `email` = '".$NewEmail."' WHERE `email` = '".$OldEmail."'");
                    DB::Query("UPDATE `enter` SET `login` = '".$NewEmail."' WHERE `login` = '".$OldEmail."'");
                    DB::Query("UPDATE `enter_robot` SET `login` = '".$NewEmail."' WHERE `login` = '".$OldEmail."'");
                    DB::Query("UPDATE `history_payments` SET `login` = '".$NewEmail."' WHERE `login` = '".$OldEmail."'");
                    DB::Query("UPDATE `income_points` SET `login` = '".$NewEmail."' WHERE `login` = '".$OldEmail."'");
                    DB::Query("UPDATE `income_usd` SET `login` = '".$NewEmail."' WHERE `login` = '".$OldEmail."'");
                    DB::Query("UPDATE `infoReferals` SET `login_referals` = '".$NewEmail."' WHERE `login_referals` = '".$OldEmail."'");
                    DB::Query("UPDATE `infoReferals` SET `login_refer` = '".$NewEmail."' WHERE `login_refer` = '".$OldEmail."'");
                    DB::Query("UPDATE `output` SET `login` = '".$NewEmail."' WHERE `login` = '".$OldEmail."'");
                    DB::Query("UPDATE `PointBalanceHistory` SET `email` = '".$NewEmail."' WHERE `email` = '".$OldEmail."'");
                    DB::Query("UPDATE `points_buy` SET `login_to` = '".$NewEmail."' WHERE `login_to` = '".$OldEmail."'");
                    DB::Query("UPDATE `points_buy` SET `login_from` = '".$NewEmail."' WHERE `login_from` = '".$OldEmail."'");
                    DB::Query("UPDATE `points_sell` SET `login_from` = '".$NewEmail."' WHERE `login_from` = '".$OldEmail."'");
                    DB::Query("UPDATE `points_sell` SET `login_from` = '".$NewEmail."' WHERE `login_from` = '".$OldEmail."'");
                    DB::Query("UPDATE `ref_stat` SET `login` = '".$NewEmail."' WHERE `login` = '".$OldEmail."'");
                    DB::Query("UPDATE `ref_stat` SET `loginR` = '".$NewEmail."' WHERE `loginR` = '".$OldEmail."'");
                    DB::Query("UPDATE `robot_buy` SET `login` = '".$NewEmail."' WHERE `login` = '".$OldEmail."'");
                    DB::Query("UPDATE `robot_buy_level` SET `login` = '".$NewEmail."' WHERE `login` = '".$OldEmail."'");
                    DB::Query("UPDATE `robot_invoice` SET `login_user` = '".$NewEmail."' WHERE `login_user` = '".$OldEmail."'");
                    DB::Query("UPDATE `robot_tranzit` SET `login` = '".$NewEmail."' WHERE `login` = '".$OldEmail."'");
                    DB::Query("UPDATE `StoryLevelIncome` SET `login` = '".$NewEmail."' WHERE `login` = '".$OldEmail."'");
                    DB::Query("UPDATE `transaction_points` SET `login` = '".$NewEmail."' WHERE `login` = '".$OldEmail."'");
                    $logs = 2;
          }
        
        
        if($res == true && $logs === 1){
            $error = "<p class='er'>Этот E-mail уже используется</p>";
            $status = 3;
            $NewLog = $OldEmail;
        }else if($res == true && $logs == 2){
            $error = "<p class=\"erok\">E-mail успешно изменен</p>";
            $status = 2;
            $NewLog = $NewEmail;
        }else {
            $error = "<p class='er'>E-mail не изменен</p>";
            $status = 1;
            $NewLog = $OldEmail;
        }

        $res = array('error' => $error, 'status' => $status, 'NewEmail' => $NewLog);
        $res = json_encode($res);
        print $res;
    }
?>
