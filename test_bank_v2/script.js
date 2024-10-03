(() => {
	function isNumber(num) {
		return typeof num === 'number' && !isNaN(num);
	}

	function syncRangeInput(replace, input) {
		input.val(replace.val());
	}

	function createBreadcrumbs(breadcrumbs, links) {
		for (const item of links) {
			const li = document.createElement('li');
			const aLink = document.createElement('a');
			li.classList.add('breadcrumbs-nav__item');
			aLink.classList.add('breadcrumbs-nav__link');
			if (item === '') {
				aLink.href = '#';
				aLink.textContent = 'Главная';
				aLink.addEventListener('click', () => {
					const activeLink = document.getElementById('active-link');
					if (activeLink) {
						activeLink.removeAttribute('id');
					}
					$('.breadcrumbs .breadcrumbs-nav__item').remove();
					$('#calculator').addClass('hide');
				});
			} else {
				aLink.dataset.id = item.id;
				aLink.dataset.name = item.name;
				aLink.href = '#';
				aLink.textContent = item.name;
			}
			li.append(aLink);
			breadcrumbs.append(li);
		}
	}

	function calcDeposit(form) {
		var data = form.serialize();
		$.ajax({
			type: 'POST',
			url: 'calc.php',
			data: data,
			success: function (result) {
				let strResult;
				if ($('#result').length) {
					strResult = $('#result');
				} else {
					strResult = $('<span>', { id: 'result' });
				}
				console.log(result);
				$('#calculation').append(strResult);
				if (isNumber(parseInt(result))) {
					strResult.addClass('success');
					strResult.removeClass('error');
					if ($('#result-score').length === 0) {
						let score = $('<span/>', { id: 'result-score' });
						score.html(result);
						console.log(score);
						strResult.html(`Результат `);
						strResult.append(score);
					}
					else if (result !== Number($('#result-score').val())) {
						$('#result-score').html(result);
					}
				}
				else {
					strResult.addClass('error');
					strResult.removeClass('success');
					strResult.html(result);
				}
			},
			error: function (xhr, str) {
				alert('Возникла ошибка: ' + xhr.responseCode);
			}
		});
	}

	document.addEventListener("DOMContentLoaded", () => {
		// Форма
		const form = $('#calculator');
		$("#date").datepicker();
		const amount = $('#amount');
		const rangeAmount = $('#range-amount');
		const replenishmentAmount = $('#replenishment-amount');
		const rangeReplenishmentAmount = $('#range-replenishment-amount');
		amount.on('change', function () {
			syncRangeInput($(this), rangeAmount);
		});
		rangeAmount.on('change', function () {
			syncRangeInput($(this), amount);
		});
		replenishmentAmount.on('change', function () {
			syncRangeInput($(this), rangeReplenishmentAmount);
		});
		rangeReplenishmentAmount.on('change', function () {
			syncRangeInput($(this), replenishmentAmount);
		});
		const btnForm = document.getElementById('btnCalc');
		btnForm.addEventListener('click', () => { calcDeposit(form) });
		// Меню
		const headerMenu = [...document.querySelectorAll('.header-nav__link')];
		const breadcrumbs = [...document.querySelectorAll('.breadcrumbs-nav__link')];
		const footerMenu = [...document.querySelectorAll('.footer-nav__link')];
		const arrLinks = [...headerMenu, ...breadcrumbs, ...footerMenu];
		for (const link of arrLinks) {
			const dataLink = link.dataset;
			const headerLink = headerMenu.find(x => x.dataset.id === dataLink.id);
			if (!headerLink) {
				link.addEventListener('click', () => {
					const activeLink = document.getElementById('active-link');
					if (activeLink) {
						activeLink.removeAttribute('id');
					}
					$('.breadcrumbs .breadcrumbs-nav__item').remove();
					form.addClass('hide');
				});
			} else {
				link.addEventListener('click', () => {
					if (!headerLink.id) {
						const activeLink = document.getElementById('active-link');
						if (activeLink) {
							activeLink.removeAttribute('id');
						}
						headerLink.id = 'active-link';
						$('.breadcrumbs .breadcrumbs-nav__item').remove();

						const breadcrumbs = $('.breadcrumbs-nav__list');
						const links = [''];
						if (dataLink) {
							links.push(dataLink);
						}
						createBreadcrumbs(breadcrumbs, links);

						switch (dataLink.id) {
							case 'credit':
								form.addClass('hide');
								break;
							case 'deposits':
								form.removeClass('hide');
								const li = document.createElement('li');
								li.classList.add('breadcrumbs-nav__item');
								li.textContent = 'Калькулятор';
								breadcrumbs.append(li);
								break;
							case 'debit':
								form.addClass('hide');
								break;
							case 'insurance':
								form.addClass('hide');
								break;
							case 'friends':
								form.addClass('hide');
								break;
							case 'online':
								form.addClass('hide');
								break;
							default:
								break;
						}
					}
				});
			}
		}
	});
})();
