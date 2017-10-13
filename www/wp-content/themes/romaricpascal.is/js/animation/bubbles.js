import scroll from './progress/scroll';
import time from './progress/time';
import min from './progress/combine/min';
import parallel from './compose/parallel';
import shift from './timing/shift';
import zoomIn from './css/zoomIn';
import linear from './scale/linear';
import clamp from './scale/clamp';

function applyStyle(el, style) {
    for (var property in style) {
        el.style[property] = style[property];
    }
}

const ANIMATIONS = {
    oneOneTwo: [
        shift(zoomIn, { start: 0.2, end: 0.5 }),
        shift(zoomIn, { start: 0.0, end: 0.5 }),
        shift(zoomIn, { start: 0.4, end: 0.7 }),
        shift(zoomIn, { start: 0.6, end: 0.8 })
    ],

    twoOneOne: [
        shift(zoomIn, { start: 0.2, end: 0.5 }),
        shift(zoomIn, { start: 0, end: 0.6 }),
        shift(zoomIn, { start: 0, end: 0.5 }),
        shift(zoomIn, { start: 0.4, end: 0.8 })
    ],

    oh: [
        shift(zoomIn, { start: 0, end: 0.3 }),
        shift(zoomIn, { start: 0.4, end: 0.7 }),
        shift(zoomIn, { start: 0.2, end: 0.7 }),
        shift(zoomIn, { start: 0.6, end: 1 })
    ]

    // For now, let's leave the greeting to CSS animations
    // greeting: [
    //     speed(shift(zoomIn, { start: 0, end: 0.3 }), 1 / 1.3),
    //     speed(shift(zoomIn, { start: 0.4, end: 0.7 }), 1 / 1.3),
    //     speed(shift(zoomIn, { start: 0.2, end: 0.7 }), 1 / 1.3),
    //     speed(shift(zoomIn, { start: 0.2, end: 0.7 }), 1 / 1.3),
    //     speed(shift(zoomIn, { start: 1, end: 1.3 }), 1 / 1.3),
    //     speed(shift(zoomIn, { start: 0.8, end: 0.5 }), 1 / 1.3),
    //     speed(shift(zoomIn, { start: 0.8, end: 0.5 }), 1 / 1.3)
    // ]
};
function mapElementsByIndex(els) {
    return function (animation, index) {
        var el = els[index]
        if (!el) return () => {}
        return function animate(progress) {
            applyStyle(el, animation(progress));
        }
    }
}
const SELECTOR = '.js-ScrollAnim';
const PART_SELECTOR = `${SELECTOR}__part`;
function getAnimation(target) {
    var parts = target.querySelectorAll(PART_SELECTOR);
    var animationName = target.getAttribute('data-scrollAnim-name') || 'oneOneTwo';
    var mapper = mapElementsByIndex(parts);
    return parallel(ANIMATIONS[animationName].map(mapper));
}
const viewportHeight = document.documentElement.clientHeight;
const bottomOfViewport = document.documentElement.clientHeight;
const scale = linear(0.20, 0.5);
const DURATION = 1500;
function getSource(target) {
    const scrollSource = scroll(function () {
        // OPTIMIZE: 
        // Probs some caching doable to speed things up as layout doesn't change unless resized
        // Also probably some avoidable calculations for element super far out to keep things light
        // Eg. Use Intersection obeserver to check the element is about to get into viewport
        var topOfElement = target.getBoundingClientRect().top;
        var distanceFromBottom = bottomOfViewport - topOfElement;
        return clamp(scale(distanceFromBottom / viewportHeight));
    });

    if (window.location.hash) {
        if (target.matches(`${window.location.hash} ${SELECTOR}`)) {
            const timeSource = (time(DURATION, 0, false));
            return min(scrollSource, timeSource);
        }
    }

    return scrollSource;
}

var targets = Array.prototype.slice.call(document.querySelectorAll(SELECTOR));
if (document.body.classList.contains('home')) {
    targets.map(getAnimation)
      .map((animation, index) => {
        getSource(targets[index])(animation);
        animation(0);
      });
}

if (document.body.classList.contains('archive') || document.body.classList.contains('blog')) {
    var animation = getAnimation(document.querySelector(SELECTOR));
    time(DURATION, 0, false)(animation);
    animation(0);
}
