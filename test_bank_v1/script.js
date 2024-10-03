function isNumber(num) {
	return typeof num === 'number' && !isNaN(num);
}

function calc_deposit() {
    var data = $('#calculator').serialize();
		$.ajax({
		 type: 'POST',
		 url: 'calc.php',
		 data: data,
		 success: function(result) {
				if (document.getElementById('result_success') && document.getElementById('result_score')) {
					$('#result_success').remove();
					$('#result_score').remove();
				}
				else if (document.getElementById('result_success'))
						$('#result_error').remove();
		    if (isNumber(parseInt(result)))
						strResult = "<p id='result_success'>Результат: </p> <p id='result_score'>{result} руб</p>";
				else
						strResult = "<p id='result_error'>{result}</p>";
				strResult = strResult.replace("{result}", result);
		    $('#result').html(strResult);
		 },
		 error: function(xhr, str) {
		    alert('Возникла ошибка: ' + xhr.responseCode);
		 }
		});
}

function menu(name) {
		if (document.getElementById('active_menu')) {
				document.getElementById("active_menu").removeAttribute('id');
		}
		let children = document.querySelectorAll('.menu li a');
		let calculator = document.querySelector('form');
		if (name == "Кредитные карты") {
				children[0].id = 'active_menu';
				calculator.classList.remove('calculator_show');
				calculator.classList.add('calculator_hide');
				$('.bread_crumbs li').remove();
				$('.bread_crumbs').html('<li><a onclick="menu(\'Главная\')" href="#">Главная</a></li> <li>Кредитные карты</li>');
		}
		else if (name == "Вклады") {
				children[1].id = 'active_menu';
				calculator.classList.remove('calculator_hide');
				calculator.classList.add('calculator_show');
				$('.bread_crumbs li').remove();
				$('.bread_crumbs').html('<li><a onclick="menu(\'Главная\')" href="#">Главная</a></li> <li><a onclick="menu(\'Вклады\')" href="#">Вклады</a></li> <li>Калькулятор</li>');
		}
		else if (name == "Дебетовая карта") {
				children[2].id = 'active_menu';
				calculator.classList.remove('calculator_show');
				calculator.classList.add('calculator_hide');
				$('.bread_crumbs li').remove();
				$('.bread_crumbs').html('<li><a onclick="menu(\'Главная\')" href="#">Главная</a></li> <li>Дебетовая карта</li>');
		}
		else if (name == "Страхование") {
				children[3].id = 'active_menu';
				calculator.classList.remove('calculator_show');
				calculator.classList.add('calculator_hide');
				$('.bread_crumbs li').remove();
				$('.bread_crumbs').html('<li><a onclick="menu(\'Главная\')" href="#">Главная</a></li> <li>Страхование</li>');
		}
		else if (name == "Друзья") {
				children[4].id = 'active_menu';
				calculator.classList.remove('calculator_show');
				calculator.classList.add('calculator_hide');
				$('.bread_crumbs li').remove();
				$('.bread_crumbs').html('<li><a onclick="menu(\'Главная\')" href="#">Главная</a></li> <li>Друзья</li>');
		}
		else if (name == "Интернет-банк") {
				children[5].id = 'active_menu';
				calculator.classList.remove('calculator_show');
				calculator.classList.add('calculator_hide');
				$('.bread_crumbs li').remove();
				$('.bread_crumbs').html('<li><a onclick="menu(\'Главная\')" href="#">Главная</a></li> <li>Интернет-банк</li>');
		}
		else if (name == "Главная") {
				calculator.classList.remove('calculator_show');
				calculator.classList.add('calculator_hide');
				$('.bread_crumbs li').remove();
		}
}

function changeValue(name) {
		if (name == 'num_da') {
				document.getElementById('range_deposit_amount').value = document.getElementById('number_deposit_amount').value;
		}
		else if (name == 'rng_da') {
				document.getElementById('number_deposit_amount').value = document.getElementById('range_deposit_amount').value;
		}
		else if (name == 'num_dra') {
				document.getElementById('range_deposit_replenishment_amount').value = document.getElementById('number_deposit_replenishment_amount').value;
		}
		else if (name == 'rng_dra') {
				document.getElementById('number_deposit_replenishment_amount').value = document.getElementById('range_deposit_replenishment_amount').value;
		}
}

function date() {
		$("#datepicker").datepicker();
};
document.addEventListener("DOMContentLoaded", date());
