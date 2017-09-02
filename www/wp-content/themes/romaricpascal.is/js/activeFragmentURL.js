import ScrollIntersectionObserver from './ScrollIntersectionObserver';

function highest(property) {
	return function (current, value) {
		if (!current || value[property] > current[property]) {
			return value;
		}

		return current;
	}
}

function updateMostVisible(entries) {
	var mostVisible = entries.reduce(highest('intersectionRatio'));
	// Avoid unnecessary states in history
	if (mostVisible.target.id) {
		var hash = `#${mostVisible.target.id}`;
		if (hash !== window.location.hash) {
			history.replaceState({}, document.title, hash);
		}
	} else {
		history.replaceState({}, document.title, location.origin);
	}
}

var observer = new ScrollIntersectionObserver(updateMostVisible);
observer.observe('.js-archiveFragmentURL');
updateMostVisible(observer.takeRecords());