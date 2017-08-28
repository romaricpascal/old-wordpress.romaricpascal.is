(function () {
	
	if (history.pushState) {

		function isFragmentLink(element) {
			// Naive implementation assuming no frament links
			// implemented like: //<same-domain>/<same-path>#fragment-id
			return element.matches('a[href^="#"]');
		}

		function getFragment(a) {
			return a.hash;
		}

		document.body.addEventListener('click', function (event) {

			if (isFragmentLink(event.target)) {
				var targetSelector = getFragment(event.target);
				var targetElement = document.querySelector(targetSelector);
				if (targetElement) {
					event.preventDefault();
					targetElement.scrollIntoView({behavior: 'smooth'});
					history.pushState({}, document.title, event.target.href );
				}
			}
		});
	}
})();