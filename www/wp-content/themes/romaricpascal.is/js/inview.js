import ScrollIntersectionObserver from './ScrollIntersectionObserver';
import fadeIn from './animation/css/fadeIn';
import linear from './animation/scale/linear';
import clamp from './animation/scale/clamp';
import './animation/posts';
import './animation/bubbles';

var opacity = linear(0.15, 0.5);

function applyStyle(el, style) {
	for (var property in style) {
		el.style[property] = style[property];
	}
}

function markElementsInView(entries) {
	entries.forEach(function (entry) {
		var progress = clamp(opacity(entry.viewportIntersectionRatio));
		applyStyle(entry.target, fadeIn(progress));
	});
}

var observer = new ScrollIntersectionObserver(markElementsInView);

observer.observe('[data-inview]');
markElementsInView(observer.takeRecords());

window.troisCoups && window.troisCoups.reveal();