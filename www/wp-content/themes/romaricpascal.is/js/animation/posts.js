import scroll from './progress/scroll';
import fadeInLeft from './css/fadeInLeft';
import linear from './scale/linear';
import clamp from './scale/clamp';
const POSTS_SELECTOR = '.rp-PostListItem';

function applyStyle(el, style) {
	for (var property in style) {
		el.style[property] = style[property];
	}
}

function animate(post) {
	return function (progress) {
		applyStyle(post, fadeInLeft(progress));
	}
}

const posts = document.querySelectorAll(POSTS_SELECTOR);
console.log('Animating posts', posts);

const viewportHeight = document.documentElement.clientHeight;
const bottomOfViewport = document.documentElement.clientHeight;
const scale = linear(0.05, 0.30);

Array.prototype.forEach.call(posts, post => {
	scroll(function () {
		// OPTIMIZE: 
		// Probs some caching doable to speed things up as layout doesn't change unless resized
		// Also probably some avoidable calculations for element super far out to keep things light
		var topOfElement = post.getBoundingClientRect().top;
		var distanceFromBottom = bottomOfViewport - topOfElement;
		return clamp(scale(distanceFromBottom / viewportHeight));
	})(animate(post));
});