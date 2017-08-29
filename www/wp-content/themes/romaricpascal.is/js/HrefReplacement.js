import swap from './dom/swap';

export default class HrefReplacement {
	constructor(selector) {
		this.selector = selector;
		this.attribute = 'href';
	}
	exit() {}
	entrance(html) {
		var oldElement = document.querySelector(this.selector);
		var newElement = html.querySelector(this.selector);
		if (!oldElement.getAttribute('href') || !newElement.getAttribute('href')) {
			swap(oldElement, newElement);
		}
		return oldElement.setAttribute(this.attribute, newElement.getAttribute(this.attribute));
	}
}