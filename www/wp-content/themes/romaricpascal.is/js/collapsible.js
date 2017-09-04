import throttle from 'lodash.throttle';
import {add, remove} from './collapsibleAccess';

var menu = document.querySelector('.js-collapsible');
var COLLAPSED_CLASS = 'is-collapsed';

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
  }, 0);
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

window.addEventListener('resize', throttle(collapseContent, 200));
collapseContent();