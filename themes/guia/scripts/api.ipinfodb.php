<?
function getIP() { 
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
       $ips = $_SERVER['HTTP_X_FORWARDED_FOR']; 
    }  
    elseif (isset($_SERVER['HTTP_VIA'])) { 
       $ips = $_SERVER['HTTP_VIA']; 
    }  
    elseif (isset($_SERVER['REMOTE_ADDR'])) { 
       $ips = $_SERVER['REMOTE_ADDR']; 
    } 
    else {  
       $ips = "unknown"; 
    } 
     
    return $ips; 

}
?>
//IPInfoDB javascript JSON query
//Tested with FF 3.5, Opera 10, Chome 5 and IE 8
//Geolocation data is stored as serialized JSON in a cookie
//Bug reports : http://forum.ipinfodb.com/viewforum.php?f=7
// APi Myseo Jorge Carrillo
function geolocate(timezone, cityPrecision, objectVar) {
 
  var api = (cityPrecision) ? "ip-city" : "ip-country";
  var domain = 'api.ipinfodb.com';
  var ip = '<?php echo getIP()!=''?'&ip='.getIP():''; ?>';
  var url = "http://" + domain + "/v3/" + api + "/?key=9bbb735f7fca9ae4eb17e9e58745a8f731a27f26cda80c824ae47fb3959da0bd&format=json" + "&callback=" + objectVar + ".setGeoCookie"+ip;
  var geodata;
  var callbackFunc;
  var JSON = JSON || {};
 
  // implement JSON.stringify serialization
  JSON.stringify = JSON.stringify || function (obj) {
    var t = typeof (obj);
    if (t != "object" || obj === null) {
      // simple data type
      if (t == "string") obj = '"'+obj+'"';
        return String(obj);
    } else {
    // recurse array or object
      var n, v, json = [], arr = (obj && obj.constructor == Array);
      for (n in obj) {
        v = obj[n]; t = typeof(v);
        if (t == "string") v = '"'+v+'"';
        else if (t == "object" && v !== null) v = JSON.stringify(v);
        json.push((arr ? "" : '"' + n + '":') + String(v));
      }
      return (arr ? "[" : "{") + String(json) + (arr ? "]" : "}");
    }
  };
 
  // implement JSON.parse de-serialization
  JSON.parse = JSON.parse || function (str) {
    if (str === "") str = '""';
      eval("var p=" + str + ";");
      return p;
  };
 
  //Check if cookie already exist. If not, query IPInfoDB
  this.checkcookie = function(callback) {
    geolocationCookie = getCookie('geolocation');
    callbackFunc = callback;
    if (!geolocationCookie) {
      getGeolocation();
    } else {
      geodata = JSON.parse(geolocationCookie);
      callbackFunc();
    }
  }
 
  //API callback function that sets the cookie with the serialized JSON answer
  this.setGeoCookie = function(answer) {
    if (answer['statusCode'] == 'OK') {
      JSONString = JSON.stringify(answer);
      setCookie('geolocation', JSONString, 365);
      geodata = answer;
      callbackFunc();
    }
  }
 
  //Return a geolocation field
  this.getField = function(field) {
    try {
      return geodata[field];
    } catch(err) {}
  }
 
  //Request to IPInfoDB
  function getGeolocation() {
    try {
      script = document.createElement('script');
      script.src = url;
      document.body.appendChild(script);
    } catch(err) {}
  }
 
  //Set the cookie
  function setCookie(c_name, value, expire) {
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expire);
    document.cookie = c_name+ "=" +escape(value) + ((expire==null) ? "" : ";expires="+exdate.toGMTString());
  }
 
  //Get the cookie content
  function getCookie(c_name) {
    if (document.cookie.length > 0 ) {
      c_start=document.cookie.indexOf(c_name + "=");
      if (c_start != -1){
        c_start=c_start + c_name.length+1;
        c_end=document.cookie.indexOf(";",c_start);
        if (c_end == -1) {
          c_end=document.cookie.length;
        }
        return unescape(document.cookie.substring(c_start,c_end));
      }
    }
    return '';
  }
}


//function geolocate(timezone, cityPrecision, objectVar).
//If you rename your object name, you must rename 'data_country' in the function
var data_country = new geolocate(false, true, 'data_country');
//Check for cookie and run a callback function to execute after geolocation is read either from cookie or IPInfoDB API
var callback = function(){
  console.info('Visitor: ' + data_country.getField('statusCode'))
};
data_country.checkcookie(callback);
