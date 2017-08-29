if(document.body.classList) {

	document.body.addEventListener('click', function(event) {
		if (event.target.matches('[data-toggles]')) {
			event.preventDefault();
			var targetSelector = event.target.getAttribute('data-toggles');
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
