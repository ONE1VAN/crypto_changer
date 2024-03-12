<?
include "../../cfg.php";
include "../../ini.php";

if ($_POST['action'] == 'NewUser') {

    $login      = $_POST['login'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];


    $name     = $_POST['name'];
    $sname    = $_POST['sname'];
    $lname    = $_POST['lname'];

    $date           = $_POST['date'];
    $office           = $_POST['office'];

    $country        = $_POST['country'];
    $codeCountry    = $_POST['codeCountry'];
    $numberPhone    = $_POST['numberPhone'];
    $telegram       = $_POST['telegram'];


    $dateReg     = $_POST['dateReg'];
    $timeReg     = $_POST['timeReg'];

    $lastVisit     = $_POST['lastVisit'];
    $lastVisitTime = $_POST['lastVisitTime'];

    $sponsor     = $_POST['sponsor'];
    $TotalAmount = $_POST['TotalAmount'];
    $LastIncome  = $_POST['LastIncome'];

    
    $DateR = $lastVisit ;
    $clear      = $_POST['clear'];
    


    $hashPass  = as_md5($key, $password);

    $regTime = strtotime($dateReg." ".$timeReg);
    $lastVisit = strtotime($lastVisit." ". $lastVisitTime);

    $name_sname = $name . " " . $sname;

    $SymbolCode = db_result_to_array(DB::Query("SELECT `SymbolCode` FROM `codeCountry` WHERE `id` = '". $country."'"));

    $codeCountrySymbol = $SymbolCode[0]['SymbolCode'];


    if($sponsor){
        $IdSponsor = db_result_to_array(DB::Query("SELECT `id`, `login`, `bot` FROM `users` WHERE `user` = '" . $sponsor . "'"));
            $idSponsor = $IdSponsor[0]['id'];
            $EmailSponsor = $IdSponsor[0]['login'];
            $bot = $IdSponsor[0]['bot'];
    }else{
        $idSponsor = 0;
        $bot = 1;
    }

    $ip = $_SERVER['REMOTE_ADDR'];
   
    $checks = 1;

    $birth = explode("-", $date);
    $birthday = $birth[2]."." . $birth[1] . "." . $birth[0];

    $pay = "usd";
    


    $res = DB::Query("INSERT INTO `users` (`login`, `user`, `name`, `sname`, `lname`, `name_sname`, `birthday`, `pass`, `hash`, `mail`, `reg_time`, `go_time`, `outTime`, `ip`,  `ref`, `country_code`, `country_code_number`, `phone`, `telegramm`, `ActivationCode`, `active`, `bot`, `office`) VALUES ('". $email."', '". $login."', '". $name."', '". $sname."', '". $lname."', '". $name_sname."', '". $birthday."', '". $password."', '". $hashPass."', '". $email."',  '". $regTime."', '". $lastVisit."', '". $lastVisit."', '". $ip."', '". $idSponsor."',  '". $codeCountrySymbol."', '". $codeCountry."', '". $numberPhone."', '". $telegram."', NULL, 0, '".$bot."', '".$office."')");

    $lid =   mysqli_insert_id(DB::$link);


    /*REFERENCE HASH GENERATION AND CHECK FOR ITS UNIQUENESS*/
    $rand_str = generate_ref_hash();
    $uniq_ref_hash = db_result_to_array(DB::Query("SELECT `refid` FROM `users` WHERE `refid` = '" . $rand_str . "'"));

    if (!empty($uniq_ref_hash["0"]["refid"])) {

        while ($uniq_ref_hash["0"]["refid"] == $rand_str) {

            $rand_str = generate_ref_hash();
            $uniq_ref_hash = db_result_to_array(DB::Query("SELECT `refid` FROM `users` WHERE `refid` = '" . $rand_str . "'"));
        }
    }

    /*GENERATE NEW DATE MAX PERCENT ROBOT AND DEPO*/
    $countRand = cfgSET("cfgCountRandDay");

    $randDay = array();
    for ($i = 0; $i < $countRand;) {
        $rand = rand(1, 30);
        if ($rand < 10) {
            $rand = '0' . $rand;
        }

        $date = date("Y-m") . "-" . $rand;
        if ((date("N", strtotime($date)) != 6) && (date("N", strtotime($date)) != 7)) {
            if (!in_array($rand, $randDay)) {
                $randDay[] = $rand;
                ++$i;
            }
        }
    }

    $randDay = serialize($randDay);

    DB::Query("UPDATE `users` SET `date_average_percent` = '" . $randDay . "' WHERE `id` = '" . $lid . "'");


    /*END THIS CHECK*/
    DB::Query("UPDATE `users` SET `ref_hash` = '" . md5($lid) . "', `refid` = '" . $rand_str . "' WHERE `id` = '" . $lid . "'");

    DB::Query("INSERT INTO `income_points` (`login`) VALUES ('" . $email . "')");
    DB::Query("INSERT INTO `income_usd` (`login`) VALUES ('" . $email . "')");
    DB::Query("INSERT INTO `CountDepositsplan` (`id_user`, `login`, `email`) VALUES ('" . $lid . "', '" . $log . "', '" . $email . "')");
    DB::Query("INSERT INTO `readNotification` (`id_user`) VALUES ('" . $lid . "')");


    if($idSponsor > 0){
        DB::Query("INSERT INTO `infoReferals` (`login_referals`, `login_refer`, `amount_point`, `amount_usd`, `last_depoPoint`, `last_depoUsd`) VALUES ('".$email."', '". $EmailSponsor."', '0', '". $TotalAmount."', '0', '". $LastIncome."')");
        DB::Query("INSERT INTO `ref_stat` (`login`, `loginR`, `sum`, `ps`, `dateR`, `timeR`, `pay`) VALUES ('".$email."', '".$EmailSponsor."', '".$LastIncome."', '".$LastIncome."', '". $DateR."', '".$lastVisitTime."', 'usd')");
    }

    if ($clear == 1) {
        $clear = 2;
    } else {
        $clear = 1;
    }

   











    if ($res == true) {
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