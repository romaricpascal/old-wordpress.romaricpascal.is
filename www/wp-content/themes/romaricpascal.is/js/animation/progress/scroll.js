import throttle from 'lodash.throttle';

function ifHasChanged(fn) {
	return function a(value) {
		if (a.current === value) return;
		a.current = value;
		return fn(value);
	}
}

export default function run(getProgress) {
	return function run(animation) {
		var tick = ifHasChanged(throttle(position => {
			animation(getProgress(position));
		}));
		requestAnimationFrame(function readScroll() {
			tick(window.scrollY);
			requestAnimationFrame(readScroll);
		});
	}
}