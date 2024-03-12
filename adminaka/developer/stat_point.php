<?php
include "../../cfg.php";
include "../../ini.php";


$login_user   = $_POST['user'];

$income_depo_today          = $_POST['income_depo_today'];
$income_depo_all            = $_POST['income_depo_all'];
$income_bonus_today         = $_POST['income_bonus_today'];
$income_bonus_all           = $_POST['income_bonus_all'];
$income_partners_today      = $_POST['income_partners_today'];
$income_partners_all        = $_POST['income_partners_all'];




 $result = DB::Query("UPDATE `income_points` SET `income_depo_today` = '".$income_depo_today."', `income_depo_all` = '".$income_depo_all."', `income_bonus_today` = '".$income_bonus_today."', `income_bonus_all` = '".$income_bonus_all."', `income_partners_today` = '".$income_partners_today."', `income_partners_all` = '".$income_partners_all."' WHERE `login` = '".$login_user."'");

    if($result == true){
        $error = '<p class="erok">Статистика была успешно обновлена!</p>';
        $status = 1;
    }else{
        $error = '<p class="er">Статистика не была обновлена!</p>';
        $status = 0;
    }
    $res = array('error' => $error, 'status' => $status);
                    $res = json_encode($res);
                    print $res; 


?>