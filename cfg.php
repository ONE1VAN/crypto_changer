<?php

 

//Error_Reporting(0);

include('db.php');



	$cfgURL						= $_SERVER['HTTP_HOST'];						// URL ресурса

	$chmod						= "755";						// Права папкам на запись





// Данные лицензии. Следующие переменные после установки скрипта НЕ МЕНЯТЬ!





  $licID				= 743;										// ID лицензионной копии



  $key					= "0W40-0N6E-W0HT-7863";					// Лицензионный ключ



  $mdhash				= "434dc8a33d7f9c85eb44fdf778619802";		// MD5 hash







// Соединение с БД

/*

if (!($conn = mysqli_connect($hostname, $mysql_login , $mysql_password,$database))) {



	include "./service_file/includes/errors/db.php";



	exit();



} else {



	if (!( mysqli_select_db(DB::$link, $database))) {



		include "./service_file/includes/errors/db.php";



		exit();



	}



}*/



// Конец соединения с БД









   DB::Query("SET NAMES utf8");







// Check if magic_quotes_runtime is active

if(get_magic_quotes_runtime())

{

    // Deactivate

    set_magic_quotes_runtime(false);

}



@set_time_limit(0);



@ini_set('max_execution_time',0);



@ini_set('output_buffering',0);



$safe_mode = @ini_get('safe_mode');



$version = "1.24";



function cutStr($str, $lenght = 100, $end = '...', $charset = 'UTF-8', $token = '~') {

    $str = strip_tags($str);

    if (mb_strlen($str, $charset) >= $lenght) {

        $wrap = wordwrap($str, $lenght, $token);

        $str_cut = mb_substr($wrap, 0, mb_strpos($wrap, $token, 0, $charset), $charset);    

        return $str_cut .= $end;

    } else {

        return $str;

    }

}



function truncation($str, $length){ 

$str=substr($str, 0, $length-2);        //Обрезаем до заданной длины 

$words=explode(" ", $str);                //Разбиваем по словам 

array_splice($words,-1);                //Удаляем последнее слово 



$last=array_pop($words);                //Получаем последнее слово 



for ($i=1; $i<strlen($last); $i++) { 

 //Ищем и удаляем в конце последнего слова все кроме букв и цифр 

 if (preg_match('/\W$/',substr($last,-1,1))) $last=substr($last,0,strlen($last)-1); 

 else break; 

} 

return implode(" ", $words).' '.$last.'...'; 

}  



if(version_compare(phpversion(), '4.1.0') == -1) {



 $_POST   = &$HTTP_POST_VARS;



 $_GET    = &$HTTP_GET_VARS;



 $_SERVER = &$HTTP_SERVER_VARS;



}







if (@get_magic_quotes_gpc()) {



	foreach ($_POST as $k=>$v) {



		$_POST[$k] = stripslashes($v);



	}



	foreach ($_SERVER as $k=>$v) {



		$_SERVER[$k] = stripslashes($v);



	}



}







define('ACCESS', true);



?>