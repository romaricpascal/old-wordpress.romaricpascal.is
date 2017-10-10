import ScrollIntersectionObserver from './ScrollIntersectionObserver';
import fadeIn from './animation/css/fadeIn';
import fadeInLeft from './animation/css/fadeInLeft';
import zoomIn from './animation/css/zoomIn';
import parallel from './animation/compose/parallel';
import stagger from './animation/compose/stagger';
import run from './animation/progress/time';
import linear from './animation/scale/linear';
import clamp from './animation/scale/clamp';
import './animation/posts';

var opacity = linear(0.15, 0.5);

function markElementsInView(entries) {
	entries.forEach(function (entry) {
		var progress = clamp(opacity(entry.viewportIntersectionRatio));
		applyStyle(entry.target, fadeIn(progress));
	});
}

var observer = new ScrollIntersectionObserver(markElementsInView);

observer.observe('[data-inview]');
markElementsInView(observer.takeRecords());

var bubbleEntranceProgress = linear(0.20, 0.5);

function applyStyle(el, style) {
	for (var property in style) {
		el.style[property] = style[property];
	}
}

function shift(animation, position) {
	var timeScale = linear(position.start, position.end);
	return function(progress) {
		var scaledProgress = clamp(timeScale(progress));
		return animation(scaledProgress);
	}
}

function indexMap(animation, targets) {
	return function (progress) {
		animation(progress).forEach(function (update, index) {
			if (targets[index]) {
				applyStyle(targets[index], update);
			}
		});
	}
}

const ANIMATIONS = {
    oneOneTwo: parallel([
        shift(zoomIn, { start: 0.2, end: 0.5 }),
        shift(zoomIn, { start: 0.0, end: 0.5 }),
        shift(zoomIn, { start: 0.4, end: 0.7 }),
        shift(zoomIn, { start: 0.6, end: 0.8 })
    ]),

    twoOneOne: parallel([
        shift(zoomIn, { start: 0.2, end: 0.5 }),
        shift(zoomIn, { start: 0, end: 0.6 }),
        shift(zoomIn, { start: 0, end: 0.5 }),
        shift(zoomIn, { start: 0.4, end: 0.8 })
    ]),

    oh: parallel([
        shift(zoomIn, { start: 0, end: 0.3 }),
        shift(zoomIn, { start: 0.4, end: 0.7 }),
        shift(zoomIn, { start: 0.2, end: 0.7 }),
        shift(zoomIn, { start: 0.6, end: 1 })
    ])

    // greeting: parallel([
    //     speed(shift(zoomIn, { start: 0, end: 0.3 }), 1 / 1.3),
    //     speed(shift(zoomIn, { start: 0.4, end: 0.7 }), 1 / 1.3),
    //     speed(shift(zoomIn, { start: 0.2, end: 0.7 }), 1 / 1.3),
    //     speed(shift(zoomIn, { start: 0.2, end: 0.7 }), 1 / 1.3),
    //     speed(shift(zoomIn, { start: 1, end: 1.3 }), 1 / 1.3),
    //     speed(shift(zoomIn, { start: 0.8, end: 0.5 }), 1 / 1.3),
    //     speed(shift(zoomIn, { start: 0.8, end: 0.5 }), 1 / 1.3)
    // ])
};

var targets = document.querySelectorAll('.js-ScrollAnim');
Array.prototype.forEach.call(targets, function (target) {
	var handler = clamp(bubbleEntrance(getAnimation(target)));
	var bubbleObserver = new ScrollIntersectionObserver(handler);
	bubbleObserver.observe(target);
	handler(bubbleObserver.takeRecords());
});

function bubbleEntrance (animation) {
	return function (entries) {
		entries.forEach(function (entry) {
			var distanceFromBottom = entry.rootBounds.bottom - entry.boundingClientRect.top;
			var percentDistanceFromBottom = distanceFromBottom / entry.rootBounds.height;
			var progress = bubbleEntranceProgress(percentDistanceFromBottom);
			animation(progress);
		});
	}
}

// Run entrance animation on portfolio pages or when reached with a # URL
var selector = `${window.location.hash} .js-ScrollAnim`;
var target = document.querySelector(selector);

function getAnimation(target) {
	var parts = target.querySelectorAll('.js-ScrollAnim__part');
	var animationName = target.getAttribute('data-scrollAnim-name') || 'oneOneTwo';
	return indexMap(ANIMATIONS[animationName], parts);
}

run(getAnimation(target), 1500);

function getTargetPostsSelector() {
	if (document.body.classList.contains('home')) {
		if (window.location.hash) {
			return `${window.location.hash} .rp-PostListItem`;
		}
	} else {
		return '.rp-PostListItem';
	}
}

var targetPosts = document.querySelectorAll(getTargetPostsSelector());

function postsEntrance(targetPosts) {
	var animations = Array.prototype.map.call(targetPosts, () => {
		return fadeInLeft;
	});
	return indexMap(stagger(animations), targetPosts);
}

run(shift(postsEntrance(targetPosts), {start: 0.50, end: 0.80}), 2000);



