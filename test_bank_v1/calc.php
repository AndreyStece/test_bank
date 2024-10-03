<?php
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { //проверка на асинхронность
				if ((isset($_POST["date"]) && $_POST["date"] != '') && isset($_POST["sum_da"]) && isset($_POST["term"]) && isset($_POST["radio_name"]) && isset($_POST["sum_dra"])) {
						$date = $_POST['date'];
						$datenew = $date;
						$sum_da = intval($_POST["sum_da"]);
						$term =preg_replace('|[^0-9]*|','',$_POST["term"]);
						$radio_name = $_POST["radio_name"];
						$sum_dra = intval($_POST["sum_dra"]);

						$summn = 	$sum_da;
						$summp = $summn;
						if ($radio_name == 0)
								$summadd = 0;
						else
								$summadd = $sum_dra;
						$daysn = 0;
						$percent = 10;
						$daysy = 0;

						for ($i=0; $i < $term*12; $i++) {
								$daysn = date('t',strtotime($datenew));
								if (date('L',strtotime($datenew)) == 1)
										$daysy = 366;
								else
										$daysy = 365;
								$summn = $summp + ($summp + $summadd)*$daysn*(($percent/100)/$daysy);
								$summp = $summn;
								$datenew = date('Y/m/d', strtotime('+1 MONTH', strtotime($datenew)));
						}
						$summn = round($summn, 2);
						echo $summn;
						return;
				}
				else {
						if (!isset($_POST["date"]) || $_POST["date"] == '') {
								echo 'Укажите дату!';
								return; //возвращаем сообщение пользователю
						}
						else if (!isset($_POST["sum_da"])) {
								echo 'Укажите сумму вклада!';
								return;
						}
						else if (!isset($_POST["term"])) {
								echo 'Укажите срок вклада!';
								return;
						}
						else if (!isset($_POST["radio_name"])) {
								echo 'Выберите вариант пополнения вклада!';
								return;
						}
						else if (!isset($_POST["sum_dra"])) {
								echo 'Укажите сумму пополнения вклада!';
								return;
						}
				}
		}
?>
