if(document.body.classList) {

	document.body.addEventListener('click', function(event) {
		var toggle = event.target.matches('[data-toggles]')? event.target : event.target.closest('[data-toggles]');
		if (toggle) {
			event.preventDefault();
			var targetSelector = toggle.getAttribute('data-toggles');
			var target = document.querySelector(targetSelector);
			if (target) {
				target.classList.toggle('is-visible');
			}
		} else {

			if (!event.target.closest('.rp-MenuContainer')) {
				document.querySelector('.rp-MenuContainer').classList.remove('is-visible');
			}
		}
	});
}
