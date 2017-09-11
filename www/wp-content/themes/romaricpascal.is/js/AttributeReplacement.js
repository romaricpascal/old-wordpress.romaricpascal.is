export default class AttributeReplacement { 
	constructor(selector, attribute) {
		this.selector = selector;
		this.attribute = attribute;
	}
	exit() {}
	entrance(html) {
		var oldElement = document.querySelector(this.selector);
		var newElement = html.querySelector(this.selector);
		return oldElement.setAttribute(this.attribute, newElement.getAttribute(this.attribute));
	}
}