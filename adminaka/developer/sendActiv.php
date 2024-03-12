<?php
include "../../cfg.php";
include "../../ini.php";

$id = $_GET['id'];


$res = db_result_to_array(DB::Query("SELECT `login`, `name_sname`, `user`, `pass` WHERE `id` = '".$id."'"));

$email = $res[0]['login'];
$log  = $res[0]['user'];
$name_sname = $res[0]['name_sname'];
$pass2 = $res[0]['pass'];


$subject = 'Confirmation of registration';
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
                                                <img src="https://zongcap.com/assets/img_email/logo.png" width="407" height="100" style="display:block; border:0; margin:0;margin: 0px auto;" alt="ZHONGRONG CAPITAL">
                                            <p style="margin:0 0 36px; text-align:center; font-size:14px; line-height:20px; text-transform:uppercase; color:#626658;">
                                                
                                            </p>
                                                <p style="margin:0 30px 33px;; text-align:center; text-transform:uppercase; font-size:20px; line-height:30px; font-weight:bold; color:#484a42;">
                                                    CHOOSING ZHONGRONG CAPITAL, YOU CHOOSE THE FUTURE!
                                                </p>
                                                <!-- begin articles -->
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tbody>
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td colspan="3">
                                                                <p style="font-size:14px; line-height:22px; font-weight:bold; color:#333333; margin:0 0 5px;"><span href="#" style="color:#6c7e44; text-decoration:none;">Dear, <b>'.$name_sname.'</b>!</span></p>
                                                                <p style="margin:0 0 35px; font-size:12px; line-height:18px; color:#333333;"> 
                                                                To confirm registration on the site <b>zongcap.com</b> <br/>follow this link <b><a href="https://'.$cfgURL.'/activate.php?m='.$email.'&h='.as_md5($key, $email).'">Activate<a/></b> <br/>
                                                                Your personal account data: <br/>
                                                                Login: <b>'.$log.'</b><br/>
                                                                Password: <b>'.$pass2.'</b><br/>
                                                                If you are unable to activate by clicking on the button, click the link below, or copy and paste it into your browser.</br></br>

                                                                <a href="https://'.$cfgURL.'/activate.php?m='.$email.'&h='.as_md5($key, $email).'">https://'.$cfgURL.'/activate.php?m='.$email.'&h='.as_md5($key, $email).'<a/>
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

                // $mailSMTP = new SendMailSmtpClass('zhoncap202@gmail.com', 'K8ZBszdYV2tQIgL9', 'smtp-relay.sendinblue.com', 587, "utf-8");
                 $mailSMTP = new SendMailSmtpClass('zongcap@gmail.com', 'Ybls4$yzp5)', 'smtp.gmail.com', 587, "utf-8");
                   
$from = array(
        "ZHONGRONG CAPITAL", // Имя отправителя
        "support@zongcap.com" // почта отправителя
    );
//$mailSMTP->addFile("test.jpg");
// отправляем письмо
$result =  $mailSMTP->send($email, $subject, $message, $from); 

if($result == true){
	print "ok";
}else{
	print "no";
}
?>