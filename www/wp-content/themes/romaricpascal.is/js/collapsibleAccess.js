const menu = document.querySelector('.rp-CollapsedItemsMenu');
const container = document.querySelector('.rp-CollapsedItems');
var renderScheduled;

const collapsedItems = new Set();

export function add(el) {
	collapsedItems.add(el);
	scheduleRender();
}

export function remove(el) {
	collapsedItems.delete(el);
	scheduleRender();
}

export function clear() {
	collapsedItems.clear()
	scheduleRender();
}

function hasItems () {
	// First entry isn't done if we have items
	return !collapsedItems.entries().next().done;
}

function renderCollapsedItems() {
	console.log('Re-rendering collapsed items', collapsedItems);
	container.innerHTML = '';
	collapsedItems.forEach(function (el) {
		var clone = el.cloneNode(true);
		clone.classList.remove('is-collapsed');
		console.log('Appending node', clone);
		container.appendChild(clone);
	});
}

function updateMenuClass() {
	console.log('Updating menu class');
	if (hasItems()) {
		menu.classList.add('has-items');
	} else {
		menu.classList.remove('has-items');
	}
}

function scheduleRender() {
	if (!renderScheduled) {
		renderScheduled = requestAnimationFrame(function () {
			renderScheduled = false;
			renderCollapsedItems();
			updateMenuClass();
		});
	}
}