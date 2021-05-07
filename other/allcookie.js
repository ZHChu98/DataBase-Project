function setCookie(cname,cvalue,exdays,path)
{
  var d = new Date();
  d.setTime(d.getTime()+(exdays*24*60*60*1000));
  var expires = "expires="+d.toGMTString();
  document.cookie = cname + "=" + cvalue + "; " + path + "; "+ expires;;
}

function getCookie(cname){
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i].trim();
		if (c.indexOf(name)==0) { return c.substring(name.length,c.length); }
	}
	return "";
}
function checkCookie(){
	var user=getCookie("welcome");
	if (user!=""){
		alert("welcome " + user + " !");
	}
	else {
		user = prompt("please entry your name:","");
  		if (user!="" && user!=null){
    		setCookie("username",user,30);
    	}
	}
}
