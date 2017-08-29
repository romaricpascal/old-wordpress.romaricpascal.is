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
	console.log(entries, mostVisible);
	history.pushState({}, document.title, `#${mostVisible.target.id}`);
}

var observer = new ScrollIntersectionObserver(updateMostVisible);
observer.observe('[data-inview]');
updateMostVisible(observer.takeRecords());