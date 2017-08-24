(function () {
	if(!!document.body.classList) {

		var observer = new IntersectionObserver(function (entries, observer) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-inView');
				} else {
					entry.target.classList.remove('is-inView');
				}
			});
		}, {
			threshold: 0.25
		});

		var targets = document.querySelectorAll('[data-inview]');
		Array.prototype.forEach.call(targets, function (target) {
			observer.observe(target);
		});
	}
})();