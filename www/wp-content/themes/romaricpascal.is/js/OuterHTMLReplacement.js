import swap from './dom/swap';
import animateExit from './dom/animateExit';
import animateEntrance from './dom/animateEntrance';

export default class OuterHTMLReplacement {
	constructor(selector) {
		this.selector = selector;
	}
	exit(options) {
		var element = document.querySelector(this.selector);
		return animateExit(element, options.direction);
	}
	entrance(html, options) {
		var oldElement = document.querySelector(this.selector);
		var newElement = html.querySelector(this.selector);
		animateEntrance(newElement, options.direction);
		swap(oldElement, newElement);
	}
}