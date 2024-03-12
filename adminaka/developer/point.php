<?php
include "../../cfg.php";
include "../../ini.php";

if($_POST["action"] == "point") {



        $login = htmlspecialchars($_POST['login']);
        $date = $_POST['date'];
        $time = $_POST['time'];
        $division = $_POST['division'];
        $status = $_POST['status'];
        $clear = $_POST['clear'];

        if($clear == 1){
            $clear = 2;
        }else{
            $clear = 1;
        }
        

        $d_t = strtotime($date." ".$time);
        $new_date = explode('-', $date);
            $date = $new_date[2].'.'.$new_date[1].'.'.$new_date[0];


        $res = db_result_to_array(DB::Query('SELECT `id`, `login`, `point_balance` FROM `users` WHERE `user` = "'.$login.'"'));
                    $id_user = $res[0]['id'];
                    $email = $res[0]['login'];

        $amount = $_POST['amount'];
        $cfgCoursePoint = cfgSET('cfgCoursePoint');


            if($status == 0){
                    $resQ = db_result_to_array(DB::Query("SELECT `id` FROM `transaction_points` WHERE `bot` = '1' ORDER BY `id` DESC LIMIT '1'"));

                    $id_transaction = $resQ[0]['id'];
                    $login_to = $email;
                    $login_from = $email;

                    $res = DB::Query("INSERT INTO `points_buy` (`id_tranzaction`, `login_to`, `login_from`, `amount_point`, `amaunt_usd`, `date`, `time`, `str`) 
                            VALUES ('".$id_transaction."', '".$login_to."', '".$login_from."', '".$amount."', '".$amount."', '".$date."', '".$time."', '".$d_t."')");

                                    if($res == true){
                                        $error = "<p class=\"erok\">Транзакция на покупку успешна</div>";
                                        $status = 2;
                                    } else {
                                        $error = "<p class=\"erok\">Транзакция на покупку не успешна</div>";
                                        $status = 1;
                                    }

        $res = array('error' => $error, 'status' => $status, 'clear' => $clear);
        $res = json_encode($res);
        print $res;

            }elseif($status == 1){

                $resQ = db_result_to_array(DB::Query("SELECT `id` FROM `transaction_points` WHERE `bot` = '1' ORDER BY `id` DESC LIMIT '1'"));

                    $id_transaction = $resQ[0]['id'];
                    $login_to = $email;
                    $login_from = $email;

                    $res = DB::Query("INSERT INTO `points_sell` (`id_tranzaction`, `login_to`, `login_from`, `amount_point`, `amaunt_usd`, `date`, `time`, `str`) 
                            VALUES ('".$id_transaction."', '".$login_to."', '".$login_from."', '".$amount."', '".$amount."', '".$date."', '".$time."', '".$d_t."')");
                   

                                    if($res == true){
                                        $error = "<p class=\"erok\">Транзакция на продажу успешна</div>";
                                        $status = 2;
                                    } else {
                                        $error = "<p class=\"erok\">Транзакция на продажу не  успешна/div>";
                                        $status = 1;
                                    }

                                    $res = array('error' => $error, 'status' => $status, 'clear' => $clear);
                                    $res = json_encode($res);
                                    print $res;

            }elseif($status == 2){
                 $res = DB::Query("INSERT INTO `transaction_points` (`id_user`, `login`, `date`, `time`, `str`, `amount`, `amount_usd`, `division`) 
                            VALUES ('".$id_user."', '".$email."', '".$date."', '".$time."', '".$d_t."', '".$amount."', '".$amount."', '".$division."')");

                                if($res == true){
                                    $error = "<p class=\"erok\">Активная заявка успешно создана</div>";
                                    $status = 2;
                                } else {
                                    $error = "<p class=\"erok\">Активная заявка не была создана</div>";
                                    $status = 1;
                                }

                                $res = array('error' => $error, 'status' => $status, 'clear' => $clear);
                                $res = json_encode($res);
                                print $res;
            }
            
 
    }
?>