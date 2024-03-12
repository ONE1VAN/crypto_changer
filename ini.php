<?php


ob_start();


date_default_timezone_set("Europe/Kirov");

 function clear_data($data)
    {
        $data = trim(htmlspecialchars($data));
        return $data;
    }
 /*функции проверки на целое число*/    
function isInteger($input){
    return(ctype_digit(strval($input)));
}
  // cортировка многомерного масива (передавать значение ключа по каком сортируем)  
    function build_sorter($key) {
        return function ($a, $b) use ($key) {
            return strnatcmp($a[$key], $b[$key]);
        };
    } 	
/// Функция для обрезки символов в строке
    function str_size($str, $num)
    {
        $str = iconv('UTF-8','windows-1251', $str);
        $str = substr($str, 0, $num);
        $str = iconv('windows-1251', 'UTF-8', $str);
        return $str;
    }
	function db_result_to_array($result)
    {
        $res_array = array();
        
        $count = 0;
        
        while($row = mysqli_fetch_assoc($result))
        {
            $res_array[$count] = $row;
            $count++;
        }
        return $res_array;
    }
    
    function generate_ref_hash(){
        
            $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        
            $rand_str = ''; 
            
            $desired_length = 8; 
            
            while(strlen($rand_str) < $desired_length) $rand_str .= substr(str_shuffle($charset), 0, 1); 
            
            return $rand_str;
    }
 
    function as_html($cjcfggidhc) {
        $cjcfggidhc = htmlspecialchars($cjcfggidhc, ENT_QUOTES, '');
        
        return $cjcfggidhc;
    }

    function getip() {
        if (getenv('HTTP_CLIENT_IP')) {
            $cfgdicbjdd = getenv('HTTP_CLIENT_IP');
            
        }
        else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $cfgdicbjdd = getenv('HTTP_X_FORWARDED_FOR');
                
            }
            else {
                $cfgdicbjdd = getenv('REMOTE_ADDR');
                
            }
	    }

        $cfgdicbjdd = htmlspecialchars(substr($cfgdicbjdd, 0, 15), ENT_QUOTES, '');
        
        return $cfgdicbjdd;
    }

function as_md5($dcidgfffj, $chbjifbfgj) {
	$chbjifbfgj = md5($dcidgfffj.md5('Z&'.$dcidgfffj.'x_V'.htmlspecialchars($chbjifbfgj, ENT_QUOTES, '')));
	
	return $chbjifbfgj;
}

function Location ($p1) {
    if (!$p1) $p1 = $_SERVER['HTTP_REFERER'];
    exit(header('Location: '.$p1));
}


function ReturnSTR($date, $time){
    $date = $date;
    $time = $time;
    $str = strtotime($date.' '.$time);
    return $str;
}

function ReturnNumberDay($date){
    $date = $date;
    $number = date("N", strtotime($date));
    return $number;
}

function ReturnDateStart($date){
    $date = $date;
    $number = date("N", strtotime($date));
    return $number;
}



session_start();

$login = $_SESSION['user'];

$sid = htmlspecialchars(substr(session_id(), 0, 32 ), ENT_QUOTES, '');

$key2 = 'Z201OlC1985';


             


if (!$login) {
	if ($_COOKIE['adminstation1']) {
		$get_user = DB::Query('SELECT `login`, `pass`, `mail` FROM `users` WHERE `id` = "'.intval($_COOKIE['adminstation1']).'" LIMIT 1');
		
		$row = mysqli_fetch_array($get_user);
		
		
		$login = $row['login'];
		
		$pass = $row['pass'];
		
		
		$user_pass = as_md5($key, $pass . $key . $login);

		if ($_COOKIE['adminstation2'] == $user_pass) {
			$_SESSION['user'] = $login;
		}
		else {
			$login = '';
		}
	}
}


if ($login) {

	$get_user_info = DB::Query('SELECT * FROM `users` WHERE `login` = "'.$login.'" LIMIT 1');
	
	$row = mysqli_fetch_array($get_user_info);
	
	
	$user_id = $row['id'];
	
	$login = $row['login'];
	
	$user_pass = $row['pass'];
	
	
	$status = $row['status'];
	


    // if(!isset($_COOKIE['Time'])){
    //     setcookie("Time", 2, time()+900);
    // }
	

	DB::Query('UPDATE `users` SET `ip` = "'.getip().'" WHERE `id` = "'.$user_id.'" LIMIT 1');
	if ($status == 3) {
		include('service_file/includes/errors/banlogin.php');
		exit();
	}
} else {
	$user_id = 0;
	$login = '';
	$user_pass = '';
	$user_mail = '';
}


      


$url = $_SERVER['SERVER_NAME'];

$url = str_replace('www.', '', $url);

$url = str_replace('http://', '', $url);

$url = str_replace('https://', '', $url);


?>
