// JavaScript Document
jQuery(document).ready(function($) {    
    $( "#tabs" ).tabs();  
}); 

function getXMLHttp() {
  var xmlHttp
  try {
    //Firefox, Opera 8.0+, Safari
    xmlHttp = new XMLHttpRequest();
  }
  catch(e) {

    //Internet Explorer
    try {
      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e) {
      try {
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch(e) {
        alert("Your browser does not support AJAX!")
        return false;
      }
    }
  }
  return xmlHttp;
}
function MakeApiRequest() {
  document.getElementById("loading-msg").innerHTML = '<div id ="check-api">Contacting Facebook API - please wait ...</div>'; 	
  var sitebase_url = document.getElementById('sitebase_url').value;
  var api_id = document.getElementById('api_id').value;
  if (api_id == '') {
    document.getElementById('loading-msg').innerHTML = '<div id="api-error">please enter your facebook api key</div>';
    return false;
  }
  var api_secret = document.getElementById('api_secret').value;
  if (api_secret == '') {
	document.getElementById('loading-msg').innerHTML = '<div id="api-error">please enter your facebook api secret</div>';
   return false;
  }
  if (document.getElementById('curl').checked) {
	var api_request = 'curl';
  }
  else {
	var api_request = 'fopen';   
  }
  var xmlHttp = getXMLHttp();
  xmlHttp.onreadystatechange = function()
  {
   if(xmlHttp.readyState == 4){
     if (xmlHttp.status==200 ){
       document.getElementById("loading-msg").innerHTML=xmlHttp.responseText
     }
     else{
       document.getElementById("loading-msg").innerHTML='<div id="apierror">An error has occured while making the request</div>';
     }
   }
  }
  xmlHttp.open("GET", sitebase_url+"?api_id=" + api_id +"&api_secret="+api_secret+"&api_request="+api_request, true);
  xmlHttp.send(null);
}

function FBSessionDeleteRequest(){
  FB.getLoginStatus(function(response) {
        if (response && response.status === 'connected') {
            FB.logout(function(response) {
                alert(response);
            });
        }
    });
}
function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}
// JavaScript Document
var FbAll = {
    facebookLogin: function () {
    var height = 300;
      var width = 550;
      var left = Number((screen.width/2)-(width/2));
      var top = Number((screen.height/2)-(height/2));
      var clientid = document.getElementsByName("client_id")[0].value;
        var redirecturi = document.getElementsByName("redirect_uri")[0].value;
        if (clientid == '') {
            alert("You have not configure facebook api settings.")
        } else {
            var openedwin = window.open('https://graph.facebook.com/v2.3/oauth/authorize?client_id=' + clientid + '&redirect_uri=' + redirecturi + '&scope=public_profile,email&display=popup', '', 'scrollbars=no, menubar=no, height='+height+', width='+width+', top='+top+', left='+left+', resizable=yes, toolbar=no, status=no');
      if (window.focus) {openedwin.focus()}
        }
    },
 
    parentRedirect: function (config) {
        var redirectto = document.getElementsByName("fball_login_form_uri")[0].value;
        var form = document.createElement('form');
        form.id = 'fball-loginform';
        form.method = 'post';
        form.action = redirectto;
        form.innerHTML = '<input type="hidden" id="fball_redirect" name="fball_redirect" value="' + redirectto + '">';
 
        var key;
        for (key in config) {
          form.innerHTML += '<input type="hidden" id="' + key + '" name="' + key + '" value="' + config[key] + '">';
        }
 
        document.body.appendChild(form);
        form.submit();
    }

    
 }



