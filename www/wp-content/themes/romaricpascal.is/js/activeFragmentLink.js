
const ACTIVE_CLASSNAME = 'rp-HomeMenuItem-active';
// Get a live collection of the active elements
var activeActiveLinks = document.getElementsByClassName(ACTIVE_CLASSNAME);

function markInactiveLinks(activeActiveLink) {
	if (activeActiveLinks.length) {
		for (var ActiveLink of activeActiveLinks) {
			if (ActiveLink !== activeActiveLink) {
				ActiveLink.classList.remove(ACTIVE_CLASSNAME);
			}
		}
	}
}

function markActiveLink(activeActiveLink) {
	if (activeActiveLink) {
		activeActiveLink.classList.add(ACTIVE_CLASSNAME);
	}	
}

function updateActiveLinks() {
	var hash = location.hash || '#greeting-you';
	var newActiveActiveLink = document.querySelector(`[href="${hash}"]`);
	markInactiveLinks(newActiveActiveLink);
	markActiveLink(newActiveActiveLink);
}

window.addEventListener('popstate', updateActiveLinks);
updateActiveLinks();
