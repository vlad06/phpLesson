
var map;	//the google maps map
var infowindow; //google maps info bubble
var xhr = null; //for referencing the XMLHttpRequest object

//show the map on loading
function initMap(){
	var latlng=new google.maps.LatLng(43.697293, 7.278357);
	var myOptions={	//options... javascript table, JSON notation
		zoom: 8,
		center: latlng,
		mapTpeId: google.maps.MapTypeId.ROADMAP
	};
	//instanciation of google maps object
	map=new google.maps.Map(document.getElementById("map"),myOptions);
	//instanciation of info bubble
	infowindow=new google.maps.infowindow({
		content: "ABI : Nous sommes ici ! <br />144 route de turin <br />06300 NICE",
		size: new google.maps.Size(50,50),
		position: latlng
	});
	//instanciation of personalize marker
	var marker = new google.maps.Marker({
		map:map,
		position: latlng
	});

	google.maps.event.addListener(marker, 'click', function(){info();});
	info();
}	//end of initMap()

function info(){
	infowindow.open(map);
}

function xhrInit(){
	try{
		xhr=new XMLHttpRequest();
	}
	catch(e){
		xhr=null;
		return;
	}
}

function controleIdentAjax(login,password) {
	if(login.value.length==0){
		alert("Veuillez saisir un nom de login correct !");
		login.focus();
	}
	else {
		if(password.value.length==0){
			alert("Veuillez saisir un mot de passe correct !");
			password.focus();
		}
		else{
			console.log('dans controleIdentAjax login n pass filled');
			xhrInit();
			xhr.open("GET","controleIdent.php?login="+login.value+"&password="+password.value,true);
			xhr.send(null);
			xhr.onreadystatechange=function(){
				if(xhr.readyState==4){
					result=xhr.responseText;
					if(result=='OK'){
						// document.getElementById('lien').href='javascript:choixCateg();';
						// choixCateg();
						document.getElementById('lblError').innerHTML=result;
					}
					else{
						document.getElementById('lblError').innerHTML=result;
					}
				}
			}
		}
	}
	return false;
}
