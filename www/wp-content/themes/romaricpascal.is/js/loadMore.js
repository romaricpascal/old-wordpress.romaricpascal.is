(function (window) {

  // Polyfill for Element.matches(), from MDN
  if (!Element.prototype.matches) {
    Element.prototype.matches =
        Element.prototype.matchesSelector ||
        Element.prototype.mozMatchesSelector ||
        Element.prototype.msMatchesSelector ||
        Element.prototype.oMatchesSelector ||
        Element.prototype.webkitMatchesSelector ||
        function(s) {
            var matches = (this.document || this.ownerDocument).querySelectorAll(s),
                i = matches.length;
            while (--i >= 0 && matches.item(i) !== this) {}
            return i > -1;
        };
  }

  // And for Element.closest()
  if (!Element.prototype.closest) {
      Element.prototype.closest =
      function(s) {
          var matches = (this.document || this.ownerDocument).querySelectorAll(s),
              i,
              el = this;
          do {
              i = matches.length;
              while (--i >= 0 && matches.item(i) !== el) {};
          } while ((i < 0) && (el = el.parentElement));
          return el;
      };
  }

  function html(text) {
    return new DOMParser().parseFromString(text, 'text/html');
  }

  var Insert = {
    after: function(newNode, referenceNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    },
    before: function(newNode, referenceNode) {
      referenceNode.parentNode.insertBefore(newNode, referenceNode);
    },
    append: function(newNode, referenceNode) {
      referenceNode.appendChild(newNode);
    }
  }

  function parseDOM(response) {
    return response.text()
      .then(html);
  }

  function insertContent(container, type) {
    return function(html) {
      var content = html.querySelector('[data-loadMore-content]');
      var insertPosition = type === 'next' ? 'before' : 'after';
      Insert[insertPosition](content, container);
      return html;
    }
  }

  function updateLink(link, type) {
    return function(html) {
      var newLink = html.querySelector('[data-loadMore-type="' + type + '"] a');
      if (newLink) {
        link.setAttribute('href', newLink.href);
      } else {
        link.remove();
      }
    }
  }

  function loadContent(linkContainer, link) {
    var url = link.href.indexOf('?') !== -1 ? link.href : link.href + '?content_only=true';
    var type = linkContainer.getAttribute('data-loadMore-type');

    linkContainer.classList.add('is-loading');
    fetch(url)
      .then(parseDOM)
      .then(insertContent(linkContainer, type))
      .then(updateLink(link, type))
      .then(function () {
        linkContainer.classList.remove('is-loading');
      });
  }

  function handleClick(event) {
    if (event.target.matches('[data-loadMore-type] a')) {
      event.preventDefault();

      var linkContainer = event.target.closest('[data-loadMore-type]');
      loadContent(linkContainer, event.target);
    }

  }
  function setupLoadMore(container) {

    container.addEventListener('click', handleClick);
    container.classList.add('has-loadMore');
  }

  window.rpSetupLoadMore = function () {

    if (window.fetch) {
      var loadMoreElement = document.querySelector('[data-loadMore]');

      if (loadMoreElement) {
        setupLoadMore(loadMoreElement);
      }
    }
  }

})(window);
