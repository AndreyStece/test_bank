<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { //проверка на асинхронность
	if ((isset($_POST["date"]) && $_POST["date"] != '') && isset($_POST["amount"]) && isset($_POST["period"]) && isset($_POST["replenishment"]) && isset($_POST["replenishment-amount"])) {
		$date = $_POST['date'];
		$datenew = $date;
		$amount = intval($_POST["amount"]);
		$period = preg_replace('|[^0-9]*|', '', $_POST["period"]);
		$replenishment = $_POST["replenishment"];
		$replenishmentAmount = intval($_POST["replenishment-amount"]);

		$summn = 	$amount;
		$summp = $summn;
		if ($replenishment == 0)
			$summadd = 0;
		else
			$summadd = $replenishmentAmount;
		$daysn = 0;
		$percent = 10;
		$daysy = 0;

		for ($i = 0; $i < $period * 12; $i++) {
			$daysn = date('t', strtotime($datenew));
			if (date('L', strtotime($datenew)) == 1)
				$daysy = 366;
			else
				$daysy = 365;
			$summn = $summp + ($summp + $summadd) * $daysn * (($percent / 100) / $daysy);
			$summp = $summn;
			$datenew = date('Y/m/d', strtotime('+1 MONTH', strtotime($datenew)));
		}
		$summn = round($summn, 2);
		echo $summn;
		return;
	} else {
		if (!isset($_POST["date"]) || $_POST["date"] == '') {
			echo 'Укажите дату!';
			return; //возвращаем сообщение пользователю
		} else if (!isset($_POST["amount"])) {
			echo 'Укажите сумму вклада!';
			return;
		} else if (!isset($_POST["period"])) {
			echo 'Укажите срок вклада!';
			return;
		} else if (!isset($_POST["replenishment"])) {
			echo 'Выберите вариант пополнения вклада!';
			return;
		} else if (!isset($_POST["replenishment-amount"])) {
			echo 'Укажите сумму пополнения вклада!';
			return;
		}
	}
}
