export default function linear(start, end, targetStart = 0, targetEnd = 1) {
	return function (value) {
		return targetStart + (targetEnd - targetStart) * ((value - start) / (end - start));
	}
}