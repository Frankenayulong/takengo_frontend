(function() {
    var exLog = console.log;
    console.log = function(msg) {
        (!window.__env || window.__env.DEBUG) && exLog.apply(this, arguments);
    }
})()