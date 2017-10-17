import latest from './latest';

function m(res, value) {
	console.log('Is min', res, value);
	return value < res ? value : res;
}

export default function min(s1, s2) {
	return latest(values => values.reduce(m), s1, s2);
}