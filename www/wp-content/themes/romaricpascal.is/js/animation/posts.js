import scroll from './progress/scroll';
import time from './progress/time';
import multiply from './progress/combine/multiply';
import fadeInLeft from './css/fadeInLeft';
import linear from './scale/linear';
import clamp from './scale/clamp';
const POSTS_SELECTOR = '.rp-PostListItem';

function applyStyle(el, style) {
	for (var property in style) {
		el.style[property] = style[property];
	}
}

function clearStyles(el, style) {
	for (var property in style) {
		el.style[property] = null;
	}
}

function animate(post) {
	return function (progress) {
		if (progress === time.COMPLETE) {
			clearStyles(post, fadeInLeft(0));
			return;
		}
		applyStyle(post, fadeInLeft(progress));
	}
}

const posts = document.querySelectorAll(POSTS_SELECTOR);
console.log('Animating posts', posts);

const viewportHeight = document.documentElement.clientHeight;
const bottomOfViewport = document.documentElement.clientHeight;
const scale = linear(0.05, 0.30);
const DURATION = 500;
const STAGGER_DELAY = 100;

let timeAnimatedPosts = 0;
function getSource(post) {
	const scrollSource = scroll(function () {
		// OPTIMIZE: 
		// Probs some caching doable to speed things up as layout doesn't change unless resized
		// Also probably some avoidable calculations for element super far out to keep things light
		// Eg. Use Intersection obeserver to check the element is about to get into viewport
		var topOfElement = post.getBoundingClientRect().top;
		var distanceFromBottom = bottomOfViewport - topOfElement;
		return clamp(scale(distanceFromBottom / viewportHeight));
	});

	if (window.location.hash) {
		if (post.matches(`${window.location.hash} .rp-PostListItem`)) {
			const timeSource = (time(DURATION, STAGGER_DELAY * timeAnimatedPosts, false));
			timeAnimatedPosts++;
			return multiply(scrollSource, timeSource);
		}
	}

	return scrollSource;
}

if (document.body.classList.contains('home')) {
	Array.prototype.forEach.call(posts, post => {
		const animation = animate(post);
		getSource(post)(animation);
		animation(0);
	});
}

if (document.body.classList.contains('archive') || document.body.classList.contains('blog')) {
	Array.prototype.forEach.call(posts, (post, i) => {
		time(DURATION, STAGGER_DELAY * i)(animate(post));
	});
}