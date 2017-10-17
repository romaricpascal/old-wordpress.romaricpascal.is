export default function viewportHeight() {
	return (observer) => {
		observer(document.documentElement.clientHeight);
		window.addEventListener('resize', () => {
			observer(document.documentElement.clientHeight);
		});
	}
}