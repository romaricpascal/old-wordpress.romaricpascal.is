import linear from '../scale/linear';
import clamp from '../scale/clamp';


export default function stagger(animations) {
	// Add time for all animations to run
	var timeScale = linear(0, 1, 0, 1 + (animations.length - 1) / animations.length)
	return function (progress) {
		return animations.map( (animation, index) => {
			return animation(clamp(timeScale(progress) - 1/animations.length * index));
		});
	}
}