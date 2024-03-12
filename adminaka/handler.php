<?php
 
// Подключаем файл конфигурации
include "../cfg.php";
include "../ini.php";
 
    $Name = $_POST['search'];
    $type = $_POST['types'];

    if($type === 'users' || $type === 'users_depo' || $type === 'users_bonus' || $type === 'fin1' || $type === 'fin2' || $type === 'fin3' || $type === 'fin4' || $type === 'fin5' || $type === 'fin6' || $type === 'fin7' || $type === 'point1' || $type === 'point2' || $type === 'point3' || $type === 'robot1' || $type === 'robot2' || $type === 'robot3' || $type === 'robot4' || $type === 'Notification'){
        $ExecQuery = db_result_to_array(DB::Query("SELECT `user`, `login` FROM `users` WHERE `user` LIKE '%$Name%' OR  `login` LIKE '%$Name%'  LIMIT 5"));
    }else{
        $ExecQuery = db_result_to_array(DB::Query("SELECT `user` FROM `users` WHERE `user` LIKE '%$Name%' LIMIT 5"));
    }

    $array = array();
        foreach ($ExecQuery as $res) {
            if($res['user'] == ""){
                $array[] = $res['login'];
            }else{
                $array[] = $res['user'];
            }
        }

    echo '<ul class="list_search_block">';

if(!empty($array)){
    foreach($array as $Result){
?>

        <li onclick='fill_<?php print $type;?>("<?php echo $Result; ?>")' class="item_list_search">
            <a><?php print $Result; ?></a>
        </li>
 
<?php 
        } 
    }else{
?>
        <li class="item_list_search">
            <a style="color:red">Результат не найден!</a>
        </li>
<? } ?>
    </ul>