export default function animateExit(element, direction) {
	return new Promise(function (resolve) {
		document.body.classList.add('u-ofx-h');
		element.classList.add('is-exiting', 'is-exiting-' + direction);
		setTimeout(function () {
			element.classList.remove('is-exiting', 'is-exiting-' + direction);
			element.classList.add('has-exited', 'has-exited-' + direction);
			setTimeout(function () {
				document.body.classList.remove('u-ofx-h');
				resolve(element);
			}, 500);
			// TODO: Make sure animations have completed by listening to DOM events for example
		}, 500);
	});
}