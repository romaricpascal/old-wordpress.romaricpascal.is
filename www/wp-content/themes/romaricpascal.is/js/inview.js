import ScrollIntersectionObserver from './ScrollIntersectionObserver';

var observer = new ScrollIntersectionObserver(function (entries) {
	console.log('InView', entries);
	entries.forEach(function (entry) {
		if (entry.isIntersecting && entry.intersectionRatio > 0.25) {
			entry.target.classList.add('is-inView');
		} else {
			entry.target.classList.remove('is-inView');
		}
	});
});

observer.observe('[data-inview]');