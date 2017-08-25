(function () {

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

		function animateExit(element, direction) {
			return new Promise(function (resolve, reject) {
				element.classList.add('is-exiting', 'is-exiting-' + direction);
				setTimeout(function () {
					resolve(element);
					// TODO: Make sure animations have completed
				}, 500);
			});
		}

		function loadContent(href) {
			return qwest.get(href, null, {
				// Delegates the parsing to the browsers
				responseType: 'document'
			}, monitorProgress);
		}

		function markEntrance(element) {
			return new Promise(function (resolve, reject) {
				element.classList.add('is-entering');
				resolve(element);
			});
		}

		document.body.addEventListener('click', function (event) {

			// Keep behavior if Ctrl-Clicked or middle/right-clicked
			if (event.ctrlKey || event.which === 2 || event.which === 3) {
			      return;
			}

			if (event.target.matches('[data-ajax]')) {
				event.preventDefault();
				// Load results
				var href = event.target.getAttribute('href');
				var target = event.target.getAttribute('data-ajax');
				var direction = event.target.getAttribute('rel') === 'prev' ? 'left' : 'right';
				if (currentRequest) {
					currentRequest.abort();
				}
				currentRequest = loadContent(href);
				Promise.all([
					currentRequest, 
					animateExit(document.querySelector(target), direction)
				]).then(function(promisesResults) {
						var response = promisesResults[0].response;
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