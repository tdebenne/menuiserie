var getHttpRequest = function () {
	var httpRequest = false;
  
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
	  httpRequest = new XMLHttpRequest();
	  if (httpRequest.overrideMimeType) {
		httpRequest.overrideMimeType('text/xml');
	  }
	}
	else if (window.ActiveXObject) { // IE
	  try {
		httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
	  }
	  catch (e) {
		try {
		  httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch (e) {}
	  }
	}
  
	if (!httpRequest) {
	  alert('Abandon : Impossible de créer une instance XMLHTTP');
	  return false;
	}
  
	return httpRequest
  }


  var post = getHttpRequest();
  post.onreadystatechange = function () {
	if (post.readyState === 4) {
	  if (post.status === 200) {
		alert(post.responseText);
		location.reload();
	  } else {
		alert("Error AJAX call");
	  }
	}
  }


  function remove_event (event){
	if(confirm("Êtes-vous sûr de vouloir supprimer cet article ?\nCette action sera définitive.") == true ) {
		var data = new FormData();
		data.append('asup', event);
	
		
		post.open('POST', 'supEvent.php', true);
		post.setRequestHeader('X-Requested-With', 'xmlhttprequest');
		post.overrideMimeType('text/plain');
		post.send(data);
	}
}


function voirPLus(real){
	var inscr = window.open("/menuiserie/assets/php/realisation.php?rea="+real, real);
}