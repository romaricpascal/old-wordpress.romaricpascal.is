const TOGGLE_CLASS = 'is-visible';

function clearGroup(group, toggledSelector) {
	var els = document.querySelectorAll(`[data-toggle-group="${group}"`);
	Array.prototype.forEach.call(els, function (el) {
		var selector = el.getAttribute('data-toggle-target');
		doClear(`*:not(${toggledSelector})${selector}`);
	});
}

function doClear(selector) {
	var target = document.querySelectorAll(selector);
	Array.prototype.forEach.call(target, function (el) {
		el.classList.remove(TOGGLE_CLASS);
	});
}

function doToggle(selector) {
	var target = document.querySelector(selector);
	if (target) {
		target.classList.toggle(TOGGLE_CLASS);
	}
}

if(document.body.classList) {

	document.body.addEventListener('click', function(event) {
		var toggle = event.target.matches('.js-toggle')? event.target : event.target.closest('.js-toggle');
		if (toggle) {
			event.preventDefault();
			var targetSelector = toggle.getAttribute('data-toggle-target');
			var group = toggle.getAttribute('data-toggle-group');
			clearGroup(group, targetSelector);
			doToggle(targetSelector);
		} else {
			var outsideToggle = event.target.closest('.js-outsideToggle');
			if (!outsideToggle) {
				doClear('.js-outsideToggle');
			}
		}
	});
}
