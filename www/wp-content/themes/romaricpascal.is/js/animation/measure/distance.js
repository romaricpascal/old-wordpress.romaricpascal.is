import latest from '../combine/latest';

export default function distance(startSource, endSource) {
	return latest(([start = 0, end = 0]) => {
		return end - start;
	}, startSource, endSource);
}
