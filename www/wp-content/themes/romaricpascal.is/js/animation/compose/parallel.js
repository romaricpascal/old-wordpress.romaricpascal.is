export default function parallel(animations) {
	return function(progress) {
		return animations.map(animation => {
			return animation(progress);
		});
	}
}