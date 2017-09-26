import linear from 'd3-scale/src/linear';

export default function shift(animation, position) {
	var timeScale = linear()
		.domain([position.start, position.end || position.start + position.duration])
		.clamp(true)
		.range([0,1]);
	return function(progress) {
		var scaledProgress = timeScale(progress);
		return animation(scaledProgress);
	}
}