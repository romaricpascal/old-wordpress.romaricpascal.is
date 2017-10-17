import time from './progress/time';
import min from './combine/min';
import parallel from './compose/parallel';
import shift from './timing/shift';
import zoomIn from './css/zoomIn';
import distanceFromBottom from './distanceFromBottom';

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

const DURATION = 1500;
function getSource(target) {
    const scrollSource = distanceFromBottom(target, 0.2, 0.5);

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
        animation(0);
        getSource(targets[index])(animation);
        
      });
}

if (document.body.classList.contains('archive') || document.body.classList.contains('blog')) {
    var animation = getAnimation(document.querySelector(SELECTOR));
    animation(0);
    time(DURATION, 0, false)(animation); 
}
