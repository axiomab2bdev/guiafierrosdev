/*
Copyright DHTMLX LTD. http://www.dhtmlx.com
To use this component please contact sales@dhtmlx.com to obtain license
*/




dhtmlXGridObject.prototype.enableAutoSizeSaving = function(name,cookie_param){this.setOnResizeEnd(function(){this.saveSizeToCookie(name,cookie_param) })};dhtmlXGridObject.prototype.saveSizeToCookie=function(name,cookie_param){if (!name)name=this.entBox.id;if (this.cellWidthType=='px')var z=this.cellWidthPX.join(",");else
 var z=this.cellWidthPC.join(",");this.setCookie("gridSizeA"+name,z,cookie_param);var z=(this.initCellWidth||(new Array)).join(",");this.setCookie("gridSizeB"+name,z,cookie_param);return true};dhtmlXGridObject.prototype.loadSizeFromCookie=function(name){if (!name)name=this.entBox.id;var z=this.getCookie("gridSizeB"+name);if (z)this.initCellWidth=z.split(",");var z=this.getCookie("gridSizeA"+name);if ((z)&&(z.length))
 if (this.cellWidthType=='px')this.cellWidthPX=z.split(",");else
 this.cellWidthPC=z.split(",");this.setSizes();return true};dhtmlXGridObject.prototype.clearSizeCookie=function(name){if (!name)name=this.entBox.id;this.setCookie("gridSizeA"+name,"");this.setCookie("gridSizeB"+name,"")};dhtmlXGridObject.prototype.setCookie=function(name,value,cookie_param) {var str = name + "=" + value + (cookie_param?(";"+cookie_param):"");document.cookie = str};dhtmlXGridObject.prototype.getCookie=function(name) {var search = name + "=";if (document.cookie.length > 0){var offset = document.cookie.indexOf(search);if (offset != -1){offset += search.length;var end = document.cookie.indexOf(";", offset);if (end == -1)end = document.cookie.length;return document.cookie.substring(offset, end)}}};

/*
Copyright DHTMLX LTD. http://www.dhtmlx.com
To use this component please contact sales@dhtmlx.com to obtain license
*/