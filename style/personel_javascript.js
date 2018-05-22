



	//zorgt er voor dat je select file van upload niet ziet 
	$(function () {
		$('input[type="file"]').change(function () {
			if ($(this).val() != "") {
				$(this).css('color', '#333');
			}else{
				$(this).css('color', 'transparent');
			}
		});
	})

// preview image upload bij add image
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#myImg')
			.attr('src', e.target.result)
			
		};

		reader.readAsDataURL(input.files[0]);
	}
}



// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img;
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

$('img').each(function(){
	$(this).on('click',function(){
		var  id = $(this).attr('id');
		console.dir(id);
		img = document.getElementById(id);
		modal.style.display = "block";
		modalImg.src = this.src;
		captionText.innerHTML = this.alt;
	})
	
})


// Get the modal for profile img'es
var modal1 = document.getElementById('myModal1');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img;
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

$('img').each(function(){
	$(this).on('click',function(){
		var  id = $(this).attr('id');
		console.dir(id);
		img = document.getElementById(id);
		modal1.style.display = "block";
		modalImg.src = this.src;
		captionText.innerHTML = this.alt;
	})
	
})

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
	modal.style.display = "none";
}

//om de foto in de modal te open heb je dit stukje nodig die de route van de image toestuurt
$(document).ready(function(){
	$('#my_modal').on('show.bs.modal', function(e) {
		var RouteId = $(e.relatedTarget).data('route-id');
		var DescriptionId = $(e.relatedTarget).data('description-id');
		
		$('#myImage').attr('src', RouteId);

		$('#Description span').text(DescriptionId);


		$('#routeLoc').attr('value', RouteId);
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
		element.innerHTML = element.value;
	} else {
		if(element.getAttribute('previousValue') == element.value){
			element.value = ++getLike;
		} else {
			element.value = --getLike; }
			element.innerHTML = element.value;
		}

	var getLikeId = element.getAttribute('data-value');
	var getUserId = element.getAttribute('data-id');

	//het maken van een json object
	//het object wordt samengeperst tot een tekst door JSON.stringify
	//er wordt een nieuwe XMLHttpRequest aangemaakt op commando

	obj = { "table":"like_counter", "limit":10, "user_id":getUserId, "photo_id":getLikeId };
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
	        // for (x in myObj) {
	        //     txt += myObj[x].like_counter + "<br>";
	        // }
	        // document.getElementById("demo").innerHTML = txt;
	    }

	};

	//hieronder wordt alles geopend
	//gevraagd wat voor type er moet worden doorgestuurd
	//en welke variable er precies wordt doorgestuurd

	xmlhttp.open("POST", "Ajax/addLikes.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("x=" + dbParam);

}



var obj2, dbParam2, xmlhttp2, myObj2, x2, txt2 = "";

function setGetDislike(element2) {
	getDislike = element2.value;

	//hier word een if statement gedaan
	//waarbij er word gekeken of het vorige value 
	//bestaat of niet en als de vorige value wel bestaat
	//kijkt de if statement of de nieuwe value overeenkomt
	//met de vorige value en zal de statement plus of min
	//doen naarmate de actie is gemaakt

	if(element2.getAttribute('previousValue') == undefined){
		element2.setAttribute('previousValue', getDislike);
		element2.value = --getDislike;
		element2.innerHTML = element2.value;
	} else {
		if(element2.getAttribute('previousValue') == element2.value){
			element2.value = --getDislike;
		} else {
			element2.value = ++getDislike; }
			element2.innerHTML = element2.value;
		}

	var getDislikeId2 = element2.getAttribute('data-value');
	var getUserId2 = element2.getAttribute('data-id');

	//het maken van een json object
	//het object wordt samengeperst tot een tekst door JSON.stringify
	//er wordt een nieuwe XMLHttpRequest aangemaakt op commando

	obj2 = { "table":"like_counter", "limit":10, "user_id":getUserId2, "photo_id":getDislikeId2 };
	dbParam2 = JSON.stringify(obj2);
	xmlhttp2 = new XMLHttpRequest();

	//onreadystatechange wordt uitgevoerd wanneer
	//er een verandering is in de XMLHttpRequest

	xmlhttp2.onreadystatechange = function() {

		//this.readyState == 4 && this.status == 200 
		//is een check om te kijken of je door kan gaan met de functie

	    if (this.readyState == 4 && this.status == 200) {

	    	//hieronder wordt alles automatisch bekeken 
	    	//gedecode en opgehaald

	        myObj2 = JSON.parse(this.responseText);
	        for (x2 in myObj2) {
	            txt2 += myObj2[x2].like_counter + "<br>";
	        }
	        document.getElementById("demo").innerHTML = txt2;
	    }

	};

	//hieronder wordt alles geopend
	//gevraagd wat voor type er moet worden doorgestuurd
	//en welke variable er precies wordt doorgestuurd

	xmlhttp2.open("POST", "Ajax/deleteLikes.php", true);
	xmlhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp2.send("x=" + dbParam2);
<<<<<<< HEAD
<<<<<<< HEAD



=======
	location.reload();
>>>>>>> 919873d12008beda074dd1d3e191626dcac8c3c8
=======

>>>>>>> parent of b1ed74b... update
}


// var obj3, dbParam3, xmlhttp3, myObj3, x3, txt3 = "";

// var getUser_Id = document.getElementById('uS');
// var getUser_Id2 = parseInt(getUser_Id.value);
// var getPhoto_Id = document.getElementById('uP');
// var getPhoto_Id2 = parseInt(getPhoto_Id.value);

// 	obj3 = { "table":getUser_Id2, "table2":getPhoto_Id2, "limit":100 };
// 	dbParam3 = JSON.stringify(obj3);
// 	xmlhttp3 = new XMLHttpRequest();

	//onreadystatechange wordt uitgevoerd wanneer
	//er een verandering is in de XMLHttpRequest

	// xmlhttp3.onreadystatechange = function() {

		// this.readyState == 4 && this.status == 200 
		//is een check om te kijken of je door kan gaan met de functie

	    // if (this.readyState == 4 && this.status == 200) {

	    	//hieronder wordt alles automatisch bekeken 
	    	//gedecode en opgehaald

	        // myObj3 = JSON.parse(this.responseText);
	        // for (x3 in myObj3) {
	            // txt3 += myObj3[x3].user_id;
	        // }
	        // document.getElementById("demo").innerHTML = txt3;
	    // }

	// };

	//hieronder wordt alles geopend
	//gevraagd wat voor type er moet worden doorgestuurd
	//en welke variable er precies wordt doorgestuurd

	// xmlhttp3.open("POST", "Ajax/likeSession.php", true);
	// xmlhttp3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// xmlhttp3.send("x=" + dbParam3);