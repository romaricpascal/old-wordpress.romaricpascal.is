const FRAME_ORIENTATION_PORTRAIT = 'rp-OrientableFrame-portrait';

if (document.body.classList) {
	document.body.addEventListener('click', e => {
		if (e.target.matches('.js-rotateIframe')) {
			var targetSelector =e.target.getAttribute('data-target');
			var target = document.querySelector(targetSelector);
			if (target) {
				target.classList.toggle(FRAME_ORIENTATION_PORTRAIT);
			}
		}
	});
}