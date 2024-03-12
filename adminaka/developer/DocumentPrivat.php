<?php
include "../../cfg.php";
include "../../ini.php";
require_once("../../appPrivat.php");

if(isset($_POST['type']) && $_POST['type'] == 'privat'){

    $uri = AdressURL;
    $email_company = AdminEmail;

	$nubmber = clear_data($_POST['number']);
	$dateStart = clear_data($_POST['dateStart']);
	$dateEnd = clear_data($_POST['dateEnd']);
	$invoice = clear_data($_POST['invoice']);
	$mounth = clear_data($_POST['mounth']);
	$nameSname = clear_data($_POST['nameSname']);
	$birthday = clear_data($_POST['birthday']);
	$phone = clear_data($_POST['phone']);
	$email = clear_data($_POST['email']);

    $dateS = explode("-", $dateStart);
    $newDateStart = $dateS[2].".".$dateS[1].".".$dateS[0];
    $dayStart = $dateS[2];
    $year     = $dateS[0];
    $mounth_number = $dateS[1];

    $dateE = explode("-", $dateEnd);
    $newDateEnd = $dateE[2].".".$dateE[1].".".$dateE[0];


           $arrayParamas = array(
                                                'uri' => $uri,
                                                'number' => $nubmber,
                                                'invoice' => $invoice,
                                                'mounth' => $mounth,
                                                'nameSname' => $nameSname,
                                                'birthday' => $birthday,
                                                'phone' => $phone,
                                                'email' => $email,
                                                'dateStart' => $newDateStart,
                                                'dateEnd' => $newDateEnd,
                                                'day' => $dayStart,
                                                'year' => $year,
                                                'mounth_number' => $mounth_number,
                                                'email_company' => $email_company
                                            );



$d = newPDFPrivat($arrayParamas);

$outputFilePDF = 'Private_Deal_Agreement_'.$nubmber.'.pdf';;

$filename = $_SERVER['DOCUMENT_ROOT'] . '/documentPrivatPdf/'.$outputFilePDF;

	if(file_exists($filename)){
        $error = "<font color=\"green\">Договор успешно сгенерирован</font><br />";
        $status = 2;

    }else{
        $error = "<font color=\"red\">Ошибка генерации договора</font><br />";
        $status = 1;
    }
}else{
        $error = "<font color=\"red\">Форма временно не доступна</font><br />";
        $status = 1;
}

$res = array('error' => $error, 'status' => $status);
        $res = json_encode($res);
        print $res;


?>