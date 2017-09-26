export default function (progress) {
	return {
		transform: `translateX(-${100 * (1 - progress)}%)`
	}
}