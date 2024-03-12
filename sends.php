<?
include_once("db.php");

    $promo = $_POST["promo"];
    $receive = $_POST["receive"];
    $amount = $_POST["amount"];
    $send = $_POST["send"];
    $crSend = $_POST["crSend"];
    $crReceive = $_POST["crReceive"];
    $receive_address = $_POST["receive_address"];
    $email = $_POST["email"];

    $date = strtotime(date("d.m.Y H:i"));

    DB::Query("INSERT INTO `tranzactions`(`first_ps`, `second_ps`, `amount_first`, `amount_second`, `wallet`, `contact`, `date`) VALUES
    ('".$crSend."', '".$crReceive."', '".$amount."', '".$receive."', '".$receive_address."', '".$email."', '".$date."')");

        $lidsHistory =   mysqli_insert_id(DB::$link);

?>