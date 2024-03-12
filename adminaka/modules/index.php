

<script>

	document.title = 'Транзакции'

</script>

<script language="javascript" type="text/javascript" src="files/alt.js"></script>

<?php

	defined('ACCESS') or die();



if ($_GET['p'] == "active") {



	$sql = DB::Query('UPDATE `tranzactions` SET `status` = 2 WHERE `id` = "' . intval($_GET["id"]) . '" LIMIT 1');

	if ($sql) {

		print '<p class="erok">Средства по заявке были выплачены!</p>';

	} else {

		print '<p class="er">Ошибка записи в БД!</p>';

	}

}

?>



<style>

	.searchTR:hover {

		background: #9de9de;

	}

</style>



<hr />







<table class="tbl">



	<tr>

		<th width="40"><b>ID</b></th>

		<th><b>Отправляемая валюта</b></th>

		<th><b>Получаемая валюта</b></th>

		<th><b>Сумма получена</b></th>

		<th width="70"><b>Сума к выплате</b></th>

		<th width="70"><b>Курс обмена</b></th>

		<th width="70"><b>ФИО</b></th>

		<th width="70"><b>E-mail</b></th>

		<th width="90"><b>Кошелек для получения</b></th>

		<th width="90"><b>Дата</b></th>



		<th width="55"><b>Статус</b></th>

		<th width="140"><b>EDIT</b></th>

	</tr>

	<?php

	function users_list($page, $num, $query)

	{



		$result = DB::Query($query);

		$themes = mysqli_num_rows($result);



		if (!$themes) {

			print '<tr><td colspan="9" align="center"><font color="#ffffff"><b>Транзакций пока нет.</b></font></td></tr>';

		} else {



			$total = intval(($themes - 1) / $num) + 1;

			if (empty($page) or $page < 0) $page = 1;

			if ($page > $total) $page = $total;

			$start = $page * $num - $num;

			$result = DB::Query($query . " LIMIT " . $start . ", " . $num);

			while ($row = mysqli_fetch_array($result)) {

				

				print "

					<td>" . $row['id'] . "</td>

					<td>" . $row['first_ps'] . "</td>

					<td>" . $row['second_ps'] . "</td>

					<td>" . $row['amount_first'] . "</td>

					<td>" . $row['amount_second'] . "</td>
					
					<td>" . $row['course'] . "</td>

					<td>" . $row['fio'] . "</td>

					<td>" . $row['contact'] . "</td>

					<td>" . $row['wallet'] . "</td>

					<td>" . date('d.m.Y  H:i', $row['date']) . "</td>

					<td>";

				if ($row['status'] == "0") {

					print "<b style='color:red'>Не оплачено</b>";

				}elseif($row['status'] == "1"){

					print "<b style='color:orange'>Оплочено</b>";

				}else {

					print "<b style='color:green'>Выведено</b>";

				}

				print '</td>

				<td>

					<a href="?a=index&p=active&id=' . $row['id'] . '">

						<img src="images/status.png" width="16" height="16" border="0" alt="Подтвердить вывод">

					</a>



				</td>

				</tr>';

			}

			// <a href="?a=users&b=Ghost&i='.$row[id].'&ghost='.$ghost.'"><img src="images/help_ico.png" width="16" height="16" border="0" alt="Гостевой просмотр аккаунта пользователя"></a>

			if ($page != 1) $pervpage = "<a href=?a=index&sort=" . $_GET['sort'] . "&page=" . ($page - 1) . ">««</a>";

			if ($page != $total) $nextpage = " <a href=?a=index&sort=" . $_GET['sort'] . "&page=" . ($page + 1) . ">»»</a>";

			if ($page - 2 > 0) $page2left = " <a href=?a=index&sort=" . $_GET['sort'] . "&page=" . ($page - 2) . ">" . ($page - 2) . "</a> | ";

			if ($page - 1 > 0) $page1left = " <a href=?a=index&sort=" . $_GET['sort'] . "&page=" . ($page - 1) . ">" . ($page - 1) . "</a> | ";

			if ($page + 2 <= $total) $page2right = " | <a href=?a=index&sort=" . $_GET['sort'] . "&page=" . ($page + 2) . ">" . ($page + 2) . "</a>";

			if ($page + 1 <= $total) $page1right = " | <a href=?a=index&sort=" . $_GET['sort'] . "&page=" . ($page + 1) . ">" . ($page + 1) . "</a>";

			print "<tr><td height=\"20\" colspan=\"11\" class=\"ftr\"><b>Страницы: </b>" . $pervpage . $page2left . $page1left . "[" . $page . "]" . $page1right . $page2right . $nextpage . "</td></tr>";

		}

		print "</table>";

	}







	$sql = "SELECT * FROM `tranzactions` ORDER BY `id` DESC";

	users_list(intval($_GET['page']), 50, $sql);

	?>