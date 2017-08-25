(function () {

	var target = '.l-sideBySide__main';

	function replaceContent(target, newDocument) {
		var newContent = newDocument.querySelector('.l-sideBySide__main');
		var current = document.querySelector('.l-sideBySide__main');
		current.parentNode.replaceChild(newContent, current);
	}

	function updateTitle(newTitle) {
		document.title = newTitle;
	}

	function updateHistory(newTitle, newURL) {
		window.history.pushState({},newTitle,newURL);
	}

	var currentRequest;

	if (!!window.history.pushState) {
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
				if (currentRequest) {
					currentRequest.abort();
				}
				currentRequest = qwest.get(href, null, {
					// Delegates the parsing to the browsers
					responseType: 'document'
				})
					.then(function(xhr, response) {
						replaceContent(target, response);
						var title = response.title;
						updateTitle(title);
						updateHistory(title, href);
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