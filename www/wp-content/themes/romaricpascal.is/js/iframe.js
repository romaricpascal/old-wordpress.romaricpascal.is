const FRAME_ORIENTATION_PORTRAIT = 'rp-OrientableFrame-portrait';

function handleRotate(e) {
	var targetSelector =e.target.getAttribute('data-target');
	var target = document.querySelector(targetSelector);
	if (target) {
		target.classList.toggle(FRAME_ORIENTATION_PORTRAIT);
	}
}

function handleReload(e) {
	var targetSelector = e.target.getAttribute('data-target');
	var target = document.querySelector(targetSelector);
	if (target) {
		target.contentWindow.location.reload(true)
	}
}

if (document.body.classList) {
	document.body.addEventListener('click', e => {
		if (e.target.matches('.js-rotateIframe')) {
			return handleRotate(e);
		}

		if (e.target.matches('.js-reloadIframe')) {
			return handleReload(e);
		}
	});
}