
function add_special(pageid)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  window.location.reload();
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		alert(xmlhttp.responseText);
		}
		
	  }
	xmlhttp.open("GET","add_special.php?pageid="+pageid,true);
	xmlhttp.send();
}

function remove_special(pageid)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  window.location.reload();
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		alert(xmlhttp.responseText);
		}
		
	  }
	xmlhttp.open("GET","remove_special.php?pageid="+pageid,true);
	xmlhttp.send();
}

function add_today(pageid)
{
	alert(pageid);
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  window.location.reload();
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		alert(xmlhttp.responseText);
		}
		
	  }
	xmlhttp.open("GET","add_today.php?pageid="+pageid,true);
	xmlhttp.send();
}
