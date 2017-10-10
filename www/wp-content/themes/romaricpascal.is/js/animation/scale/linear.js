export default function linear(start, end) {
	return function (value) {
		return (value - start) / (end - start);
	}
}