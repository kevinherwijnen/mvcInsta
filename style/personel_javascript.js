



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




