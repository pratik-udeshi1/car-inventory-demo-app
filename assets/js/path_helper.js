var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var ajaxUrl = baseUrl + "/app/ajax";
var uploadsPath = baseUrl + "/assets/images/uploads/";