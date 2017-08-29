import click from './dom/click';

// Keycode mapping, necessary because of the non-standardised `.key`
// values on keyboard events :(
var _MAP = {
    8: 'backspace',
    9: 'tab',
    13: 'enter',
    16: 'shift',
    17: 'ctrl',
    18: 'alt',
    20: 'capslock',
    27: 'esc',
    32: 'space',
    33: 'pageup',
    34: 'pagedown',
    35: 'end',
    36: 'home',
    37: 'left',
    38: 'up',
    39: 'right',
    40: 'down',
    45: 'ins',
    46: 'del',
    91: 'meta',
    93: 'meta',
    224: 'meta'
};
function getKey(event) {
	return _MAP[event.keyCode] || event.key;
}

function escape(key) {
	return key.replace('\\','\\\\');
}

document.body.addEventListener('keydown', function (event) {
	console.log(arguments);
	var key = getKey(event);
	// Needs a bit of escaping in case '\' is pressed
	var selectors = '[accesskey="'+escape(key)+'"], [data-key="'+escape(key)+'"]'
	var element = document.querySelector(selectors);
	if (element) {
		event.preventDefault();
		click(element);
	}
});