/**
 * Created by yc on 1/19/2017.
 */


var models = [];

var viewer = new xViewer("xBIM-viewer");
viewer.background = [255, 255, 255];

var queryString = document.location.search.substring(1);
var params = parseQueryString(queryString);
var file = 'file' in params ? params.file : DEFAULT_URL;
viewer.load(file, file.name);
//viewer.load("vendor/threed/FourWalls.wexbim", "FourWalls");
viewer.start();

viewer.on("error", function (arg) {
    var container = viewer._canvas.parentNode;
    if (container) {
        //preppend error report
        container.innerHTML = "<pre style='color:red;'>" + arg.message + "</pre>" + container.innerHTML;
    }
});
viewer.on("pick", function(arg){
    var span = document.getElementById("id");
    if (span){
        span.innerHTML = arg.id;
    }
});
viewer.on("loaded", function(model) {
    models.push({id: model.id, name: model.tag, stopped: false});
    refreshModelsPanel();
});
viewer.on("fps", function(fps){
    var span = document.getElementById("fps");
    if (span){
        span.innerHTML = fps;
    }
});

$("#input").change(function () {
    if (!input.files) return;

    var file = this.files[0];
    if (!file) return;

    viewer.load(file, file.name);
    viewer.start();
});

function refreshModelsPanel() {
    var html = "";
    models.forEach(function(m) {
        html += "<div> " + m.name + "&nbsp;";
        html += "<button onclick='unload(" + m.id + ")'> Unload </button>";
        if (m.stopped)
            html += " <button onclick='start(" + m.id + ")'> Start </button> ";
        else
            html += " <button onclick='stop(" + m.id + ")'> Stop </button> ";
        html += "</div>";
    });
    $("#models").html(html);
}
function unload(id) {
    viewer.unload(id);
    models = models.filter(function (m) { return m.id !== id });
    refreshModelsPanel();
}
function stop(id) {
    viewer.stop(id);
    var model = models.filter(function (m) { return m.id === id }).pop();
    model.stopped = true;
    refreshModelsPanel();
}

function start(id) {
    viewer.start(id);
    var model = models.filter(function (m) { return m.id === id }).pop();
    model.stopped = false;
    refreshModelsPanel();
}


/**
 * Helper function to parse query string (e.g. ?param1=value&parm2=...).
 */
function parseQueryString(query) {
    var parts = query.split('&');
    var params = {};
    for (var i = 0, ii = parts.length; i < ii; ++i) {
        var param = parts[i].split('=');
        var key = param[0].toLowerCase();
        var value = param.length > 1 ? param[1] : null;
        params[decodeURIComponent(key)] = decodeURIComponent(value);
    }
    return params;
}
