<?php
include "../../cfg.php";
include "../../ini.php";

    if($_POST["action"] == "pay_robot") {
        $login = htmlspecialchars($_POST['login']);
        $date  = $_POST['date'];
        $time  = $_POST['time'];
        $amount = $_POST['amount'];
        $percent = $_POST['percent'];
        $clear = $_POST['clear'];

        if($clear == 1){
            $clear = 2;
        }else{
            $clear = 1;
        }
        
        $TotalAmount = $_POST['totalAmount'];
        $level = $_POST['level'];

        $res = db_result_to_array(DB::Query("SELECT `id`, `login` FROM `users` WHERE `user` = '".$login."'"));

            $id_user = $res[0]['id'];
            $log_user = $res[0]['login'];

                $date = explode('-',$date);
                $NewDate = $date[2].".".$date[1].".".$date[0]." ".$time.":00";
                $NewDateSTR = strtotime($NewDate);
                $date_time = $date[2].".".$date[1].".".$date[0]." ".$time;
               DB::Query("INSERT INTO `robot_invoice` (`id_user`, `login_user`, `login`, `LevelRobot`, `percent`, `invoice`, `amount`,`AmountWork`,  `date`, `str`) VALUES ('".$id_user."', '".$log_user."', '".$login."', '".$level."', '".$percent."', '".$percent."', '".$amount."', '".$TotalAmount."', '".$date_time."', '".$NewDateSTR."')");


        if($res == true){
            $error = "<p class=\"erok\">Начисление робота успешно</div>";
            $status = 2;
        } else {
            $error = "<p class=\"erok\">Начисление робота не успешно</div>";
            $status = 1;
        }

        $res = array('error' => $error, 'status' => $status, 'clear' => $clear);
        $res = json_encode($res);
        print $res;
    }
?>