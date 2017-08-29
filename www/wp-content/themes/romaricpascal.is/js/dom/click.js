export default function click(element) {
	var event = document.createEvent('MouseEvent');
	event.initEvent('click', true, true);
	element.dispatchEvent(event);
}