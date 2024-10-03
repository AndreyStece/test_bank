<!DOCTYPE html>
<html lang="ru">
		<head>
				<meta charset="utf-8">
				<title>Тестовое задание</title>
				<link rel="stylesheet" href="style.css">
				<link rel="stylesheet" href="/resources/demos/style.css">
				<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
				<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
				<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		</head>
		<header>
				<div class='visit_card'>
						<img id="logo" src="img/worldbank_org_logo.png">
						<div id='phones'>
								<p>8-800-100-5005</p>
								<p>+7(3452)522-000</p>
						</div>
				</div>
				<ul class="menu">
						<li onclick="menu('Кредитные карты')"><a href="#">Кредитные карты</a></li>
						<li onclick="menu('Вклады')"><a id="active_menu" href="#">Вклады</a></li>
						<li onclick="menu('Дебетовая карта')"><a href="#">Дебетовая карта</a></li>
						<li onclick="menu('Страхование')"><a href="#">Страхование</a></li>
						<li onclick="menu('Друзья')"><a href="#">Друзья</a></li>
						<li onclick="menu('Интернет-банк')"><a href="#">Интернет-банк</a></li>
				</ul>
		</header>
		<body>
				<ul class="bread_crumbs">
					<li><a onclick="menu('Главная')" href="#">Главная</a></li>
					<li><a onclick="menu('Вклады')" href="#">Вклады</a></li>
					<li>Калькулятор</li>
				</ul>
				<form id='calculator' class='calculator_show'>
						<p id="calc_name">Калькулятор</p>
						<div id="date_of_registration_of_the_deposit">
								<p>Дата оформления вклада</p>
								<input type="text" id="datepicker" name='date' readonly>
						</div>
						<div id="deposit_amount">
								<p>Сумма вклада</p>
								<input id="number_deposit_amount" onchange="changeValue('num_da')" type="number" min="1000" max="3000000" step="1" value="1000" name="sum_da">
								<div class="range">
										<input id="range_deposit_amount" onchange="changeValue('rng_da')" type="range" min="1000" max="3000000" step="1" value="1000" list="number">
										<datalist class="range_list" id="number">
										    <option class="range_opt">1 тыс. руб.</option>
										    <option class="range_opt">3000000</option>
									  </datalist>
								</div>
						</div>
						<div id="deposit_term">
								<p>Срок вклада</p>
								<select name="term">
										<option>1 год</option>
										<option>2 года</option>
										<option>3 года</option>
										<option>4 года</option>
										<option>5 лет</option>
								</select>
						</div>
						<div id="deposit_replenishment">
								<p>Пополнение вклада</p>
								<input name="radio_name" type="radio" value="0"> Нет
								<input name="radio_name" type="radio" value='1'> Да
						</div>
						<div id="deposit_replenishment_amount">
								<p>Сумма пополнения вклада</p>
								<input id="number_deposit_replenishment_amount" onchange="changeValue('num_dra')" type="number" min="1000" max="3000000" step="1" value="1000" name="sum_dra">
								<div class="range">
										<input id="range_deposit_replenishment_amount" onchange="changeValue('rng_dra')" type="range" min="1000" max="3000000" step="1" value="1000" list="number">
										<datalist class="range_list" id="number">
												<option class="range_opt">1 тыс. руб.</option>
												<option class="range_opt">3000000</option>
										</datalist>
								</div>
						</div>
						<div id="calculation">
								<input value="Рассчитать" type="button" onclick="calc_deposit()">
								<div id="result">

								</div>
						</div>
				</form>
		</body>
		<footer>
				<a onclick="menu('Кредитные карты')" href="#"><u>Кредитные карты</u></a>
				<a onclick="menu('Вклады')" href="#"><u>Вклады</u></a>
				<a onclick="menu('Дебетовая карта')" href="#"><u>Дебетовая карта</u></a>
				<a onclick="menu('Страхование')" href="#"><u>Страхование</u></a>
				<a onclick="menu('Друзья')" href="#"><u>Друзья</u></a>
				<a onclick="menu('Интернет-банк')" href="#"><u>Интернет-банк</u></a>
		</footer>
		<script src="script.js"></script>
</html>
