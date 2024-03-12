<?php
// Подключаем файл конфигурации
include "../../cfg.php";
include "../../ini.php";


$dateOld    = $_POST['date'];
$time       = $_POST['time'];
$countDays  = $_POST['period'];
$weekend    = $_POST['weekend'];
$period     = $_POST['TypePeriod'];

$date = explode("-" ,$dateOld);
$date = $date[2].".".$date[1].".".$date[0];



$NewDate = $date." ".$time.":00";

                    if(cfgSET('datestart') <= time()) {
        				$weekend	= $weekend;
        				$day		= date("w", $date);
        			if($day == "0" && $weekend == "1") {
        					$nad = strtotime ("+1 day");
        				} elseif($day == "6" && $weekend == "1") {
                            $date =  date($NewDate, strtotime("next monday"));
        					$nad = strtotime ($date);
        				}elseif($day == "5" && $weekend == "1") {
                            $date =  date($NewDate, strtotime("next monday"));
        					$nad = strtotime ($date);
        				} else {
        					$nad = strtotime ("+1 day");
        				}
    
        				if($period == "1") {
        					$nextdate = $nad;
        				} elseif($period == "2") {
        					$nextdate = $nad;
        				} elseif($period == "3") {
        					$nextdate = $nad;
        				} elseif($period == "4") {
        					$nextdate = $nad;
        				}
                                   	} 
            
                    if($period == "1"){
                        //days
                        $end = date('d.m.Y', strtotime($date. ' +'.$countDays.' weekday'));
                        //$end = date("d.m.Y H:i", strtotime("+".$row['days']." day"));
                    }elseif($period == "2"){
                        //week
                        $end = date("d.m.Y H:i", strtotime("+".$countDays." week"));
                    }elseif($period == "3"){
                        //month
                        $end = date("d.m.Y H:i", strtotime("+".$countDays." month"));
                    }elseif($period == "4"){
                        //hours
                        $end = date("d.m.Y H:i", strtotime("+".$countDays." hours"));
                    }

                          $total_works   = $countDays;
                     
                    
                    
                      
                     $income = ($sum / 100 )* $row['percent'];
                     $income = number_format($income, 2, '.', '');
                     $total_income = $sum + ($income * $total_works);
                     $total_income = number_format($total_income, 2, '.', '');
                     $end_str = strtotime($end);

                     $dateE = explode(".", $end);
                     $dateEndInput = $dateE[2]."-".$dateE[1]."-".$dateE[0];
                     $timeEndInput = $time;
                     $dateEnd = $dateEnd[0]." ".$time.":00";
                     $dateEndstr = strtotime($dateEnd);


$res = array('total_works' => $total_works, 'dateEnd' => $dateEnd, 'EndStr' => $dateEndstr, 'nextdate' => $nextdate, 'dateEndInput' => $dateEndInput, 'timeEndInput' => $timeEndInput);
$res = json_encode($res);
print $res;
?>