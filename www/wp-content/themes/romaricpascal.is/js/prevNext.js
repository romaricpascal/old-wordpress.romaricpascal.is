import click from './dom/click';

document.body.addEventListener('click', function (event) {
	if (event.target.matches('.rp-HomeMenuItem-prev')) {
		var activeLink = document.querySelector('.rp-HomeMenuItem-active');
		if (activeLink) {
			var target = activeLink.previousElementSibling;
			if (target.matches('.rp-HomeMenuItem-fragment')) {
				click(target);
			}
		}
	}

	if (event.target.matches('.rp-HomeMenuItem-next')) {
		var activeLink = document.querySelector('.rp-HomeMenuItem-active');
		if (activeLink) {
			var target = activeLink.nextElementSibling;
			if (target.matches('.rp-HomeMenuItem-fragment')) {
				click(target);
			}
		}
	}

	
});
