import latest from '../combine/latest';

export default function percentOf(refSource, valueSource) {
return latest(([ref = 1, value = 0]) => {
		return value / ref;
	}, refSource, valueSource);
}