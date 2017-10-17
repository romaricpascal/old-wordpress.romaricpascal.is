import clamp from '../scale/clamp';

function now() {
	return window.performance.now();
}

const COMPLETE = {};

export default function run(duration, d, sendComplete = true) {
	return function (animation, delay = d) {
		var start = now();
		var ellapsed = 0;
		var total = delay + duration;
		requestAnimationFrame(function tick() {
			ellapsed = now() - start;
			if (ellapsed > delay) {
				animation(clamp((ellapsed - delay) / duration));
			}
			if (ellapsed < total) {
				requestAnimationFrame(tick);
			} else {
				if (sendComplete) {
					animation(COMPLETE);
				}
			}
		});
	}
}

run.COMPLETE = COMPLETE;