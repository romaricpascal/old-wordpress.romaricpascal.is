import qwest from 'qwest';

import swap from './dom/swap';
import {updateProgress, clearProgress} from './ProgressBar';
import OuterHTMLReplacement from './OuterHTMLReplacement';
import AttributeReplacement from './AttributeReplacement';
import HrefReplacement from './HrefReplacement';

function replaceContent(target, newDocument) {
	var newContent = newDocument.querySelector(target);
	var current = document.querySelector(target);
	swap(current, newContent);
}

function updateHistory(newTitle, newURL) {
	window.history.pushState({},newTitle,newURL);
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

	var currentRequest;

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

function getReplacements(targetDescriptions) {
	var targets = targetDescriptions.split(',');
	return targets.map(function (target) {

		var tokens = target.split(':');
		if (tokens.length > 1) {
			if (tokens[1] === 'href') {
				return new HrefReplacement(tokens[0], tokens[1]);
			}
			return new AttributeReplacement(tokens[0],tokens[1]);
		} else {
			return new OuterHTMLReplacement(target);
		}
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
			
			window.location = href;
		});
}

if (!!window.history.pushState && document.body.classList) {

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
