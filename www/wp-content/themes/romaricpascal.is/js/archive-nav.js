(function () {

	function swap(oldElement, newElement) {
		return oldElement.parentNode.replaceChild(newElement, oldElement);
	}

	function replaceContent(target, newDocument) {
		var newContent = newDocument.querySelector(target);
		var current = document.querySelector(target);
		current.parentNode.replaceChild(newContent, current);
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
					element.classList.remove('is-exiting', 'is-exiting-' + direction);
					resolve(element);
					// TODO: Make sure animations have completed by listening to DOM events for example
				}, 500);
			});
		}

		function animateEntrance(element, direction) {
			return new Promise(function (resolve, reject) {
				element.classList.add('is-entering', 'is-entering-' + direction);
				setTimeout(function () {
					element.classList.remove('is-entering', 'is-entering-' + direction);
					resolve(element);
					// TODO: Make sure animations have completed by listening to DOM events for example
				}, 500);
			});
		}


		function loadContent(href) {
			if (currentRequest) {
				currentRequest.abort();
			}
			currentRequest = qwest.get(href, null, {
				// Delegates the parsing to the browsers
				responseType: 'document'
			}, monitorProgress);

			return currentRequest;
		}

		function OuterHTMLReplacement (selector) {
			this.selector = selector;
		}

		OuterHTMLReplacement.prototype.exit = function (options) {
			var element = document.querySelector(this.selector);
			return animateExit(element, options.direction);
		}

		OuterHTMLReplacement.prototype.entrance = function (html, options) {
			var oldElement = document.querySelector(this.selector);
			var newElement = html.querySelector(this.selector);
			animateEntrance(newElement, options.direction);
			swap(oldElement, newElement);
		}

		function getReplacements(targetDescriptions) {
			var targets = targetDescriptions.split(',');
			return targets.map(function (target) {

				// Could do more mapping, eg. have an "AttributeReplacement" 
				// that would need to take an attribute (or list of attribute)
				// and just update that attribute onto the document
				// eg .the-target:href
				return new OuterHTMLReplacement(target);
			});
		}

		function runExits(replacements, options) {
			return Promise.all(replacements.map(function (replacement) {
				return replacement.exit(options);
			}));
		}

		function runEntrances(replacements, html, options) {
			return Promise.all(replacements.map(function (replacement) {
				replacement.entrance(html, options);
			}));
		}

		function ajax(href, targetDescriptions, options) {
			
			var replacements = getReplacements(targetDescriptions);
			
			Promise.all([
				loadContent(href),
				runExits(replacements, options)
			]).then(function(promisesResults) {

					var response = promisesResults[0].response;
					runEntrances(replacements, response, options);
					replaceContent('title', response);
				})
				.then(function () {
					updateHistory(document.title, href);
				})
				.catch(function () {
					console.log(arguments);
					// In case of error, just navigate out like it would have happened without JS
					// window.location = href;
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
				var direction = event.target.getAttribute('rel') === 'prev' ? 'left' : 'right';
				var targetDescriptions = event.target.getAttribute('data-ajax');

				ajax(href, targetDescriptions, {direction:direction});
			}
		});
	}
})();