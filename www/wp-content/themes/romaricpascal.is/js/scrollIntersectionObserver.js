(function () {

	if (Object.assign) {
		var viewport = {
			x:0, 
			y:0, 
			width: document.documentElement.clientWidth,
			height: document.documentElement.clientHeight,
			top: 0,
			left: 0,
			right: document.documentElement.clientWidth,
			bottom: document.documentElement.clientHeight
		}

		function computeIntersection(rect1, rect2) {
			var top = Math.max(rect1.top, rect2.top);
			var bottom = Math.min(rect1.bottom, rect2.bottom);
			var left = Math.max(rect1.left, rect2.left);
			var right = Math.min(rect1.right, rect2.right);
			var width = right - left;
			var height = bottom - top;
			return {
				x: top,
				y: left,
				width: width,
				height: height,
				top: top,
				left: left,
				right: left + width,
				bottom: top + height 
			};
		}

		function computeIntersectionRatio(intersectionRect, elementRect) {
			if (!(intersectionRect.width >=0 && intersectionRect.height >= 0)) {
				return 0;
			}

			if (elementRect.width !== 0 || intersectionRect.height === 0) {
				return 1;
			}

			return (intersectionRect.width / elementRect.width) * (intersectionRect.height / elementRect.height);
		}

		window.ScrollIntersectionObserver = function ScrollIntersectionObserver(callback) {
			this.callback = callback || function (){};
			this.observed = [];
			this.onScroll = this.onScroll.bind(this);
			this.observe = this.observe.bind(this);
		};

		ScrollIntersectionObserver.prototype.onScroll = function onScroll() {
			console.log('Scroll detected');
			var entries = this.takeRecords();
			this.callback(entries, this);
		}

		ScrollIntersectionObserver.prototype.observe = function observe(element) {

			if (typeof element === 'string') {
				console.log('Using selector');
				return this.observe(document.querySelectorAll(element));
			} else if (element instanceof NodeList) {
				console.log('Using NodeList')
				return Array.prototype.map.call(element, this.observe);
			}

			console.log('Adding element');
			this.observed.push(element);
			if (this.observed.length && !this.listening) {
				this.listening = true;
				window.addEventListener('scroll', this.onScroll);
			}
		}

		ScrollIntersectionObserver.prototype.takeRecords = function takeRecords() {
			return this.observed.length && this.observed.map(function (element) {
				return {
					target: element,
					boundingClientRect: element.getBoundingClientRect()
				}
			}).map(function (entry) {
				return Object.assign({
					rootBounds: viewport,
					intersectionRect: computeIntersection(viewport, entry.boundingClientRect)
				}, entry);
			}).map(function (entry) {
				return Object.assign({
					intersectionRatio: computeIntersectionRatio(entry.intersectionRect, entry.boundingClientRect),
					isIntersecting: entry.intersectionRect.width >=0 && entry.intersectionRect.height >= 0,
				}, entry);
			});
		}
	}
})();