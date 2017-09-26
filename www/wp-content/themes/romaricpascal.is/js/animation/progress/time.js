function now() {
	return window.performance.now();
}

export default function run(animation, duration) {
	var start = now();
	var ellapsed = 0;
	requestAnimationFrame(function tick() {
		if (ellapsed < duration) {
			ellapsed = now() - start;
			animation(ellapsed/duration);
			requestAnimationFrame(tick);
		}
	});
}