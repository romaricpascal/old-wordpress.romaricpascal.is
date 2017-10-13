import linear from '../scale/linear';
import clamp from '../scale/clamp';

export default function shift(animation, position) {
	var timeScale = linear(position.start, position.end);
	return function(progress) {
		var scaledProgress = clamp(timeScale(progress));
		return animation(scaledProgress);
	}
}