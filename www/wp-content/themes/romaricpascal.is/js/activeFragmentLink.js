
const ACTIVE_CLASSNAME = 'rp-HomeMenuItem-active';
// Get a live collection of the active elements
var activeActiveLinks = document.getElementsByClassName(ACTIVE_CLASSNAME);

function markInactiveLinks(activeActiveLink) {
	if (activeActiveLinks.length) {
		for (var i = 0; i < activeActiveLinks.length; i++) {
			var activeLink = activeActiveLinks[i];
			if (activeLink !== activeActiveLink) {
				activeLink.classList.remove(ACTIVE_CLASSNAME);
			}
		}
	}
}

function markActiveLink(activeActiveLink) {
	if (activeActiveLink) {
		activeActiveLink.classList.add(ACTIVE_CLASSNAME);
	}	
}

function getActiveLink(hash) {
	if (hash) {
		return document.querySelector(`.js-activeFragmentLink[href="${hash}"]`);
	} else {
		return document.querySelector('.js-activeFragmentLink-default');
	}
}

function updateActiveLinks() {
	var newActiveActiveLink = getActiveLink(location.hash);
	markInactiveLinks(newActiveActiveLink);
	markActiveLink(newActiveActiveLink);
}

window.addEventListener('popstate', updateActiveLinks);
updateActiveLinks();
