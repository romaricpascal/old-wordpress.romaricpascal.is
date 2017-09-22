import ScrollIntersectionObserver from './ScrollIntersectionObserver';
import linear from 'd3-scale/src/linear';

var opacity = linear()
  .domain([0.15, 0.5])
  .range([0, 1]);

function markElementsInView(entries) {
	entries.forEach(function (entry) {
		entry.target.style.opacity = opacity(entry.viewportIntersectionRatio);
	});
}

var observer = new ScrollIntersectionObserver(markElementsInView);

observer.observe('[data-inview]');
markElementsInView(observer.takeRecords());

var translateX = linear()
 .domain([0.15, 0.75])
 .clamp(true)
 .range([-100, 0]);

function translatePosts(entries) {
	entries.forEach(function (entry) {
		var distanceFromBottom = entry.rootBounds.bottom - entry.boundingClientRect.top;
		var percentDistanceFromBottom = distanceFromBottom / entry.boundingClientRect.height;
		var translation = translateX(percentDistanceFromBottom);
		entry.target.style.opacity = opacity(percentDistanceFromBottom);
		entry.target.style.transform = `translateX(${translation}%)`;
	});
}

var translateObserver = new ScrollIntersectionObserver(translatePosts);
translateObserver.observe('.rp-PostLink');
translatePosts(translateObserver.takeRecords());