<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="icon" href="favicon.ico">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="style.css">
	<script defer src="script.js"></script>
	<title>Тестовое задание</title>
</head>

<body class="body">
	<header class="header">
		<div class="header__top">
			<div class="container header__container">
				<h1 class="header__title visually-hidden">The World Bank</h1>
				<img class="logo" src="img/logo.png" alt="Логотип The World Bank">
				<address class="contacts">
					<a href="tel:+78001005005">8-800-100-5005</a>
					<a href="tel:+73452522000">+7(3452)522-000</a>
				</address>
			</div>
		</div>

		<div class="header__bottom">
			<div class="container container_fluid">
				<nav class="header__nav header-nav">
					<ul class="header-nav__list list-reset">
						<li class="header-nav__item">
							<a class="header-nav__link" href="#" data-id="credit" data-name="Кредитные карты">Кредитные
								карты</a>
						</li>
						<li class="header-nav__item">
							<a class="header-nav__link" href="#" data-id="deposits" data-name="Вклады"
								id="active-link">Вклады</a>
						</li>
						<li class="header-nav__item">
							<a class="header-nav__link" href="#" data-id="debit" data-name="Дебетовая карта">Дебетовая
								карта</a>
						</li>
						<li class="header-nav__item">
							<a class="header-nav__link" href="#" data-id="insurance"
								data-name="Страхование">Страхование</a>
						</li>
						<li class="header-nav__item">
							<a class="header-nav__link" href="#" data-id="friends" data-name="Друзья">Друзья</a>
						</li>
						<li class="header-nav__item">
							<a class="header-nav__link" href="#" data-id="online"
								data-name="Интернет-банк">Интернет-банк</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>

	<main class="main">
		<div class="container">
			<div class="breadcrumbs">
				<nav class="breadcrumbs__nav breadcrumbs-nav">
					<ul class="breadcrumbs-nav__list list-reset">
						<li class="breadcrumbs-nav__item">
							<a class="breadcrumbs-nav__link" href="#">Главная</a>
						</li>
						<li class="breadcrumbs-nav__item">
							<a class="breadcrumbs-nav__link" data-id="deposits" data-name="Вклады" href="#">Вклады</a>
						</li>
						<li class="breadcrumbs-nav__item">
							Калькулятор
						</li>
					</ul>
				</nav>
			</div>
			<form id="calculator" class="form">
				<h2 class="form__heading">Калькулятор</h2>
				<fieldset class="form__filedset indent-left">
					<label class="form__label fz-hack" for="date">
						<span class="form__span">Дата оформления вклада</span>
						<input class="form__input" type="text" id="date" name="date" readonly>
					</label>
					<div class="form__group">
						<label class="form__label fz-hack" for="amount">
							<span class="form__span">Сумма вклада</span>
							<input class="form__input" id="amount" type="number" min="1000" max="3000000" step="1"
								value="1000" name="amount">
						</label>
						<div class="form__range">
							<input id="range-amount" type="range" min="1000" max="3000000" step="1" value="1000"
								list="list-amount">
							<datalist class="form__range-list" id="list-amount">
								<option class="form__range-item">1 тыс. руб.</option>
								<option class="form__range-item">3000000</option>
							</datalist>
						</div>
					</div>
					<label class="form__label fz-hack" for="period">
						<span class="form__span">Срок вклада</span>
						<select class="form__select" id="period" name="period">
							<option>1 год</option>
							<option>2 года</option>
							<option>3 года</option>
							<option>4 года</option>
							<option>5 лет</option>
						</select>
					</label>
					<div class="form__group">
						<span class="form__span">Пополнение вклада</span>
						<label class="form__label" for="replenishment-no">
							<input class="form__radio" id="replenishment-no" name="replenishment" type="radio"
								value="0">
							Нет
						</label>
						<label class="form__label" for="replenishment-yes">
							<input class="form__radio" id="replenishment-yes" name="replenishment" type="radio"
								value="1">
							Да
						</label>
					</div>
					<div class="form__group">
						<label class="form__label fz-hack" for="replenishment-amount">
							<span class="form__span">Сумма пополнения вклада</span>
							<input class="form__input" id="replenishment-amount" type="number" min="1000" max="3000000"
								step="1" value="1000" name="replenishment-amount">
						</label>
						<div class="form__range">
							<input id="range-replenishment-amount" type="range" min="1000" max="3000000" step="1"
								value="1000" list="list-replenishment-amount">
							<datalist class="form__range-list" id="list-replenishment-amount">
								<option class="form__range-item">1 тыс. руб.</option>
								<option class="form__range-item">3000000</option>
							</datalist>
						</div>
					</div>
					<div class="form__group form__group_center" id="calculation">
						<input id="btnCalc" class="btn btn-reset" value="Рассчитать" type="button">
					</div>
				</fieldset>
			</form>
		</div>
	</main>

	<footer class="footer">
		<div class="container">
			<nav class="footer__nav footer-nav">
				<ul class="footer-nav__list list-reset">
					<li class="footer-nav__item">
						<a class="footer-nav__link" data-id="credit" data-name="Кредитные карты" href="#"><u>Кредитные
								карты</u></a>
					</li>
					<li class="footer-nav__item">
						<a class="footer-nav__link" data-id="deposits" data-name="Вклады" href="#"><u>Вклады</u></a>
					</li>
					<li class="footer-nav__item">
						<a class="footer-nav__link" data-id="debit" data-name="Дебетовая карта" href="#"><u>Дебетовая
								карта</u></a>
					</li>
					<li class="footer-nav__item">
						<a class="footer-nav__link" data-id="insurance" data-name="Страхование"
							href="#"><u>Страхование</u></a>
					</li>
					<li class="footer-nav__item">
						<a class="footer-nav__link" data-id="friends" data-name="Друзья" href="#"><u>Друзья</u></a>
					</li>
					<li class="footer-nav__item">
						<a class="footer-nav__link" data-id="online" data-name="Интернет-банк"
							href="#"><u>Интернет-банк</u></a>
					</li>
				</ul>
			</nav>
		</div>
	</footer>
</body>

</html>
