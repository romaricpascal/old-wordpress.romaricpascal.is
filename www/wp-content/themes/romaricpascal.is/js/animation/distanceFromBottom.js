import percentOf from 'tinymation/maths/percentOf';
import viewportHeight from 'tinymation/measure/viewportHeight';
import distance from 'tinymation/measure/distance';
import topOf from 'tinymation/measure/topOf';
import bottomOfViewport from 'tinymation/measure/bottomOfViewport';
import clamp from 'tinymation/scale/clamp';
import linear from 'tinymation/scale/linear';

export default function distanceFromBottom(el, start, end) {
	const scale = linear(start,end);
	return function (observer) {
		return percentOf(viewportHeight(), distance(topOf(el), bottomOfViewport()))((progress) => {
			return observer(clamp(scale(progress)));
		});
	}
}