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

	if (!!window.history.pushState && document.body.classList) {

		var progressBar = document.createElement('div');
		progressBar.classList.add('rp-ProgressBar');
		document.body.appendChild(progressBar);

		function updateProgress(ratio) {
			progressBar.style.width = (100 * ratio) + '%';
		}

		function clearProgress() {
			updateProgress(0);
		}

		function monitorProgress(xhr) {
			xhr.addEventListener('progress', function (e) {
				if (e.lengthComputable) {
					updateProgress(e.loaded / e.total);
				}
			});
			xhr.addEventListener('abort', clearProgress);
			xhr.addEventListener('load', clearProgress);
		}

		document.body.addEventListener('click', function (event) {

			// Keep behavior if Ctrl-Clicked or middle/right-clicked
			if (event.ctrlKey || event.which === 2 || event.which === 3) {
			      return;
			}
			
			if (event.target.matches('.rp-PrevNextNav-project a.rp-PrevNextLink')) {
				event.preventDefault();

				// Load results
				var href = event.target.getAttribute('href');
				if (currentRequest) {
					currentRequest.abort();
				}
				currentRequest = qwest.get(href, null, {
					// Delegates the parsing to the browsers
					responseType: 'document'
				}, monitorProgress)
					.then(function(xhr, response) {
						updateProgress(0);
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