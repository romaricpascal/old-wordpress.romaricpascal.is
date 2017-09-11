import throttle from 'lodash.throttle';
import {add, remove} from './collapsibleAccess';
var menu = document.querySelector('.js-collapsible');
const COLLAPSED_CLASS = 'is-collapsed';
const COLLAPSED_ITEMS_MENU_SIZE = 30;

function getCollapsibleItems() {
	return Array.prototype.slice.call(menu.children);
}

function measureChildren() {
  return getCollapsibleItems().map(function (el) {
    return {
      el: el,
      size: el.scrollWidth
    };
  });
}

function getTotalSize(measures) {
  return measures.reduce(function(sum, measure) {
    return sum + measure.size
  }, COLLAPSED_ITEMS_MENU_SIZE); // Account for the apparition of the collapsed items menu, which will reduce the space available
}

function collapseItem (el) {
  add(el);
  el.classList.add(COLLAPSED_CLASS);
}

function restoreItem(el) {
	el.classList.remove(COLLAPSED_CLASS);
	remove(el);
}

function collapseContent() {
  var availableWidth = menu.clientWidth;
  var measures = measureChildren();
  measures.reduce(function (currentWidth, measure) {
    if (currentWidth > availableWidth) {
      collapseItem(measure.el);
      return currentWidth - measure.size;
    } else {
      restoreItem(measure.el);
      return currentWidth;
    }
  }, getTotalSize(measures));
}

if (menu) {
	window.addEventListener('resize', throttle(collapseContent, 200));
	collapseContent();
}