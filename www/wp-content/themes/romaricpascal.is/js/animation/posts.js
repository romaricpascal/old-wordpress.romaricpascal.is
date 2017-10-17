// import scroll from './progress/scroll';
import time from './progress/time';
import min from './combine/min';
import fadeInLeft from './css/fadeInLeft';
const POSTS_SELECTOR = '.rp-PostListItem';
import distanceFromBottom from './distanceFromBottom';

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



const DURATION = 500;
const STAGGER_DELAY = 100;
let timeAnimatedPosts = 0;

function getSource(post) {

	const scrollSource = distanceFromBottom(post, 0.05, 0.30);

	if (window.location.hash) {
		if (post.matches(`${window.location.hash} .rp-PostListItem`)) {
			const timeSource = (time(DURATION, STAGGER_DELAY * timeAnimatedPosts, false));
			timeAnimatedPosts++;
			return min(scrollSource, timeSource);
		}
	}

	return scrollSource;
}
const posts = document.querySelectorAll(POSTS_SELECTOR);
if (document.body.classList.contains('home')) {
	Array.prototype.forEach.call(posts, post => {
		const animation = animate(post);
		animation(0);
		getSource(post)(animation);
	});
}

if (document.body.classList.contains('archive') || document.body.classList.contains('blog')) {
	Array.prototype.forEach.call(posts, (post, i) => {
		const animation = animate(post);
		animation(0);
		time(DURATION, STAGGER_DELAY * i)(animation);
	});
}