export default function swap(oldElement, newElement) {
	return oldElement.parentNode.replaceChild(newElement, oldElement);
}