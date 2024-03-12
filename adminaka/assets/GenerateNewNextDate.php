<?php
// Подключаем файл конфигурации
include "../../cfg.php";
//include "../../ini.php";


$count        = $_POST['count'];
$total_works  = $_POST['total_works'];
$dateOld      = $_POST['date'];
$time         = $_POST['time'];
$amountDay    = $_POST['amount'];
$period       = $_POST['period'];
$weekend      = $_POST['weekend'];


if($count <= $total_works){ 

  if($count == 1){
    $day_index = date("w", $date_start);

            if ($day_index == "0" || $day_index == "6" ) {
              $date = date_create($dateOld);
              date_add($date, date_interval_create_from_date_string('next monday'));
              $date_start = strtotime(date_format($date, 'Y-m-d'));
            }else{
              $date = date_create($dateOld);
              date_add($date, date_interval_create_from_date_string('1 days'));
              $date_start = strtotime(date_format($date, 'Y-m-d'));
            }
  }else{
    $i = 1;
            if ($day_index == "0" || $day_index == "6" ) {
              $date = date_create($dateOld);
              date_add($date, date_interval_create_from_date_string('next monday'));
              $date_start = strtotime(date_format($date, 'Y-m-d'));
            }else{
              $date = date_create($dateOld);
              date_add($date, date_interval_create_from_date_string('1 days'));
              $date_start = strtotime(date_format($date, 'Y-m-d'));
            }




      while ($i < $count) {

           $day_index = date("w", $date_start);

            if ($day_index == "0" || $day_index == "6" ) {
              $date_start = date("Y-m-d", $date_start);
              $date = date_create($date_start);
              date_add($date, date_interval_create_from_date_string('next monday'));
              $date_start = strtotime(date_format($date, 'Y-m-d'));
              //$date_start = strtotime($date_start);
            }else{
              $date_start = date("Y-m-d", $date_start);
              $date = date_create($date_start);
              date_add($date, date_interval_create_from_date_string('1 days'));
              $date_start = strtotime(date_format($date, 'Y-m-d'));
              ++$i;

                if($day_index == '5'){
                  $date_start = date("Y-m-d", $date_start);
                  $date = date_create($date_start);
                  date_add($date, date_interval_create_from_date_string('next monday'));
                  $date_start = strtotime(date_format($date, 'Y-m-d'));
                }
               
            }
      }

       
 } 

$NewDate = date("d.m.Y", $date_start)." ".$time.":00";
$NewDate= strtotime($NewDate);

$NewAmount = $amountDay * $count;

$NewAmount = number_format($NewAmount, 2, '.', '');
    
}


 $res = array('EndDate' => $NewDate, 'NewAmount' => $NewAmount);
$res = json_encode($res);
print $res;
?>