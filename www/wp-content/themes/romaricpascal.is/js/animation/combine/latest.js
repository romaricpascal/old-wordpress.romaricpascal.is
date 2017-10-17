export default function latest(transform, ...sources) {
	return function ltst(observer) {
		var values = [];
		return sources.map((source, index) => {
			return source((value) => {
				values[index] = value;
				return observer(transform(values));
			});
		});
	}
}