export default function fadeInLeft(progress) {
	return {
		opacity: progress,
		transform: `translateX(-${100 * (1 - progress)}%)`
	}
}