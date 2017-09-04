const container = document.querySelector('.rp-CollapsedItems');
const collapsedItems = new Set();
var renderScheduled;
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

function scheduleRender() {
	if (!renderScheduled) {
		renderScheduled = requestAnimationFrame(function () {
			renderScheduled = false;
			renderCollapsedItems();
		});
	}
}