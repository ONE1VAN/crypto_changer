<?php
include "../../cfg.php";
include "../../ini.php";
if($_POST['action'] == 'output'){

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
        
        $res = db_result_to_array(DB::Query("SELECT `login` FROM `users` WHERE `user` = '".$login."'"));
            $email = $res[0]['login'];
                
            $new_date = explode('-', $date);
            $date = $new_date[2].'.'.$new_date[1].'.'.$new_date[0];
        $cfgPercentOut = cfgSET('cfgPercentOut');

        if($cfgPercentOut) {
                    $NewAmount = sprintf("%01.2f", $amount -(( $amount / 100) * $cfgPercentOut));
                }
                    $percent = $amount - $NewAmount; // размер вычтеного процента с суммы


        $str = strtotime($date." ".$time);
        $majak = 1;
        
        $dateW = date("d.m.Y");
        $timeW = date("H:i");
        
        
            $idPaySystem = db_result_to_array(DB::Query("SELECT `id` FROM `paysystems` WHERE `name` = '".$ps."'"));

            $ps = $idPaySystem[0]['id'];
        
        if(($status == 1) || ($status == 2)){
            $res = DB::Query("INSERT INTO `output` (`login`, `sum`, `total_amount`, `cfgPercentOut`, `purse`,  `paysys`, `date`, `status`, `dateW`, `timeW`) 
                    VALUES ('".$email."', '".$NewAmount."', '".$amount."', '".$percent."', '".$wallet."', '".$ps."', '".$str."', '".$status."',  '".$dateW."', '".$timeW."')");
        }else{
            $res = DB::Query("INSERT INTO `output` (`login`, `sum`, `total_amount`, `cfgPercentOut`, `purse`,  `paysys`, `date`, `status`) 
                    VALUES ('".$email."', '".$NewAmount."', '".$amount."', '".$percent."', '".$wallet."', '".$ps."', '".$str."', '".$status."')");
        }
        
        

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