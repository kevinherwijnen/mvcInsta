

// preview image upload bij add image
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#myImg')
			.attr('src', e.target.result)
			$('#myImg')
			.attr('data-route-id-add', e.target.result)
			

		};
		reader.readAsDataURL(input.files[0]);
	}
}


//om de foto in de modal te open heb je dit stukje nodig die de route van de image toestuurt
$(document).ready(function(){
	$('#my_modal').on('show.bs.modal', function(e) {
		var RouteIdAdd = $(e.relatedTarget).data('data-route-id-add');
		var RouteId = $(e.relatedTarget).data('route-id');
		var DescriptionId = $(e.relatedTarget).data('description-id');
		var photoId = $(e.relatedTarget).data('photo-id');
		var userId = $(e.relatedTarget).data('id');
		var commentId = $(e.relatedTarget).data('reaction');
		var userPost = $(e.relatedTarget).data('user-post');
		var userPostId = $(e.relatedTarget).data('user-post-id');
		$('#img01').attr('src', RouteIdAdd);

		$('#myImage').attr('src', RouteId);

		$('#Description span').text(DescriptionId);


		$('#routeLoc').attr('value', RouteId);

		$('#getMyPhotoId').attr('value', photoId);

		$('#getMyPhotoId').attr('data-id', userId);

		$('#getMyPhotoId').attr('data-reaction', commentId);

		$('#userPost').attr('user-post', userPost);

		$('#userPost').attr('href', "search-info?id=" + userPostId);

		$('#userPost').text(userPost);
	});
});


//om de foto in de modal voor profile img'es te open heb je dit stukje nodig die de route van de image toestuurt
$(document).ready(function(){
	$('#myModal1').on('show.bs.modal', function(e) {
		var RouteId = $(e.relatedTarget).data('route-id');
		$('#myProfileImage').attr('src', RouteId);


		$('#myProfileImage').attr('value', "RouteId");
	});
});

$(document).ready(function(){
	$('#myModal').on('show.bs.modal', function(e) {
		var RouteId = $(e.relatedTarget).attr('src');
		$('#img01').attr('src', RouteId);

	});
});


//krijg de momentele scroll hoogte van de pagina 
//en blijf op de hoogte staan tijdens het herladen van de pagina 
$(window).on('beforeunload', function() {
	var scrollTopHeight = $(window).scrollTop();
	$(window).scrollTop(scrollTopHeight);
});


var obj, dbParam, xmlhttp, myObj, x, txt = "";

function setGetLike(element) {
	getLike = element.value;

//hier word een if statement gedaan
//waarbij er word gekeken of het vorige value 
//bestaat of niet en als de vorige value wel bestaat
//kijkt de if statement of de nieuwe value overeenkomt
//met de vorige value en zal de statement plus of min
//doen naarmate de actie is gemaakt

if(element.getAttribute('previousValue') == undefined){
	element.setAttribute('previousValue', getLike);
	element.value = ++getLike;
//element.innerHTML = element.value + "like (s)";

getAllLikes();
} else {
	if(element.getAttribute('previousValue') == element.value){
		element.value = ++getLike;
	} else {
		element.value = --getLike; 
	}
//element.innerHTML = element.value + "like (s)";
getAllLikes();
}

var getLikeId = element.getAttribute('data-value');
var previousValue;

//het maken van een json object
//het object wordt samengeperst tot een tekst door JSON.stringify
//er wordt een nieuwe XMLHttpRequest aangemaakt op commando

obj = { "photo_id":getLikeId };
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();

//onreadystatechange wordt uitgevoerd wanneer
//er een verandering is in de XMLHttpRequest

xmlhttp.onreadystatechange = function() {

//this.readyState == 4 && this.status == 200 
//is een check om te kijken of je door kan gaan met de functie

if (this.readyState == 4 && this.status == 200) {

    //hieronder wordt alles automatisch bekeken 
    //gedecode en opgehaald

    myObj = JSON.parse(this.responseText);
    if(previousValue == myObj) {

    } else {
    	previousValue = myObj;
    	element.classList.add('btn-success');
    	element.classList.remove('btn-danger');

    	for (x in myObj) {
    		txt += myObj[x].Active;
    	}

    	if (txt == 1) {
    		element.classList.add('btn-danger');
    		element.classList.remove('btn-success');
    	} else {
    		element.classList.add('btn-success');
    		element.classList.remove('btn-danger');
    	}

    	txt = "";
    }

        // console.log(txt);

    }

};

//hieronder wordt alles geopend
//gevraagd wat voor type er moet worden doorgestuurd
//en welke variable er precies wordt doorgestuurd

xmlhttp.open("POST", "Ajax/addLikes.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam);

// location.reload();
// window.location.reload();
// setTimeout(location.reload.bind(location), 25);
}

var obj3, dbParam3, xmlhttp3, myObj3, x3, txt3 = "";

//addreaction functie voegt een reactie toe aan de database 
function addReaction() {

	var getMyPhotoId = document.getElementById('getMyPhotoId');
	var getMyPhotoId2 = getMyPhotoId.getAttribute('data-id');
	var getMyPhotoId3 = getMyPhotoId.value;
	var myReaction = document.getElementById('Reactions');
	var getMyReaction = myReaction.value;
	var demo2 = document.getElementById('demo2');

	if(getMyReaction == "") {
		alert("it seems that you have not commited anything");
	} else {

		obj3 = { "table":"addreaction", "row":parseInt(getMyPhotoId2), "row2":parseInt(getMyPhotoId3), "row3":String(getMyReaction) };
		dbParam3 = JSON.stringify(obj3);
		xmlhttp3 = new XMLHttpRequest();

		xmlhttp3.onreadystatechange = function() {

			if (this.readyState == 4 && this.status == 200) {

				myObj3 = JSON.parse(this.responseText);
        // for (x3 in myObj3) {
        //     txt3 += myObj3[x3].comment;
        // }

        // document.getElementById("demo").innerHTML = txt3;

    }

};

xmlhttp3.open("POST", "Ajax/addReactions.php", true);
xmlhttp3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp3.send("x=" + dbParam3);
myReaction.value = "";
}
}

var obj4, dbParam4, xmlhttp4, myObj4, x4, txt4 = "";

function openComments() {
	var getMyPhotoId = document.getElementById('getMyPhotoId');
	var getMyPhotoId2 = getMyPhotoId.getAttribute('data-id');
	var getMyPhotoId3 = getMyPhotoId.value;
	var getMyPhotoId4 = getMyPhotoId.getAttribute('data-reaction');
	var previousValue;

	obj4 = { "myTable":"addreaction", "myRow":parseInt(getMyPhotoId3) };
	dbParam4 = JSON.stringify(obj4);
	xmlhttp4 = new XMLHttpRequest();

	xmlhttp4.onreadystatechange = function() {
// kijken of object geset is
if (this.readyState == 4 && this.status == 200) {
	myObj4 = JSON.parse(this.responseText);
	if(previousValue == myObj4) {

	} else {
		document.getElementById("demo").innerHTML = "";
		previousValue = myObj4;

		for (x4 in myObj4) {
			txt4 += myObj4[x4].comment + "<hr style='width:100%;border-top: 2.3px solid #ca1616;float: unset;'>";
		}
		document.getElementById("demo").innerHTML = txt4;
		txt4 = "";
	}
}
}

xmlhttp4.open("GET", "Ajax/openReactions.php?x=" + dbParam4, true);
xmlhttp4.send();

}

//het uitvoeren van een functie 
//tijdens het openen van de modal 
$(document).ready(function(){
	$('#my_modal').on('show.bs.modal', function() {
		openComments();
		reIndentComments = setInterval(openComments, 2000);
	});
});

//het herladen van de pagina nadat de pagina is gesloten 
$(document).ready(function() {
	$('#my_modal').on('hide.bs.modal', function() {
		clearInterval(reIndentComments);
	});
});

// likes . robin legt het wel uit
function getAllLikes()
{

	$.ajax({url: "Ajax/openAllLikes.php", success: function(result){
		$.each( result, function( key, value ) {   
			$('#image-' + key).val(value);
			$('#image-' + key).html(value + ' like(s)');
		});
	}});

}

// function getAllActive() {
// $.ajax({url: "Ajax/addLikes.php", success: function(result){
// $.each(result, function(key, value){
// });
// }}); 
// }


$(document).ready(function(){

	setInterval(getAllLikes, 1000);
// setInterval(getAllActive, 2000);

});