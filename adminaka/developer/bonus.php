<?php
include "../../cfg.php";
include "../../ini.php";

if($_POST["action"] == "bonus") {



        $login = htmlspecialchars($_POST['login']);
        $date = $_POST['date'];
        $time = $_POST['time'];
        $clear = $_POST['clear'];
        $d_t = strtotime($date." ".$time);
        $new_date = explode('-', $date);
            $date = $new_date[2].'.'.$new_date[1].'.'.$new_date[0];


        if($clear == 1){
            $clear = 2;
        }else{
            $clear = 1;
        }
        
        $res = db_result_to_array(DB::Query('SELECT `login`, `pm_balance`, `point_balance` FROM `users` WHERE `user` = "'.$login.'"'));
                    $balance = $res[0]['point_balance'];
                    $email = $res[0]['login'];


        $amount = $_POST['amount'];
        $title  = $_POST['title'];
        $descr  = $_POST['desc'];
    
        if($title == 11){
                 $sql = db_result_to_array(DB::Query("SELECT  `income_bonus_all` FROM `income_usd` WHERE `login` = '".$email."'"));
                    $NewAll     = $sql[0]['income_bonus_all'] + $amount;
            
            if(empty($_POST['desc'])){
                $res = db_result_to_array(DB::Query('SELECT `description` FROM `bonus_list` WHERE `id` = "'.$title.'"'));
                    $description = $res[0]['description'];
                        DB::Query("INSERT INTO `bonus_history` (`login`, `email`, `amount`, `title`, `date`, `time`, `str`) 
                            VALUES ('".$login."', '".$email."', '".$amount."', '".$description."', '".$date."', '".$time."', '".$d_t."')");
            }else{
                    DB::Query("INSERT INTO `bonus_history` (`login`, `email`, `amount`, `title`, `date`, `time`, `str`) 
                            VALUES ('".$login."', '".$email."', '".$amount."', '".$descr."', '".$date."', '".$time."', '".$d_t."')");
                
            }
                
                     DB::Query("UPDATE `income_usd` SET  `income_bonus_all` = '".$NewAll."' WHERE `login` = '".$email."'");
        }else{


            $sql = db_result_to_array(DB::Query("SELECT  `income_bonus_all` FROM `income_points` WHERE `login` = '".$email."'"));
                    $NewAll     = $sql[0]['income_bonus_all'] + $amount;
            
            if(empty($_POST['desc'])){
                $res = db_result_to_array(DB::Query('SELECT `description` FROM `bonus_list` WHERE `id` = "'.$title.'"'));
                    $description = $res[0]['description'];
                        DB::Query("INSERT INTO `bonus_history` (`login`, `email`, `amount`, `title`, `date`, `time`, `str`) 
                            VALUES ('".$login."', '".$email."', '".$amount."', '".$description."', '".$date."', '".$time."', '".$d_t."')");
            }else{
                    DB::Query("INSERT INTO `bonus_history` (`login`, `email`, `amount`, `title`, `date`, `time`, `str`) 
                            VALUES ('".$login."', '".$email."', '".$amount."', '".$descr."', '".$date."', '".$time."', '".$d_t."')");
                
            }
                
                     DB::Query("UPDATE `income_points` SET  `income_bonus_all` = '".$NewAll."' WHERE `login` = '".$email."'");
        }

           

                    if($res == true){
                        $error = "<p class=\"erok\">Бонус успешно начислен</div>";
                        $status = 2;
                    } else {
                        $error = "<p class=\"erok\">Бонусы не были начислены</div>";
                        $status = 1;
                    }


                    
                    $res = array('error' => $error, 'status' => $status, 'clear' => $clear);
                    $res = json_encode($res);
                    print $res;      
            
      
    }
?>