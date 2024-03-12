<?php
include "../../cfg.php";
include "../../ini.php";

if($_POST['action'] == 'enter'){

        $login      = $_POST['login'];
        $date       = $_POST['date'];
        $time       = $_POST['time'];
        $amount     = $_POST['amount'];
        $ps         = $_POST['ps'];
        $wallet     = $_POST['wallet'];
        $status     = $_POST['status'];
        $clear      = $_POST['clear'];
        
        if($clear == 1){
            $clear = 2;
        }else{
            $clear = 1;
        }
        
        $str = strtotime($date." ".$time);
        $majak = 1;
        $new_date = explode('-', $date);
            $date = $new_date[2].'.'.$new_date[1].'.'.$new_date[0];


        $res = db_result_to_array(DB::Query("SELECT `login` FROM `users` WHERE `user` = '".$login."'"));
            $email = $res[0]['login'];
                
            // $idPaySystem = db_result_to_array(DB::Query("SELECT `id` FROM `paysystems` WHERE `name` = '".$ps."'"));

            // $ps = $idPaySystem[0]['id'];
        
        $res = DB::Query("INSERT INTO `enter` (`login`, `sum`, `date`, `status`, `majak`, `purse`, `paysys`) 
                    VALUES ('".$email."', '".$amount."', '".$str."', '".$status."', '".$majak."', '".$wallet."', '".$ps."')");
        
        if($res == true){
            $error = "<font color=\"green\">Успешно добавлено</font><br />";
            $status = 2;
        } else {
            $error = "<font color=\"red\">Ошибка</font><br />";
            $status = 1;
        }

        $res = array('error' => $error, 'status' => $status, 'clear' => $clear);
        $res = json_encode($res);
        print $res;
    }
?>
