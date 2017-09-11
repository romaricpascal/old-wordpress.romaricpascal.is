export default function animateEntrance(element, direction) {
	return new Promise(function (resolve) {
		element.classList.add('is-entering', 'is-entering-' + direction);
		setTimeout(function () {
			element.classList.remove('is-entering', 'is-entering-' + direction);
			resolve(element);
			// TODO: Make sure animations have completed by listening to DOM events for example
		}, 500);
	});
}