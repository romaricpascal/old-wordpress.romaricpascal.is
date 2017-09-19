import {polyfill} from 'smoothscroll-polyfill';

polyfill();

const TARGET_TOP = {};

function getNearestFragmentLink(element) {
	// Naive implementation assuming no frament links
	// implemented like: //<same-domain>/<same-path>#fragment-id
	return element.matches('a[href^="#"], .js-smoothScroll')? element : element.closest('a[href^="#"], .js-smoothScroll');
}

function getTarget(a) {
	var hash = a.hash;
	if (hash) {
		return document.getElementById(a.hash.replace('#',''));
	} else {
		return TARGET_TOP;
	}
}

function scrollIntoView(target) {
	if (target === TARGET_TOP) {
		window.scroll({ top: 0, left: 0, behavior: 'smooth' })
		document.body.focus();
	} else {
		target.scrollIntoView({behavior: 'smooth'});
		target.focus();		
	}
}

if (history.pushState) {
	document.body.addEventListener('click', function (event) {

		if (!event.defaultPrevented) {
			var link = getNearestFragmentLink(event.target);
			if (link) {
				var target = getTarget(link);
				if (target) {
					event.preventDefault();
					scrollIntoView(target);
					history.pushState({}, document.title, event.target.href );
				}
			}
		}
	});
}
