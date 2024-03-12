<?

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
//Load Composer's autoloader
require '../../vendor/autoload.php';

function phpMail($email, $subject, $message, $name_sname){

    $mail = new PHPMailer(true); // Создаем экземпляр класса PHPMailer
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;//Enable verbose debug output
    //$mail->IsSMTP(); // Указываем режим работы с SMTP сервером
    $mail->Host       = 'zongcap.com';  // Host SMTP сервера: ip или доменное имя
   // $mail->SMTPDebug  = 2;  // Уровень журнализации работы SMTP клиента PHPMailer
    $mail->SMTPAuth   = true;  // Наличие авторизации на SMTP сервере
    $mail->Port       = 587;  // Порт SMTP сервера
    $mail->SMTPSecure = 'TLS';  // Тип шифрования. Например ssl или tls 
    $mail->CharSet="UTF-8"; // Кодировка обмена сообщениями с SMTP сервером 
    $mail->Username = 'support@zongcap.com'; // Имя пользователя на SMTP сервере 
    $mail->Password = 'Ybls4$yzp5)'; // Пароль от учетной записи на SMTP сервере
    $mail->AddAddress($email, $name_sname); // Адресат почтового сообщения 
    $mail->AddReplyTo('support@zongcap.com', 'ZHONGRONG CAPITAL'); // Альтернативный адрес для ответа
    $mail->SetFrom('support@zongcap.com', 'ZHONGRONG CAPITAL'); // Адресант почтового сообщения 
    $mail->Subject = htmlspecialchars($subject); // Тема письма 
    $mail->MsgHTML($message); // Текст сообщения 
    $mail->send();
 return true;  

}
include "../../cfg.php";
include "../../ini.php";
include "../modules/SendMailSmtpClass.php";


	function generator($case1, $case2, $case3, $case4, $num1) {
		$password = "";

		$small="abcdefghijklmnopqrstuvwxyz";
		$large="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$numbers="1234567890";
		$symbols="~!#$%^&*()_+-=/<>?|:@";
		// $symbols="~!#$%^&*()_+-=,./<>?|:;@";
		mt_srand((double)microtime()*1000000);

		for ($i=0; $i<$num1; $i++) {

			$type = mt_rand(1,4);
			switch ($type) {
			case 1:
				if ($case1 == "on") { $password .= $large[mt_rand(0,25)]; } else { $i--; }
				break;
			case 2:
				if ($case2 == "on") { $password .= $small[mt_rand(0,25)]; } else { $i--; }
				break;
			case 3:
				if ($case3 == "on") { $password .= $numbers[mt_rand(0,9)]; } else { $i--; }
				break;
			case 4:
				if ($case4 == "on") { $password .= $symbols[mt_rand(0,24)]; } else { $i--; }
				break;
			}
		}
		return $password;
	}


$Typeid 	= clear_data($_POST['Typeid']);
$OldPayment = clear_data($_POST['Payment']);
$IdUser 	= clear_data($_POST['User']);

$Date		= date("d.m.Y");
$Time		= date("H:i");
$Str		= strtotime($Date." ".$Time);


if($Typeid == 'pmRead'){
	$paysys = 'Perfect Money';
	$ABR 	= 'pm';
}elseif($Typeid == 'peRead'){
	$paysys = 'Payeer';
	$ABR 	= 'pe';
}elseif($Typeid == 'advRead'){
	$paysys = 'Advanced Cash';
	$ABR 	= 'adv';
}elseif($Typeid == 'btcRead'){
	$paysys = 'Bitcoin';
	$ABR 	= 'btc';
}elseif($Typeid == 'ethRead'){
	$paysys = 'Ethereum';
	$ABR 	= 'eth';
}elseif($Typeid == 'ltcRead'){
	$paysys = 'Litecoin';
	$ABR 	= 'ltc';
}

$result = db_result_to_array(DB::Query("SELECT `name_sname`, `$ABR`, `login`, `user` FROM `users` WHERE `id` = '".$IdUser."' AND `$ABR` = '".$OldPayment."'"));

if(empty($result)){
	print "<p class='er'>Операция не возможна!</p>";
	//print "<p class='erok'>Данные сохранены!</p>";
}else{

		$email  = $result[0]['login'];
		$user   = $result[0]['user'];
		$case1	= 'on';
        $case2	= 'on';
        $case3	= 'on';
        $case4	= 'on';
        $num1	= rand(15,28);
        $num2	= 1;
        
        $newpass = generator($case1, $case2, $case3, $case4, $num1);


    $subject = "Request to change the electronic wallet";
    $message = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>

</head>
<body style="font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif; margin:0; padding:0; color:#ffffff;">

<table width="100%"  cellpadding="0" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td style="padding:40px 0;">
                <!-- begin main block -->
                <table cellpadding="0" cellspacing="0" width="608" border="0" align="center">
                    <tbody>
                        <tr>
                            <td>
                                
                                <!-- begin wrapper -->
                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                    <tbody>            
                                        <tr>
                                            <td width="4" height="4" style="background:url(https://zongcap.com/assets/img_email/shadow-left-top.png) no-repeat 100% 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td colspan="3" rowspan="3" style="padding:0 0 30px;">
                                                <!-- begin content -->
                                                <img src="https://zongcap.com/assets/img_email/logo.png" width="407" height="100" style="display:block; border:0; margin: 0px auto;" alt="ZHONGRONG CAPITAL">
                                            <p style="margin:0 0 36px; text-align:center; font-size:14px; line-height:20px; text-transform:uppercase; color:#626658;">
                                                
                                            </p>
                                                <p style="margin:0 30px 33px;; text-align:center; text-transform:uppercase; font-size:20px; line-height:30px; font-weight:bold; color:#484a42;">
                                                    CHOOSING ZHONGRONG CAPITAL, YOU CHOOSE THE FUTURE!
                                                </p>
                                                <!-- begin articles -->
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tbody style="color:#500050 !important;">
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td colspan="3">
                                                                <p style="font-size:14px; line-height:22px; font-weight:bold; color:#333333; margin:0 0 5px;"><span href="#" style="color:#6c7e44; text-decoration:none;">Dear <b>'.$result[0]['name_sname'].'</b>!</span></p>
                                                                <p style="margin:0 0 35px; font-size:12px; line-height:18px; color: #500050 !important;"> 
                                                                You have sent a request to change the electronic wallet in your personal account. <br/>
                                                                </br>
                                                                To confirm the operation, send this code   to the technical support service, which is located in the lower right corner of the zongcap.com website.<br/>
<div style="margin:0px 10%;font-size:20px;border:1px solid #FFC107;border-radius: 10px;color: #fff; text-align:center;padding:10px;background: radial-gradient(277px 277px at 50% 50%,#003072db 0,#05214659 100%); box-shadow: 0 6px 14px #00061380;">
                                                                	<b>'.$newpass.'</b>
                                                                </div>
                                                                <br/>
                                                                <b>If you have not followed these steps, immediately inform the technical support on the site.</b><br/>
                                                                Thanks for using our site! <br/>
                                                                Best regards, Zhongrong Capital!<br/></p>
                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                        </tr>


                                                        
                                                    </tbody>
                                                </table>
                                                <!-- /end articles -->
                                                <p style="margin:0; border-top:2px solid #e5e5e5; font-size:5px; line-height:5px; margin:0 30px 29px;">&nbsp;</p>
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tbody>
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td>
                                                                <p style="margin:0 0 4px; font-weight:bold; color:#333333; font-size:14px; line-height:22px;">Hong Kong</p>
                                                                <p style="margin:0; color:#333333; font-size:11px; line-height:18px;">
                                                                    Unit 2308-11, 23/F Prosperity Tower, 39 Queen\'s Road Central, Central<br>
                                                                    Website: <a href="#" style="color:#6d7e44; text-decoration:none; font-weight:bold;">https://zongcap.com</a>
                                                                </p>
                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>

                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- end content --> 
                                            </td>

                                        </tr>
                                        
                                        
                                        <tr>
                                            <td width="4" style="background:url(https://zongcap.com/assets/img_email/shadow-left-center.png) repeat-y 100% 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td width="4" style="background:url(https://zongcap.com/assets/img_email/shadow-right-center.png) repeat-y 0 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                        </tr>
                                        

                                 
                                        <tr>
                                            <td width="4" height="4" style="background:url(https://zongcap.com/assets/img_email/shadow-bottom-corner-left.png) no-repeat 100% 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td width="4" height="4" style="background:url(https://zongcap.com/assets/img_email/shadow-bottom-left.png) no-repeat 100% 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td height="4" style="background:url(https://zongcap.com/assets/img_email/shadow-bottom-center.png) repeat-x 0 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td width="4" height="4" style="background:url(https://zongcap.com/assets/img_email/shadow-bottom-right.png) no-repeat 0 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td width="4" height="4" style="background:url(https://zongcap.com/assets/img_email/shadow-bottom-corner-right.png) no-repeat 0 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- end wrapper
                                <p style="margin:0; padding:34px 0 0; text-align:center; font-size:11px; line-height:13px; color:#333333;">
                                    Don‘t want to recieve further emails? You can unsibscribe <a href="#" style="color:#333333; text-decoration:underline;">here</a>
                                </p>-->
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- end main block -->
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>
';
$result = phpMail($email, $subject, $message, $name_sname);

		$key_first  = 'huifHUdf66((&&HG';
		$key_second = 'dfdDDW34#RFE#d23';
		$newpass 	= $key_first."".$newpass."".$key_second;
		$hash = hash('ripemd320', $newpass);


		$Comments = 'Инициализация изменение кошелька '.$paysys.' ('.$OldPayment.') с административной панели.';
		DB::Query("INSERT INTO `TempPayments` (`id_user`, `login`, `email`, `ABBR`, `OldPurse`, `hash`, `date`, `time`, `str`, `comments`) VALUES ('".$IdUser."', '".$user."', '".$email."', '".$ABR."','".$OldPayment."', '".$hash."', '".$Date."', '".$Time."', '".$Str."', '".$Comments."')");

		$error = '<p class="erok">Код успешно отправлен на почту <b style="color:red">'.$email.'</b>!</p>';
		$status = 1;



	$res = array('error' => $error, 'status' => $status);
                    $res = json_encode($res);
                    print $res;    

}

?>