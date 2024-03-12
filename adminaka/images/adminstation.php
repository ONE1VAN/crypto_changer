<?php
/*
Данный скрипт разработан Михайленко Виктором Леонидовичем, далее автор.
Любое использование данного скрипта, разрешено только с письменного согласия автора.
Скрипт защещён законом: http://adminstation.ru/images/docs/doc1.jpg
Дата разработки: 14.10.2007 г. - Модернизирован 17.04.2009 г.

-> Главный файл программы AdminStation
*/

include "../cfg.php";
include "../ini.php";
include "../service_file/SendMailSmtpClass.php";
if($status == 1 || $status == 2) {
	$sum = 0.0000;
  


$query	= "SELECT * FROM users";
$result	= mysql_query($query);
while($row = mysql_fetch_array($result)) {
	$sum = $sum + $row['pm_balance'];
}

$dep	= 0.00;
$query	= "SELECT * FROM deposits WHERE status = 0 AND visible = 0";
$result	= mysql_query($query);
while($row = mysql_fetch_array($result)) {
	$dep = $dep + $row['sum'];
}

$count_sum_out	= 0.00;
$query	= "SELECT * FROM output WHERE status = 0";
$result	= mysql_query($query);
while($row = mysql_fetch_array($result)) {
	$count_sum_out = $count_sum_out + $row['sum'];
}

$out	= 0.00;
$query	= "SELECT * FROM output WHERE status = 2";
$result	= mysql_query($query);
while($row = mysql_fetch_array($result)) {
	$out = $out + $row['sum'];
}

$outw	= 0.00;
$count_out = 0;
$query	= "SELECT * FROM output WHERE status = 0";
$result	= mysql_query($query);
while($row = mysql_fetch_array($result)) {
	$outw = $outw + $row['sum'];
    $count_put = $count_put + 1;
}
//считаем сумму по депозитам без учета реферальных
$deyout	= 0.00;
$query	= "SELECT * FROM deposits WHERE status = 0 AND visible = 0";
$result	= mysql_query($query);
while($row = mysql_fetch_array($result)) {

	$result2	= mysql_query("SELECT * FROM plans WHERE id = ".$row['plan']." LIMIT 1");
	$row2		= mysql_fetch_array($result2);

	$deyout = $deyout + $row['sum'] / 100 * $row2['percent'];

}
//считаем сумму по депозитам с учетом реферальных
$deyoutRef	= 0.00;
$deyoutRefs	= 0.00;
$queryRef	= "SELECT * FROM `deposits` WHERE `status` = '0' AND `majak` = '0' AND `visible` = '0' AND `return_depo` = '0'";

$resultRef	= mysql_query($queryRef);
while($rowRef = mysql_fetch_array($resultRef)) {

	$result2	= mysql_query("SELECT * FROM `plans` WHERE `id` = '".$rowRef['plan']."' LIMIT 1");
	$row2		= mysql_fetch_array($result2);

	$deyoutRef = $deyoutRef + $rowRef['sum'] / 100 * $row2['percent']; // получаем доход по депо

	$deyoutRefs = $deyoutRef / 100 * $rowRef['ref']; // получаем реф

}

// Создаем уровень
if($_GET['act'] == "addreflevel") {
	$level		= intval($_POST['level']);
	$percent	= sprintf ("%01.2f", str_replace(',', '.', $_POST['percent']));

	if($level < 1) {
		print '<p class="er">Введите уровень реферальной системы</p>';
	} elseif($percent < 0.01 || $percent > 100) {
		print '<p class="er">Процент должен быть от 0.01 до 100</p>';
	} else {
		mysql_query('INSERT INTO reflevels (id, sum) VALUES ('.$level.', '.$percent.')');
		print '<p class="erok">Новый реферальный уровень - добавлен!</p>';
	}
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Система управления проектом «<?php print $cfgURL; ?>»</title>
<link href="files/favicon.ico" type="image/x-icon" rel="shortcut icon">
<link href="files/styles.css" rel="stylesheet" type="text/css" />
<script src="files/jquery.js"></script>
<script language="JavaScript">
<!--
function popUP(url,width,height) {
	if(!width) { width = 780; }
	if(!height) { height = 450; }
	var posx = 200;
	var posy = 200;
	var w=window.open(url,'wind','left='+posx+',top='+posy+',width='+width+',height='+height+',status:no, help:no');
	return false;
}
//-->
</script>
</head>
<body>

<table align="center" width="990" height="100%" border="0" cellpadding="0" cellspacing="0">
	<tr height="65">
		<td>
			<table align="center" width="990" height="65" border="0" cellpadding="0" cellspacing="0">
				<tr valign="top">
					<td><a href="adminstation.php"><img src="images/logo.jpg" width="202" height="65" alt="CMS AdminStation" border="0" /></a></td>
					<td width="30"><a href="/" target="_blank"><img src="images/home.gif" width="30" height="48" border="0" alt="Перейти на главную страницу сайта" title="Перейти на главную страницу сайта" /></a></td>
					<td width="10"></td>
					
					
					<td width="30"><img style="cursor: pointer;" onclick="if(confirm('Вы действительно хотите выйти?')) top.location.href='/exit.php';" src="images/exit.gif" width="30" height="48" border="0" alt="Выход" title="Выход" /></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="1">
			<table class="menu">
				<tr>
					<td><a class="menutop" href="?a=settings">Настройки проекта</a></td>
					<td><a class="menutop" href="?a=users">Управление пользователями</a></td>
                    <td><a class="menutop" href="?a=blacklist">Черный список IP</a></td>
                    <td><a class="menutop" href="?a=logip">Мониторинг IP</a></td>
                   
				</tr>

				<tr>
                    <td><a class="menutop" href="?a=paysystems">Платежные системы</a></td>
					<td><a class="menutop" href="?a=plans">Инвестиционные планы</a></td>
                    <td><a class="menutop" href="?a=deposits">Депозиты</a></td>
                    <td><a class="menutop" href="?a=menu">Редактор меню</a></td>
				</tr>
				<tr>
                    <td><a class="menutop" href="?a=edit">Вывод средств</a></td>
	                <td><a class="menutop" href="?a=edit&s=2">Пополнение счета</a></td>
                    <td><a class="menutop" href="?a=ref">Реферальные уровни</a></td>
					<td><a class="menutop" href="?a=testimonials">Отзывы</a></td>
					
				</tr>
   	            <tr>
                     <td><a class="menutop" href="?a=fin">Финансовые операции</a></td>
                     <td><a class="menutop" href="?a=news">Добавить новость</a></td>
                     <td><a class="menutop" href="?a=new">Новости</a></td>
                     <td><a class="menutop" href="?a=graf">График</a></td>
				</tr>
                <tr>
                     <td><a class="menutop" href="?a=product">Товары</a></td>
                     <td><a class="menutop" href="?a=zakaz">Заказы</a></td>
                     <td><a class="menutop" href="#">########</a></td>
                     <td><a class="menutop" href="#">########</a></td>
				</tr>
				
			</table>
		</td>
	</tr>

	<tr>
		<td height="5"></td>
	</tr>
	<tr>
		<td valign="top" style="border-radius: 4 4 0 0px; padding: 10 10 10 10px; border: 1px solid #547898; background:URL(images/logo_down.jpg) no-repeat bottom right;">
<?php
$a	= substr(addslashes(htmlspecialchars($_GET['a'], ENT_QUOTES, '')), 0, 15);

	if(!$a) {
		include "modules/index.php";
	} elseif(file_exists("modules/".$a.".php")) {
		include "modules/".$a.".php";
	} else {
		include "modules/error.php";
	}

?>&nbsp;
		</td>
	</tr>
	<tr height="33" bgcolor="#5e87a9">
		<td align="center" style="color: #ffffff;">&copy; 2007-<?php print date(Y); ?> CMS <a style="color: #ffffff;" href="http://adminstation.ru/" target="_blank">AdminStation</a> v4.0<br />
		Все права защищены!</td>
	</tr>
</table>



</body>
</html>
<?php
} else {
print "<html><head><script language=\"javascript\">top.location.href='index.php';</script></head><body><a href=\"index.php\"><b>Index</b></a></body></html>";
}
?>