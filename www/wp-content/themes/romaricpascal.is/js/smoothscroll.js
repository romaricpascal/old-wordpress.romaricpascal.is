import {polyfill} from 'smoothscroll-polyfill';

polyfill();

function isFragmentLink(element) {
	// Naive implementation assuming no frament links
	// implemented like: //<same-domain>/<same-path>#fragment-id
	return element.matches('a[href^="#"]');
}

function getFragment(a) {
	return a.hash;
}

if (history.pushState) {
	document.body.addEventListener('click', function (event) {

		if (isFragmentLink(event.target)) {
			console.log('Smooth scrolling!!!!');
			var targetSelector = getFragment(event.target);
			var targetElement = document.querySelector(targetSelector);
			if (targetElement) {
				event.preventDefault();
				targetElement.scrollIntoView({behavior: 'smooth'});
				targetElement.focus();
				history.pushState({}, document.title, event.target.href );
			}
		}
	});
}
