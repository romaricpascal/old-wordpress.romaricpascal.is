(function() {

    document.body.classList.add('with-js');

    var WAYPOINTS_HANDLERS = {
        animateUSPEnter: function(direction) {
            if (!this.element.classList.contains('rp-USP-animated')) {
                this.element.classList.add('rp-USP-animated');
            }
        }
    }

    var waypoints = document.querySelectorAll('[data-waypoint]');
    [].forEach.call(waypoints, function(el) {
        var handler = WAYPOINTS_HANDLERS[el.dataset.waypointHandler];
        if (handler) {
            new Waypoint.Inview({
                element: el,
                enter: handler
            });
        }
    });
})();
