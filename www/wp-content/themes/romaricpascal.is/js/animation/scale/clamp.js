export default function clamp(value) {
	return value < 0 ? 0 : value > 1 ? 1 : value;
}