
document.body.classList.add('with-js');

// Enhance history.pushState so it triggers an event when used

function triggerPopState(state) {
	var event = document.createEvent('PopStateEvent');
	event.initEvent('popstate', true, false, state);
	window.dispatchEvent(event);
}

var originalPushState = history.pushState;
history.pushState = function pushState(state, title, url) {
	console.log('Pushing state');
	originalPushState.call(history, state, title, url);
	triggerPopState(state);
}
history.pushState.original = originalPushState;
history.pushState.restore = function () {
	history.pushState = history.pushState.original;
}

var originalReplaceState = history.replaceState;
history.replaceState = function replaceState(state, title, url) {
	console.log('Replacing state');
	originalReplaceState.call(history, state, title, url);
	triggerPopState(state);
}
history.replaceState.original = originalReplaceState;
history.replaceState.restore = function () {
	history.replaceState = history.replaceState.original;
}

require('./inview');
require('./menu');
require('./keyboard');
require('./archive-nav');
require('./smoothscroll');
require('./activeFragmentURL');
require('./activeFragmentLink');
require('./prevNext');
