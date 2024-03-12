

<script>

	document.title = 'Список курсов валют '

</script>

<script language="javascript" type="text/javascript" src="files/alt.js"></script>

<?php

	defined('ACCESS') or die();



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

		<th><b>Идентификатор</b></th>

		<th><b>Отдаваемая валюта</b></th>

		<th><b>Получаемая валюта</b></th>

		<th><b>Обменный курс</b></th>

		<th><b>Добавить к курсу</b></th>

		<th><b>Отнять от курса</b></th>

		<th width="140"><b>EDIT</b></th>

	</tr>

	<?php

	function users_list($page, $num, $query)

	{



		$result = DB::Query($query);

		$themes = mysqli_num_rows($result);



		if (!$themes) {

			print '<tr><td colspan="10" align="center"><font color="#ffffff"><b>Валют пока нет.</b></font></td></tr>';

		} else {



			$total = intval(($themes - 1) / $num) + 1;

			if (empty($page) or $page < 0) $page = 1;

			if ($page > $total) $page = $total;

			$start = $page * $num - $num;

			$result = DB::Query($query . " LIMIT " . $start . ", " . $num);

			while ($row = mysqli_fetch_array($result)) {

				

				print "

					<td>" . $row['id'] . "</td>

					<td>" . $row['uniq_name'] . "</td>

					<td>" . $row['symbol_to'] . "</td>

					<td>" . $row['symbol_from'] . "</td>

					<td>" . $row['course'] . "</td>

					<td>" . $row['plus'] . "</td>

					<td>" . $row['minus'] . "</td>

					";

				print '

				<td>

					<a href="?a=edit_course&id=' . $row['id'] . '">

						<img src="images/edit_ico.png" width="16" height="16" border="0" alt="Редактировать">

					</a>



				</td>

				</tr>';

			}

			// <a href="?a=users&b=Ghost&i='.$row[id].'&ghost='.$ghost.'"><img src="images/help_ico.png" width="16" height="16" border="0" alt="Гостевой просмотр аккаунта пользователя"></a>

			if ($page != 1) $pervpage = "<a href=?a=course&sort=" . $_GET['sort'] . "&page=" . ($page - 1) . ">««</a>";

			if ($page != $total) $nextpage = " <a href=?a=course&sort=" . $_GET['sort'] . "&page=" . ($page + 1) . ">»»</a>";

			if ($page - 2 > 0) $page2left = " <a href=?a=course&sort=" . $_GET['sort'] . "&page=" . ($page - 2) . ">" . ($page - 2) . "</a> | ";

			if ($page - 1 > 0) $page1left = " <a href=?a=course&sort=" . $_GET['sort'] . "&page=" . ($page - 1) . ">" . ($page - 1) . "</a> | ";

			if ($page + 2 <= $total) $page2right = " | <a href=?a=course&sort=" . $_GET['sort'] . "&page=" . ($page + 2) . ">" . ($page + 2) . "</a>";

			if ($page + 1 <= $total) $page1right = " | <a href=?a=course&sort=" . $_GET['sort'] . "&page=" . ($page + 1) . ">" . ($page + 1) . "</a>";

			print "<tr><td height=\"20\" colspan=\"11\" class=\"ftr\"><b>Страницы: </b>" . $pervpage . $page2left . $page1left . "[" . $page . "]" . $page1right . $page2right . $nextpage . "</td></tr>";

		}

		print "</table>";

	}







	$sql = "SELECT * FROM `rate` ORDER BY `id` DESC";

	users_list(intval($_GET['page']), 50, $sql);

	?>