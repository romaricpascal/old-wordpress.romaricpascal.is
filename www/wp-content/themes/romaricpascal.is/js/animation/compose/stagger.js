import linear from 'd3-scale/src/linear';

export default function stagger(animations) {
	// Add time for all animations to run
	var timeScale = linear()
		.domain([0, 1])
		.clamp(true)
		.range([0, 1 + (animations.length - 1) / animations.length])
	var clamp = linear()
		.domain([0,1])
		.clamp(true)
		.range([0,1]);
	return function (progress) {
		return animations.map( (animation, index) => {
			return animation(clamp(timeScale(progress) - 1/animations.length * index));
		});
	}
}