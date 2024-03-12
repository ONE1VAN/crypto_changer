<?php
include "../../cfg.php";
include "../../ini.php";

        (int)$id_transaction = htmlspecialchars($_POST['id']);
        (int)$id_user  = htmlspecialchars($_POST['user']);
        $date =  date('d.m.Y H:i');

            $res  = DB::Query("INSERT  INTO `TransactonPointNotVisible`  (`id_user`, `id_transaction`, `date_and_time`)  VALUES  ('".$id_user."', '".$id_transaction."',  '".$date."')");

            DB::Query("UPDATE  `transaction_points`  SET  `NotVisible`  =  '1' WHERE `id`  = '".$id_transaction."'");

            if($res  == true){
                print "Заявка  успешно  скрыта";
            }else{
                print "Произошла ошибка при операции";
            }

?>