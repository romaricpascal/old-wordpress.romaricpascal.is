export default function zoomIn(progress) {
	return {
		transform: `scale(${progress})`,
		opacity: progress
	}
}