import click from './dom/click';

function trigger(position, activeLink) {
	if (activeLink) {
		var target = activeLink[`${position}ElementSibling`];
		if (target.matches('.rp-HomeMenuItem-fragment')) {
			click(target);
		}
	}
}

document.body.addEventListener('click', function (event) {
	if (event.target.matches('.rp-HomeMenuItem-prev')) {
		trigger('previous', document.querySelector('.rp-HomeMenuItem-active'));
	}

	if (event.target.matches('.rp-HomeMenuItem-next')) {
		trigger('next', document.querySelector('.rp-HomeMenuItem-active'));
	}

	
});
