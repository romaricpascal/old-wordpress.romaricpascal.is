import ScrollIntersectionObserver from './ScrollIntersectionObserver';
import linear from 'd3-scale/src/linear';

var opacity = linear()
  .domain([0.15, 0.5])
  .clamp(true)
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

var bubbleEntranceProgress = linear()
 .domain([0.33, 0.50])
 .clamp(true)
 .range([0, 1]);



function slideInRight(progress) {
	return {
		transform: `scale(${progress})`,
		opacity: progress
	};
}

function applyStyle(el, style) {
	for (var property in style) {
		el.style[property] = style[property];
	}
}

function parallel(animations) {
	return function(progress) {
		return animations.map(animation => {
			return animation(progress);
		});
	}
}

function speed(animation, factor) {
	return function (progress) {
		return animation(factor * progress);
	}
}

function shift(animation, position) {
	var timeScale = linear()
		.domain([position.start, position.end])
		.clamp(true)
		.range([0,1]);
	return function(progress) {
		var scaledProgress = timeScale(progress);
		return animation(scaledProgress);
	}
}

function indexMap(progress, target) {
	progress.forEach(function (update, index) {
		if (target[index]) {
			applyStyle(target[index], update);
		}
	});
}

const ANIMATIONS = {
    oneOneTwo: parallel([
        shift(slideInRight, { start: 0.2, end: 0.5 }),
        shift(slideInRight, { start: 0.0, end: 0.5 }),
        shift(slideInRight, { start: 0.4, end: 0.7 }),
        shift(slideInRight, { start: 0.6, end: 0.8 })
    ]),

    twoOneOne: parallel([
        shift(slideInRight, { start: 0.2, end: 0.5 }),
        shift(slideInRight, { start: 0, end: 0.6 }),
        shift(slideInRight, { start: 0, end: 0.5 }),
        shift(slideInRight, { start: 0.4, end: 0.8 })
    ]),

    oh: parallel([
        shift(slideInRight, { start: 0, end: 0.3 }),
        shift(slideInRight, { start: 0.4, end: 0.7 }),
        shift(slideInRight, { start: 0.2, end: 0.7 }),
        shift(slideInRight, { start: 0.6, end: 1 })
    ]),

    // greeting: parallel([
    //     speed(shift(slideInRight, { start: 0, end: 0.3 }), 1 / 1.3),
    //     speed(shift(slideInRight, { start: 0.4, end: 0.7 }), 1 / 1.3),
    //     speed(shift(slideInRight, { start: 0.2, end: 0.7 }), 1 / 1.3),
    //     speed(shift(slideInRight, { start: 0.2, end: 0.7 }), 1 / 1.3),
    //     speed(shift(slideInRight, { start: 1, end: 1.3 }), 1 / 1.3),
    //     speed(shift(slideInRight, { start: 0.8, end: 0.5 }), 1 / 1.3),
    //     speed(shift(slideInRight, { start: 0.8, end: 0.5 }), 1 / 1.3)
    // ])
};

var targets = document.querySelectorAll('.js-ScrollAnim');
Array.prototype.forEach.call(targets, function (target) {
	var animationName = target.getAttribute('data-scrollAnim-name') || 'oneOneTwo';
	var parts = target.querySelectorAll('.js-ScrollAnim__part');
	var handler = bubbleEntrance(animationName, parts);

	var bubbleObserver = new ScrollIntersectionObserver(handler);
	bubbleObserver.observe(target);
	handler(bubbleObserver.takeRecords());
});

function bubbleEntrance (animationName, parts) {
	return function (entries) {
		entries.forEach(function (entry) {
			var distanceFromBottom = entry.rootBounds.bottom - entry.boundingClientRect.top;
			var percentDistanceFromBottom = distanceFromBottom / entry.rootBounds.height;
			var progress = bubbleEntranceProgress(percentDistanceFromBottom);
			indexMap(ANIMATIONS[animationName](progress), parts);
		});
	}
}




