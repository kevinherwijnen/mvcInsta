<?php
	class Engine extends Database {
		public static function getSearch() {
			$result = '
			<div class="container-fluid">
				<div class="col-md-8 col-md-offset-2">
					<h1>Search</h1>
					<form action="" method="get" enctype="multipart/form-data" autocomplete="off">
						<div class="form-group">
							  <input type="text" id="Search" onKeyUp="searchEngine();" class="form-control" name="getSearch" placeholder="Search">
						</div>
					</form>
				</div>
			</div>			

			<div class="container-fluid">
				<div class="col-md-8 col-md-offset-2">
					<div  id="myDiv">
					</div>
				</div>
			</div>			

			<script>
				var obj, dbParam, xmlhttp, myObj, x, txt, clicked, clicked2 = "";
				var search = document.getElementById("Search");	
				var myDiv = document.getElementById("myDiv");

				var span = document.createElement("span");
				span.className = "mySpan";
				myDiv.appendChild(span);

				var ul = document.createElement("ul");
				ul.className = "myUl";
				myDiv.appendChild(ul);

				function searchEngine() {

					obj = {"table":"users","limit":100};
					dbParam = JSON.stringify(obj);
					xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {

						while(ul.firstChild) {
	                        ul.removeChild(ul.firstChild);
	                    }

						getSearch = search.value;

					    if (this.readyState == 4 && this.status == 200) {
					    	
					        myObj = JSON.parse(this.responseText);

					        for (x = 0; x < myObj.length; x++) {

					        	if (getSearch != "") {

					        		if (myObj[x].username.indexOf(getSearch) > -1 && myObj[x].username.startsWith(getSearch)) {

					        			li = document.createElement("li");
					        			li.className = "myLi";
					        			ul.appendChild(li);
					        			li.innerHTML = li.innerHTML + myObj[x].username;

					        			myDiv.style.display = "block";

					        			for (var i = 0; i < li.innerHTML.length; i++) {
					        				li.addEventListener("click", clickedLi);
					        				li.clicked = li.textContent;
					        				li.clicked2 = myObj[x].user_id;
					        			}

					            	}

					        	} else {
					        		myDiv.style.display = "none";
					        		li.innerHTML = "";
					        	}

					        }

					    }

					};

					xmlhttp.open("GET", "Ajax/searchEngine.php?x=" + dbParam, true);
					xmlhttp.send();

				}

				searchEngine();

				function clickedLi(evt) {
					var getClicked = evt.target.clicked;
					var getClicked2 = evt.target.clicked2;
					search.value = getClicked;

					console.log(getClicked);
					console.log(search.value);

					if (search.value = getClicked) {
						myDiv.style.display = "none";
						window.location.href = "search-info?id=" + getClicked2;
					} else {
						myDiv.style.display = "block";
						li.innerHTML = "";
					}
				}

			</script>
			';
			return $result;
		}
	}
?>