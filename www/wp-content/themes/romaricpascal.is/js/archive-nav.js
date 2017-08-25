(function () {
	
	function parseHTML(response) {

	}

	if (!!document.body.classList) {
		document.body.addEventListener('click', function (event) {

			// Keep behavior if Ctrl-Clicked or middle/right-clicked
			if (event.ctrlKey || event.which === 2 || event.which === 3) {
			      return;
			}
			
			if (event.target.matches('.rp-PrevNextNav-project a.rp-PrevNextLink')) {
				event.preventDefault();

				// Load results
				var href = event.target.getAttribute('href');
				console.log(href);
				qwest.get(href, null, {
					responseType: 'document'
				})
					.then(function(xhr, response) {
						var newContent = response.querySelector('.l-sideBySide__main');
						var current = document.querySelector('.l-sideBySide__main');
						current.parentNode.replaceChild(newContent, current);
					})
					.catch(function () {
						console.log(arguments);
						// In case of error, just navigate out like it would have happened without JS
						// window.location = href;
					});
				// Replace navigation links
				// Animate current ones exit
				// Animate new ones entrance
			}
		});
	}
})();