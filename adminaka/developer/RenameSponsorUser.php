<?php
ignore_user_abort(true);
set_time_limit(0);
include "../../cfg.php";
include "../../ini.php";

if($_POST['action'] == 'renameSponsor'){

        $id             = $_POST['id'];
        $OldSponsor     = $_POST['OldSponsor'];
        $NewSponsor     = $_POST['NewSponsor'];


       
        $resQ = db_result_to_array(DB::Query("SELECT `ref` FROM `users` WHERE `id` = '".$id."' LIMIT 1"));


        if($resQ[0]['ref'] == 0){
            $resNew = db_result_to_array(DB::Query("SELECT `id`, `count_partners` FROM `users` WHERE `user` = '".$NewSponsor."' LIMIT 1"));

                       $result = DB::Query("UPDATE `users` SET `ref` = '".$resNew[0]['id']."' WHERE `id` = '".$id."' LIMIT 1");


                    if(($resNew[0]['count_partners'] == "") || ($resNew[0]['count_partners'] == 0)){
                        $countParnters = 1;
                    }else{
                        $countParnters = $resNew[0]['count_partners'] + 1;
                    }
                       
                       DB::Query("UPDATE `users` SET `count_partners` = '".$countParnters."' WHERE `id` = '".$resNew[0]['id']."' LIMIT 1");

            $logs = 2;
        }elseif($resQ[0]['ref'] > 0){
            $res = db_result_to_array(DB::Query("SELECT `id`, `count_partners` FROM `users` WHERE `user` = '".$OldSponsor."' LIMIT 1"));
            $resNew = db_result_to_array(DB::Query("SELECT `id`, `count_partners` FROM `users` WHERE `user` = '".$NewSponsor."' LIMIT 1"));


                    $result = DB::Query("UPDATE `users` SET `ref` = '".$resNew[0]['id']."' WHERE `id` = '".$id."' LIMIT 1");

                    if(($resNew[0]['count_partners'] == "") || ($resNew[0]['count_partners'] == 0)){
                        $countParnters = 1;
                    }else{
                        $countParnters = $resNew[0]['count_partners'] + 1;
                    }

                    if(($res[0]['count_partners'] == "") || ($res[0]['count_partners'] == 0)){
                        $countParntersOld = 0;
                    }else{
                        $countParntersOld = $res[0]['count_partners'] - 1;
                            if($countParntersOld < 1 || $countParntersOld = ""){
                                $countParntersOld = 0;
                            }
                    }
                   
                       DB::Query("UPDATE `users` SET `count_partners` = '".$countParnters."' WHERE `id` = '".$resNew[0]['id']."' LIMIT 1");

                       DB::Query("UPDATE `users` SET `count_partners` = '".$countParntersOld."' WHERE `id` = '".$res[0]['id']."' LIMIT 1");

            $logs = 2;        
        }else{
            $logs = 1;
        }



       if((count($resQ) > 0) && ($logs == 2)){
            $error = "<p class=\"erok\">Спонсор успешно изменен на <span style='color:red'>".$NewSponsor."</span></p>";
            $status = 2;
            $NewLog = $NewSponsor;
        }else {
            $error = "<p class='er'>Спонсор не изменен</p>";
            $status = 1;
            $NewLog = $OldSponsor;
        }

        $res = array('error' => $error, 'status' => $status, 'NewSponsor' => $NewLog);
        $res = json_encode($res);
        print $res;
}
?>
