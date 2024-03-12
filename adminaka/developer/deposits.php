<?php
include "../../cfg.php";
include "../../ini.php";

if($_POST["action"] == "deposits") {

        $login          = $_POST['login'];
        $type           = $_POST['type'];
        $date_start     = $_POST['date_start'];
        $time_start     = $_POST['time_start'];
        $date_end       = $_POST['date_end'];
        $time_end       = $_POST['time_end'];
        $plan           = $_POST['plan'];
        $amount         = $_POST['amount'];
        $currency       = $_POST['currency'];
        $count          = $_POST['count'];
        $total_count    = $_POST['total_count'];
        $amountOutput   = $_POST['amountOutput'];
        $nextdate       = $_POST['nextdate'];
        $amountDay      = $_POST['amountDay'];
        $clear          = $_POST['clear'];

        $DepoActiv      = $_POST['DepoActiv'];
        $DepoClose      = $_POST['DepoClose'];
        $DepoCloseAll   = $_POST['DepoCloseAll'];


        $Total_amountPlus = $count * $amountDay;

        $Total_todayPlus  = $amountDay;

        $date_startStr = strtotime($date_start." ".$time_start.":00");
        $end = explode("-", $date_end);
        $end = $end[2].".".$end[1].".".$end[0]." ".$time_end;
        $endSTR = strtotime($end);
        $total_vip_amount = $total_count * $amountDay;
        $total_amount = ($total_count * $amountDay) + $amount;


        $query = db_result_to_array(DB::Query("SELECT * FROM `settings` WHERE `cfgname` = 'cfgStartDepoNumber'"));
        $newNumberContract = $query[0]['data'];


        if($clear == 1){
            $clear = 2;
        }else{
            $clear = 1;
        }
        
        if($DepoActiv == 1){
            $majak      = 0;
            $visible    = 0;
            $return     = 0;

        }elseif($DepoClose == 1){
            $majak      = 1;
            $visible    = 3;
            $return     = 2;

        }elseif($DepoCloseAll == 1){
            $majak      = 1;
            $visible    = 3;
            $return     = 1;

        }

          $plans = db_result_to_array(DB::Query("SELECT * FROM `plans` WHERE `id` = '".$plan."'"));

            $res = db_result_to_array(DB::Query('SELECT `id`, `login`, `point_balance`, `pm_balance`, `ref` FROM `users` WHERE `user` = "'.$login.'"'));
                    $id_user = $res[0]['id'];
                    $email = $res[0]['login'];
                    $uref = $res[0]['ref'];


                    if($plans[0]['back'] == 0){
                      $res = DB::Query("INSERT INTO `deposits` (`username`, `user`, `user_id`, `date`, `end`, `end_str`, `plan`, `sum`, `sum_bal`, `count`, `total_count`, `total_income`, `lastdate`, `nextdate`, `reinvest`, `bot`, `majak`, `visible`, `return_depo`, `ulog`, `pay`, `numberContract`) VALUES ('".$email."', '".$login."', '".$id_user."', '".$date_startStr."', '".$end."', '".$endSTR."', '".$plan."', '".$amount."', '".$amountOutput."', '".$count."', '".$total_count."', '".$total_vip_amount."', '0', '".$nextdate."', '0', '1', '".$majak."', '".$visible."', '".$return."', '".$email."', '".$currency."', '".$newNumberContract."')");
                    }else{
                      $res = DB::Query("INSERT INTO `deposits` (`username`, `user`, `user_id`, `date`, `end`, `end_str`, `plan`, `sum`, `sum_bal`, `count`, `total_count`, `total_income`, `lastdate`, `nextdate`, `reinvest`, `bot`, `majak`, `visible`, `return_depo`, `ulog`, `pay`, `numberContract`) VALUES ('".$email."', '".$login."', '".$id_user."', '".$date_startStr."', '".$end."', '".$endSTR."', '".$plan."', '".$amount."', '".$amountOutput."', '".$count."', '".$total_count."', '".$total_amount."', '0', '".$nextdate."', '".$amount."', '1', '".$majak."', '".$visible."', '".$return."', '".$email."', '".$currency."', '".$newNumberContract."')");
                    }

            

            $lid =   mysqli_insert_id(DB::$link);

            $NewNumber = $newNumberContract + 1;
            DB::Query("UPDATE `settings` SET `data` = '".$NewNumber."' WHERE `cfgname` = 'cfgStartDepoNumber'");

                if($currency == 'point'){
                    $symbol = 'k';
                }else{
                    $symbol = '$';
                }
          $paysys = 0;


          $result2 =   DB::Query('SELECT * FROM `plans` WHERE `id` = "'.$plan.'" LIMIT 1');
    
    $row2 =   mysqli_fetch_array($result2);
        
        $percent = $row2['percent'];
        $percent_to = $row2['percent_to'];
        $percent_toMinimazy = $row2['percent_to'] - cfgSET('cfgMaxPercentDown');
        $avarage = $row2['average_percent'];
        
        // $resq = db_result_to_array(DB::Query('SELECT `date_average_percent`, `statusIncomeMaxPercent` FROM `users` WHERE `id` = "'.$id_user.'"'));

        // $DateArray = unserialize($resq[0]['date_average_percent']);
        // $DataStatus = $resq[0]['statusIncomeMaxPercent'];
        // $dateTrans = date("d");

        //    for($i = 0; $i < 1; $i++){
        //        $rang = rand(1,101);
                                
        //         if(($rang < cfgSET('cfgAveragePercent')) || ($rang == cfgSET('cfgAveragePercent'))){
        //             $rand = $avarage;
        //         }elseif(in_array($dateTrans, $DateArray) && $DataStatus == 0){
        //             $rand = $percent_to;
        //                 DB::Query("UPDATE `users` SET `statusIncomeMaxPercent` = '1' WHERE `id` = '".$id_user."'");
        //         }else{
        //             $rand = randomFloat($percent, $percent_toMinimazy);
        //         }
                            
        //    }
           $rand = $avarage;
           $rand = number_format($rand, 2, '.', '');

          $p = sprintf('%01.2f', ($amount / "100") * $rand);

                     DB::Query('INSERT INTO `stat` (`user_id`, `id_depo`, `date`, `plan`, `sum`, `percent`, `amount_income`, `symbol`, `paysys`) VALUES ("'.$id_user.'", "'.$lid.'", "'.$nextdate.'", "'.$plan.'", "'.$amount.'", "'.$rand.'", "'.$p.'", "'.$symbol.'",  "'.$paysys.'")');

if($currency == 'usd'){

                
                        
            // Начисляем бонус

                  // Начисляем нашим "любимым" рефералам
          if($uref > 0) {


            // Подсчитываем кол-во уровней
            $countlvl =   mysqli_num_rows(DB::Query("SELECT * FROM `reflevels`"));

            if($countlvl) {
              $i    = 1;
              $uid  = $user_id;
              $query  = "SELECT * FROM `reflevels` ORDER BY `id` ASC";
              $result =   DB::Query($query);
              while($row =   mysqli_fetch_array($result)) {
                    if($i < $countlvl) {
              $lvlperc = $row['sum'];   // Процент уровня
              $ps    = ($amount / 100) * $lvlperc; // Сумма рефских

                 if($uref) {

                 $dateR = date("d.m.Y");
                           $timeR = date("H:i");

                 $logins =   DB::Query("SELECT `login`, `ref_level`  FROM `users` WHERE `id` = '".$uref."'");
                           $loginsT   = mysqli_fetch_assoc($logins);
                           $ref_level = $loginsT['ref_level'];
                           $loginR    = $loginsT['login'];

                           // $login    = логин реферала открывшего депозит
                           // $loginR   = логин рефовода
                           // $sum      = сумма депозита
                           // $ps       = сумма реф. отчислений
                           // $dateR    = дата начисления
                           // $timeR    = время начисления
                           if($i < $ref_level || $i == $ref_level){

                    // Смотрим есть ли индивидуальный процент у данного реферала
                    $get_refp =   DB::Query("SELECT `login`, `user`, `ref_percent`, `pm_balance`, `point_balance`, `ref_money`, `ref_level` FROM `users` WHERE `id` = '".intval($uref)."' LIMIT 1");
                    $rowrefp  =   mysqli_fetch_array($get_refp);
                                    $urefp            = $rowrefp['ref_percent'];
                                    $new_pm_balance   = $rowrefp['pm_balance'];
                                    $new_ref_balance  = $rowrefp['ref_money'];
                                    $Ref_Level_True   = $rowrefp['ref_level'];
                                    $point_balance    = $rowrefp['point_balance'];
                                    $NewRefLevelId    = $Ref_Level_True + 1;

                                    $NewEmailLevel    = $rowrefp['login'];
                                    $NewEmailUser     = $rowrefp['user'];

                    if($urefp > 0) {
                      $ps = $amount / 100 * $urefp; // Сумма рефских
                    }

                                    $new_pm_balance   = $new_pm_balance + $ps;
                                    $new_ref_balance  = $new_ref_balance + $ps;

                      DB::Query('UPDATE `users` SET `pm_balance` = "'.$new_pm_balance.'", `ref_money` = "'.$new_ref_balance.'"  WHERE `id` = "'.$uref.'" LIMIT 1');

                                      $user_info = db_result_to_array(DB::Query("SELECT `income_partners_all`, `income_partners_today` FROM `users` WHERE `login` = '".$loginR."'"));
                                        $income_partners_all = $user_info[0]['income_partners_all'] + $amount;
                                        $income_partners_today = $user_info[0]['income_partners_today'] + $amount;

                                        DB::Query ('UPDATE `users` SET `income_partners_usd` = `income_partners_usd` + "'.$amount.'" WHERE `login` = "'.$loginR.'" LIMIT 1');

                                            DB::Query("UPDATE `users` SET `income_partners_all` = '".$income_partners_all."', `income_partners_today` = '".$income_partners_today."' WHERE `login` = '".$loginR."'");

                                                $res = db_result_to_array(DB::Query("SELECT `income_partners_today`, `income_partners_all` FROM `income_usd` WHERE `login` = '".$NewEmailLevel."'"));
                                                    $all_income_today = $res[0]['income_partners_today'] + $ps;
                                                    $all_income_all   = $res[0]['income_partners_all'] + $ps;

                                                $resP = db_result_to_array(DB::Query("SELECT `income_partners_today`, `income_partners_all` FROM `income_points` WHERE `login` = '".$NewEmailLevel."'"));
                                                    $all_income_todayP = $resP[0]['income_partners_today'] + $ps;
                                                    $all_income_allP   = $resP[0]['income_partners_all'] + $ps;
                                                   

                                                $res = db_result_to_array(DB::Query("SELECT `income_partners_point`, `income_partners_usd` FROM `users` WHERE `login` = '".$NewEmailLevel."'"));
                                                    $income_partners_usd     = $res[0]['income_partners_usd'];
                                                    $income_partners_point   = $res[0]['income_partners_point'];

                                                    $income = $income_partners_usd +  $income_partners_point;

                                            /*бонус за открытие новой реферальной линии при достижении нужного оборота*/
                                            $new_Ref_level = mysqli_fetch_assoc(DB::Query("SELECT * FROM `reflevels` WHERE `id` = '".$NewRefLevelId."'"));
                                                    $new_Ref_levels = $new_Ref_level['amount_open'];
                                                    $new_Ref_bonus = $new_Ref_level['bonus'];

                                                        $new_point_balance = $point_balance + $new_Ref_bonus;
                                                            if(($income > $new_Ref_levels) || ($income == $new_Ref_levels)){
                                                                $NewDateRef = date('d.m.Y');
                                                                $NewTimeRef = date('H:i');
                                                                $NewStrRef  = strtotime($NewDateRef." ".$NewTimeRef);

                                                              DB::Query("UPDATE `users` SET `point_balance` = '".$new_point_balance."' WHERE `id` = '".$uref."'");
                                                              DB::Query("UPDATE `users` SET `ref_level` = '".$NewRefLevelId."' WHERE `id` = '".$uref."'");
                                                              $title = 'Бонус за открытие реферального уровня';
                                                              DB::Query("INSERT INTO `bonus_history` (`login`, `email`, `amount`, `title`, `date`, `time`, `str`) VALUES ('".$NewEmailUser."', '".$NewEmailLevel."', '".$new_Ref_bonus."', '".$title."', '".$NewDateRef."', '".$NewTimeRef."', '".$NewStrRef."')");
                                                              DB::Query("UPDATE `income_points` SET `income_bonus_today` = `income_bonus_today`+ '".$new_Ref_bonus."', `income_bonus_all` = `income_bonus_all` + '".$new_Ref_bonus."' WHERE `login` = '".$loginR."'");
                                                            }
                                            /*бонус за открытие новой реферальной линии при достижении нужного оборота*/


                                                      DB::Query("UPDATE `income_usd` SET `income_partners_today` = '".$all_income_today."', `income_partners_all` = '".$all_income_all."' WHERE `login` = '".$loginR."'");
                                                      DB::Query("INSERT INTO `ref_stat` (`login`, `loginR`, `sum`, `ps`, `dateR`, `timeR`, `pay`) VALUES ('".$email."', '".$loginR."', '".$amount."', '".$ps."', '".$dateR."', '".$timeR."', '".$currency."')");
                                                      $new = db_result_to_array(DB::Query("SELECT `id`, `amount_point`, `amount_usd` FROM `infoReferals` WHERE `login_referals` = '".$email."' AND `login_refer` = '".$loginR."'"));
                                                            $usd        = $ps;
                                                            $point      = 0;

                                                            $sqlU       = $amount;
                                                            $sql_pointP = 0;
                                                        
                                                        if(count($new) == 0){

                                                                DB::Query("INSERT INTO `infoReferals` (`login_referals`, `login_refer`, `amount_point`, `amount_usd`, `last_depoPoint`, `last_depoUsd`) VALUES ('".$email."', '".$loginR."', '".$point."', '".$usd."', '".$sql_pointP."', '".$sqlU."')");   
                                                            }else{
                                                                $amount_point   = $new[0]['amount_point'] + $point;
                                                                $amount_usd     = $new[0]['amount_usd'] + $usd;
                                                                DB::Query("UPDATE `infoReferals` SET `amount_point` = '".$amount_point."', `amount_usd` = '".$amount_usd."', `last_depoPoint` = '".$sql_pointP."', `last_depoUsd` = '".$sqlU."' WHERE `login_referals` = '".$email."' AND `login_refer` = '".$loginR."'");
                                                            }


                                        ++$i;

                                 }


                                        // Получаем данные следующего пользователя

                        $get_ref  =   DB::Query("SELECT `id`, `ref` FROM `users` WHERE `id` = '".$uref."' LIMIT 1");
                        $rowref   =   mysqli_fetch_assoc($get_ref);

                        $uref   = $rowref['ref'];
                        $uid    = $rowref['id'];


                  }
                            }
              }

            }
          }


            }else{
                   

                   
            // Начисляем бонус



                  // Начисляем нашим "любимым" рефералам
if($uref > 0) {


                    // Подсчитываем кол-во уровней
                    $countlvl =   mysqli_num_rows(DB::Query("SELECT * FROM `reflevels`"));

                    if($countlvl) {
                        $i      = 1;
                        $uid    = $user_id;
                        $query  = "SELECT * FROM `reflevels` ORDER BY `id` ASC";
                        $result =   DB::Query($query);
                        while($row =   mysqli_fetch_array($result)) {
                    if($i < $countlvl) {
                            $lvlperc = $row['sum'];     // Процент уровня
                            $ps      = ($amount / 100) * $lvlperc; // Сумма рефских

                   if($uref) {

                           $dateR = date("d.m.Y");
                           $timeR = date("H:i");

                           $logins =   DB::Query("SELECT `login`, `ref_level`  FROM `users` WHERE `id` = '".$uref."'");
                           $loginsT =   mysqli_fetch_assoc($logins);
                           $ref_level  = $loginsT['ref_level'];
                           $loginR  = $loginsT['login'];

                           // $login    = логин реферала открывшего депозит
                           // $loginR   = логин рефовода
                           // $sum      = сумма депозита
                           // $ps       = сумма реф. отчислений
                           // $dateR    = дата начисления
                           // $timeR    = время начисления
                           if($i < $ref_level || $i == $ref_level){

                                    // Смотрим есть ли индивидуальный процент у данного реферала
                                    $get_refp   =   DB::Query("SELECT `login`, `user`, `ref_percent`, `pm_balance`, `point_balance`, `ref_point`, `ref_level` FROM `users` WHERE `id` = '".intval($uref)."' LIMIT 1");
                                    $rowrefp    =   mysqli_fetch_array($get_refp);
                                    $urefp      = $rowrefp['ref_percent'];
                                    $new_pm_balance     = $rowrefp['point_balance'];
                                    $new_ref_balance    = $rowrefp['ref_point'];
                                    $Ref_Level_True     = $rowrefp['ref_level'];
                                    $point_balance      = $rowrefp['point_balance'];
                                    $NewRefLevelId      = $Ref_Level_True + 1;

                                    $NewEmailLevel      =$rowrefp['login'];
                                    $NewEmailUser       =$rowrefp['user'];

                                    if($urefp > 0) {
                                        $ps = $amount / 100 * $urefp; // Сумма рефских
                                    }

                                    $new_pm_balance     = $new_pm_balance + $ps;
                                    $new_ref_balance    = $new_ref_balance + $ps;

                                      DB::Query('UPDATE `users` SET `point_balance` = "'.$new_pm_balance.'", `ref_point` = "'.$new_ref_balance.'"  WHERE `id` = "'.$uref.'" LIMIT 1');

                                      $user_info = db_result_to_array(DB::Query("SELECT `income_partners_all`, `income_partners_today` FROM `users` WHERE `login` = '".$loginR."'"));
                                        $income_partners_all = $user_info[0]['income_partners_all'] + $amount;
                                        $income_partners_today = $user_info[0]['income_partners_today'] + $amount;

                                        DB::Query ('UPDATE `users` SET `income_partners_point` = `income_partners_point` + "'.$amount.'" WHERE `login` = "'.$loginR.'" LIMIT 1');

                                            DB::Query("UPDATE `users` SET `income_partners_all` = '".$income_partners_all."', `income_partners_today` = '".$income_partners_today."' WHERE `login` = '".$loginR."'");

                                                $res = db_result_to_array(DB::Query("SELECT `income_partners_today`, `income_partners_all` FROM `income_points` WHERE `login` = '".$NewEmailLevel."'"));
                                                    $all_income_today = $res[0]['income_partners_today'] + $ps;
                                                    $all_income_all   = $res[0]['income_partners_all'] + $ps;

                                                $resP = db_result_to_array(DB::Query("SELECT `income_partners_today`, `income_partners_all` FROM `income_points` WHERE `login` = '".$NewEmailLevel."'"));
                                                    $all_income_todayP = $resP[0]['income_partners_today'] + $ps;
                                                    $all_income_allP   = $resP[0]['income_partners_all'] + $ps;
                                                   

                                                $res = db_result_to_array(DB::Query("SELECT `income_partners_point`, `income_partners_usd` FROM `users` WHERE `login` = '".$NewEmailLevel."'"));
                                                    $income_partners_usd     = $res[0]['income_partners_usd'];
                                                    $income_partners_point   = $res[0]['income_partners_point'];

                                                    $income = $income_partners_usd +  $income_partners_point;

                                            /*бонус за открытие новой реферальной линии при достижении нужного оборота*/
                                            $new_Ref_level = mysqli_fetch_assoc(DB::Query("SELECT * FROM `reflevels` WHERE `id` = '".$NewRefLevelId."'"));
                                                    $new_Ref_levels = $new_Ref_level['amount_open'];
                                                    $new_Ref_bonus = $new_Ref_level['bonus'];

                                                        $new_point_balance = $point_balance + $new_Ref_bonus;
                                                            if(($income > $new_Ref_levels) || ($income == $new_Ref_levels)){
                                                                $NewDateRef = date('d.m.Y');
                                                                $NewTimeRef = date('H:i');
                                                                $NewStrRef  = strtotime($NewDateRef." ".$NewTimeRef);

                                                              DB::Query("UPDATE `users` SET `point_balance` = '".$new_point_balance."' WHERE `id` = '".$uref."'");
                                                              DB::Query("UPDATE `users` SET `ref_level` = '".$NewRefLevelId."' WHERE `id` = '".$uref."'");
                                                              $title = 'Бонус за открытие реферального уровня';
                                                              DB::Query("INSERT INTO `bonus_history` (`login`, `email`, `amount`, `title`, `date`, `time`, `str`) VALUES ('".$NewEmailUser."', '".$NewEmailLevel."', '".$new_Ref_bonus."', '".$title."', '".$NewDateRef."', '".$NewTimeRef."', '".$NewStrRef."')");
                                                              DB::Query("UPDATE `income_points` SET `income_bonus_today` = `income_bonus_today`+ '".$new_Ref_bonus."', `income_bonus_all` = `income_bonus_all` + '".$new_Ref_bonus."' WHERE `login` = '".$loginR."'");
                                                            }
                                            /*бонус за открытие новой реферальной линии при достижении нужного оборота*/


                                                      DB::Query("UPDATE `income_points` SET `income_partners_today` = '".$all_income_today."', `income_partners_all` = '".$all_income_all."' WHERE `login` = '".$loginR."'");
                                                      DB::Query("INSERT INTO `ref_stat` (`login`, `loginR`, `sum`, `ps`, `dateR`, `timeR`, `pay`) VALUES ('".$email."', '".$loginR."', '".$amount."', '".$ps."', '".$dateR."', '".$timeR."', '".$currency."')");
                                                     $new = db_result_to_array(DB::Query("SELECT `id`, `amount_point`, `amount_usd` FROM `infoReferals` WHERE `login_referals` = '".$email."' AND `login_refer` = '".$loginR."'"));
                                                            $usd        = 0;
                                                            $point      = $ps;

                                                            $sqlU       = 0;
                                                            $sql_pointP = $amount;;
                                                        
                                                        if(count($new) == 0){

                                                                DB::Query("INSERT INTO `infoReferals` (`login_referals`, `login_refer`, `amount_point`, `amount_usd`, `last_depoPoint`, `last_depoUsd`) VALUES ('".$email."', '".$loginR."', '".$point."', '".$usd."', '".$sql_pointP."', '".$sqlU."')");   
                                                            }else{
                                                                $amount_point   = $new[0]['amount_point'] + $point;
                                                                $amount_usd     = $new[0]['amount_usd'] + $usd;
                                                                DB::Query("UPDATE `infoReferals` SET `amount_point` = '".$amount_point."', `amount_usd` = '".$amount_usd."', `last_depoPoint` = '".$sql_pointP."', `last_depoUsd` = '".$sqlU."' WHERE `login_referals` = '".$email."' AND `login_refer` = '".$loginR."'");
                                                            }


                                        ++$i;

                                 }


                                        // Получаем данные следующего пользователя

                                        $get_ref    =   DB::Query("SELECT `id`, `ref`FROM `users` WHERE `id` = '".$uref."' LIMIT 1");
                                        $rowref     =   mysqli_fetch_assoc($get_ref);

                                        $uref       = $rowref['ref'];
                                        $uid        = $rowref['id'];


                                }
                            }
                        }

                    }
              
            }

          

        
                }







        if($currency == 'point'){
            $res = db_result_to_array(DB::Query("SELECT  `income_depo_all` FROM `income_points` WHERE `login` = '".$email."'"));

                $all_income_all   = $res[0]['income_depo_all'] + $Total_amountPlus;
                    DB::Query("UPDATE `income_points` SET  `income_depo_all` = '".$all_income_all."' WHERE `login` = '".$email."'");
        }else{
            $res = db_result_to_array(DB::Query("SELECT `income_depo_all` FROM `income_usd` WHERE `login` =  '".$email."'"));

                $all_income_all   = $res[0]['income_depo_all'] + $Total_amountPlus;
                    DB::Query("UPDATE `income_usd` SET  `income_depo_all` = '".$all_income_all."' WHERE `login` = '".$email."'");
        }
            
        
        
        $user_info = db_result_to_array(DB::Query("SELECT `total_income`, `today_income` FROM `users` WHERE `id` = '".$id_user."'"));
            $all_income = $user_info[0]['total_income'] + $Total_amountPlus;
        
                 DB::Query("UPDATE `users` SET `total_income` = '".$all_income."' WHERE `id` = '".$id_user."'"); 


                        if($currency == 'usd'){
                            $res = db_result_to_array(DB::Query("SELECT `income_partners_usd` FROM `users` WHERE `login` = '".$email."'"));
                                                    $all_income_today = $res[0]['income_partners_usd'] + $amount;

                            DB::Query("UPDATE `users` SET `income_partners_usd` = '".$all_income_today."' WHERE `login` = '".$email."'");
                        }else{
                            $res = db_result_to_array(DB::Query("SELECT `income_partners_point` FROM `users` WHERE `login` = '".$email."'"));
                                                    $all_income_today = $res[0]['income_partners_point'] + $amount;

                            DB::Query("UPDATE `users` SET `income_partners_point` = '".$all_income_today."' WHERE `login` = '".$email."'");
                        }






        if($res == true){
            $error = "<p class=\"erok\">Депозит успешно создан</div>";
            $status = 2;
        } else {
            $error = "<p style='background:red'>Депозит не был создан</div>";
            $status = 1;
        }

        $res = array('error' => $error, 'status' => $status, 'clear' => $clear);
        $res = json_encode($res);
        print $res;

    }
?>