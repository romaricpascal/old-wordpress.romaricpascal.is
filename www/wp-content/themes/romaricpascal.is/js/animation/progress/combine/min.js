function min(res, value) {
	return value < res ? value : res;
}

export default function multiply(...sources) {

	return function (animation) {
		var progresses = [];
		return sources.map((source, index) => {
			return source((progress) => {
				progresses[index] = progress;
				return animation(progresses.reduce(min));
			});
		});		
	}
}