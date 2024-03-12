<?php
ignore_user_abort(true);
set_time_limit(0);
include "../../cfg.php";
include "../../ini.php";

if($_POST['action'] == 'renameLogin'){

        $id         = $_POST['id'];
        $NewLogin   = $_POST['NewLogin'];
        $OldLogin   = $_POST['OldLogin'];
       


        $res = db_result_to_array(DB::Query("SELECT `login` FROM `users` WHERE `id` = '".$id."' AND `user` = '".$OldLogin."' LIMIT 1"));
        $NewRes = db_result_to_array(DB::Query("SELECT `id` FROM `users` WHERE `user` = '".$NewLogin."' LIMIT 1"));

          if(count($NewRes) > 0){
            $logs = 1;
          }else if(count($res) > 0){
                 $result = DB::Query("UPDATE `users` SET `user` = '".$NewLogin."' WHERE `user` = '".$OldLogin."' AND `id` = '".$id."'");
                    DB::Query("UPDATE `bonus_history` SET `login` = '".$NewLogin."' WHERE `login` = '".$OldLogin."'");
                    DB::Query("UPDATE `CountDepositsplan` SET `login` = '".$NewLogin."' WHERE `login` = '".$OldLogin."'");
                    DB::Query("UPDATE `CountUserReferals` SET `login` = '".$NewLogin."' WHERE `login` = '".$OldLogin."'");
                    DB::Query("UPDATE `deposits` SET `user` = '".$NewLogin."' WHERE `user` = '".$OldLogin."'");
                    DB::Query("UPDATE `documents` SET `login` = '".$NewLogin."' WHERE `login` = '".$OldLogin."'");
                    DB::Query("UPDATE `enter_robot` SET `login_user` = '".$NewLogin."' WHERE `login_user` = '".$OldLogin."'");
                    DB::Query("UPDATE `PointBalanceHistory` SET `login` = '".$NewLogin."' WHERE `login` = '".$OldLogin."'");
                    DB::Query("UPDATE `robot_buy` SET `login_user` = '".$NewLogin."' WHERE `login_user` = '".$OldLogin."'");
                    DB::Query("UPDATE `robot_buy_level` SET `login_user` = '".$NewLogin."' WHERE `login_user` = '".$OldLogin."'");
                    DB::Query("UPDATE `robot_invoice` SET `login` = '".$NewLogin."' WHERE `login` = '".$OldLogin."'");
                    DB::Query("UPDATE `StoryLevelIncome` SET `login_user` = '".$NewLogin."' WHERE `login_user` = '".$OldLogin."'");
                    $logs = 2;
          }
        
        
        if($res == true && $logs === 1){
            $error = "<p class='er'>Этот логин уже используется</p>";
            $status = 3;
            $NewLog = $OldLogin;
        }else if($res == true && $logs == 2){
            $error = "<p class=\"erok\">Логин успешно изменен</p>";
            $status = 2;
            $NewLog = $NewLogin;
        }else {
            $error = "<p class='er'>Логин не изменен</p>";
            $status = 1;
            $NewLog = $OldLogin;
        }

        $res = array('error' => $error, 'status' => $status, 'NewLogin' => $NewLog);
        $res = json_encode($res);
        print $res;
    }
?>
