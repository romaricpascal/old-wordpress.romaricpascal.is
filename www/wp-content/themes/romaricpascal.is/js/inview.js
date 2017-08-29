import ScrollIntersectionObserver from './ScrollIntersectionObserver';

function markElementsInView(entries) {
	entries.forEach(function (entry) {
		if (entry.isIntersecting && entry.intersectionRatio > 0.25) {
			entry.target.classList.add('is-inView');
		} else {
			entry.target.classList.remove('is-inView');
		}
	});
}

var observer = new ScrollIntersectionObserver(markElementsInView);

observer.observe('[data-inview]');
markElementsInView(observer.takeRecords());