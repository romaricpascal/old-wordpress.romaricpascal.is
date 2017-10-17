import percentOf from './maths/percentOf';
import viewportHeight from './measure/viewportHeight';
import distance from './measure/distance';
import topOf from './measure/topOf';
import bottomOfViewport from './measure/bottomOfViewport';
import clamp from './scale/clamp';
import linear from './scale/linear';

export default function distanceFromBottom(el, start, end) {
	const scale = linear(start,end);
	return function (observer) {
		return percentOf(viewportHeight(), distance(topOf(el), bottomOfViewport()))((progress) => {
			return observer(clamp(scale(progress)));
		});
	}
}