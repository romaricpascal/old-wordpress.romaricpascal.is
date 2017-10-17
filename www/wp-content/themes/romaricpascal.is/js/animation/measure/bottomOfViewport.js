export default function bottomOfViewport() {
	return function boW(observer) {
		observer(document.documentElement.clientHeight);
		window.addEventListener('resize', () => {
			observer(document.documentElement.clientHeight);
		});
	}
}