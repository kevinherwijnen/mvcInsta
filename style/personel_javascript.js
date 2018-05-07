



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
		    
		   $('img#myImage').attr('src', RouteId);

		   $('#Description span').text(DescriptionId);
		});
		
	});

	


	var obj, dbParam, xmlhttp, myObj, x, txt = "";

var obj2, dbParam2, xmlhttp2, myObj2, x2, txt2 = "";

function setGetLike(element) {
var getLike = element.value;
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
console.log(getLike);

var getPhotoId = element.getAttribute("data-value");


//het updaten van de like counter in de upload_images table

obj = { "table":"upload_images", "row":"like_counter", "row2":getPhotoId, "limit":10 };
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        for (x = 0; x < myObj.length; x++) {
            txt += myObj[x].like_counter;
        }
        document.getElementById("getAllp").innerHTML = txt;
    }
};
xmlhttp.open("POST", "Ajax/likeGet.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam);

var getPhotoId2 = element.getAttribute("data-value");
var getSessionId = document.getElementById("hiddenInput");
var getSessionId2 = parseInt(getSessionId.value);

//het updaten van alle rows in de photo_liked table

obj2 = { "table":"photo_liked", "row":getSessionId2, "row2":getPhotoId2 };
dbParam2 = JSON.stringify(obj2);
xmlhttp2 = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj2 = JSON.parse(this.responseText);
        for (x2 = 0; x2 < myObj2.length; x2++) {
            txt2 += myObj2[x2].like_counter;
        }
        document.getElementById("getAllp2").innerHTML = txt;
    }
};
xmlhttp2.open("POST", "Ajax/insertLike.php", true);
xmlhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp2.send("x=" + dbParam2);
}; 

// var obj, dbParam, xmlhttp, myObj, x, txt = "";

// var getPhotoId = document.getElementById("getPhoto_id");
// var getPhotoIdValue = parseInt(getPhotoId.value);

// obj = { "table":"upload_images", "limit":10 };
// dbParam = JSON.stringify(obj);
// xmlhttp = new XMLHttpRequest();
// xmlhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//         myObj = JSON.parse(this.responseText);
//         for (x = 0; x < myObj.length; x++) {
//             txt += myObj[x].like_counter + "<br>";
//         }
//         document.getElementById("myLike").innerHTML = txt;
//     }
// };
// xmlhttp.open("GET", "Ajax/likeGet.php?x=" + dbParam, true);
// xmlhttp.send();



