
const ACTIVE_CLASSNAME = '.rp-HomeMenuItem-active';
var activeActiveLinks = Array.prototype.slice.call(document.querySelectorAll(ACTIVE_CLASSNAME));

function markInactiveLinks(activeActiveLink) {
	if (activeActiveLinks.length) {
		for (var activeLink of activeActiveLinks) {
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
