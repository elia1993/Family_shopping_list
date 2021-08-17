
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
    <style>
      /* Style the input */
      input {
        margin: 0;
        border: none;
        border-radius: 0;
        width: 75%;
        padding: 10px;
        float: left;
        font-size: 16px;
      }
      
      /* Style the "Add" button */
      .addBtn {
        padding: 10px;
        width: 25%;
        background: #d9d9d9;
        color: #555;
        float: left;
        text-align: center;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
        border-radius: 0;
      }
      
      .addBtn:hover {
        background-color: #bbb;
      }
      .titles{
        display: none;
        font-family:Georgia, 'Times New Roman', Times, serif;
        margin:4px;
        padding: 5px;
        color:black;
        background: #cce5ff;
        list-style-type: none;
      }
     #newdiv{
       width: 150px;
        position: fixed;
        right: 59%;
        top:25%;
      }
      #LogOut{
    max-width:10%;
    margin-left:0%;
    margin-top:-3%;
  }
  #LogOut:hover  {
  background-color: red;
}
a{
  text-decoration: none;
    color:black;
}
#Change:hover  {
  color: green;
}
#Family {
  opacity: 0.6;
  cursor: not-allowed;
}
#Animations {
  font-weight: bold;
  width: 250px;
  color: #555;
  height: 50px;
  margin-left:8%;
  padding-top:12px;
  background-color: lightseagreen;
  animation-name: example;
  animation-duration: 15s;
  font-size: 20px;
  border-radius:  20px;
}

@keyframes example {
  0%   {background-color: darksalmon;}
  25%  {background-color: white;}
  50%  {background-color: blue;}
  100% {background-color: darksalmon;}
}

      </style>

</head>
<body>
  <?php
  session_start();
  
  ?>
    <header id="header1" >
    <div  class="container">
	<div class="row">
		<div class="col-md-8">
 </div>
	</div>
</div>
        <h1 style="text-align: center;">Welcome To Web Application</h1>
        <span  id="LogOut"  class="addBtn"><a href="login.php">LogOut</a></span>
     </header>
     <content>
        <div class="login" id="success"  >
    <div id="myDIV" class="header">
              <div id='Animations'>Family Products List</div>
        <form id="myform"  method="POST"  >
        <input type="text" autocomplete="on" name="Product" id="myInput" onkeyup="showHint(this.value)"    placeholder="Product.." >
        <p style="color:blue; text-align:left;">Suggestions: <span id="txtHint"></span></p>
        <div style=" text-align: left;" id="newdiv" >
        </div>
        <input class="Quantity" name="Quantity"  type="text" id="Quantity" placeholder="Quantity"  min="1" >
        <span  onclick="newElement()" class="addBtn" id="add">Add</span>
        <span  style='width:34%;'    id="Family" class="addBtn">FamilyList</span>
        <span  style='width:34%;'    id="MyList" class="addBtn">MyList</span>
        </div>
      </div>
    </form>
      <ul id="myUL">
      </ul>
    </content>
    <?php
  include 'config.php';
  $email = $_SESSION['Email'];
  $sql = "SELECT `family` From `users` WHERE `email` = '$email'" ;
  $result = mysqli_query($conn,$sql );
  $row = mysqli_fetch_array($result);
  $familynum = (int)$row['family'];
  $result2 =mysqli_query($conn,"SELECT product , quantity FROM `user_list` JOIN `users` ON user_list.email = users.email WHERE  family = '$familynum'");
  echo " <ul    id='myUL'>";
  while($row3 = mysqli_fetch_array($result2))
  {
  echo "<li class='mylist' style='display:block;' >" . $row3['quantity']." " .$row3['product']. "</li>";
  }
  echo "</ul>";
?>
    <script>
$(document).ready(function() {
	$('#add').on('click', function() {
		$("#add").attr("disabled", "disabled");
		var name = $('#Quantity').val();
		var email = $('#myInput').val();
		if(name!="" && email!="" ){
			$.ajax({
				url: "save.php",
				type: "POST",
				data: {
					'product': Product,
					'quantity': Quantity
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#add").removeAttr("disabled");
						$('#myform').find('input:text').val('');
            alert('Data added successfully !');
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>
<Script>
  $(document).ready(function() {
	$('#newList').on('click', function() {
    window.location="insertIntoHistory.php";
        window.location="UpdateListNum.php";
		$('#newList').attr("disabled", "disabled");
      
			$.ajax({
				url: "deleteAll.php",
				type: "POST",
				data: {
          email: $(this).attr("data-id")
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){

      		}

				}
        });
  })
	});

</script>
</body>
<footer>

    <hr>
    <h2>&#169 CopyRights</h2>
</footer>
<script>
    var btn = document.getElementById('Family');
    btn.addEventListener('click', function() {
      window.location="FamilyList.php";
    });
  </script>
 <script>
    var btn = document.getElementById('MyList');
    btn.addEventListener('click', function() {
      window.location="ShoppingCart.php";
    });
  </script>

<script>

function products(){
  document.getElementById('products').style.display = 'block';
   $listnum = document.getElementById('list1').value;
   alert($listnum);
  window.location="InsertToUserList.php";
  var elems = document.getElementsByClassName('mylist');
for (var i=0;i<elems.length;i+=1){
  elems[i].style.display = 'none';
}

}


  let items = [],
  ul = document.createElement('ul');
document.getElementById('myUL').appendChild(ul);

items.forEach(function (item) {
    let li = document.createElement('li');
    ul.appendChild(li);
    li.innerHTML += item;
});




    // Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("li");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for(var i in close) {
  close[i].onclick = function() {
    var r = confirm("Are you sure you want to delete this item?");
    var ele = $(this).parent().text().slice(0,-1).split(" ");
    var quantity = ele[0];
    var product = ele[2];
    if (r == true) {
      var div = this.parentElement;
      div.style.display = "none";
      $.ajax({
			url: "delete.php",
			type: "POST",
			cache: false,
			data:{
				'product': product,
        'quantity': quantity
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					confirm("Deleted");
				}
			}
		});
    }
  }

}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
    var parent = document.getElementById('myUL');
    parent.appendChild(ev.target);
  }
  
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  Product = document.getElementById('myInput').value;
  Quantity = document.getElementById("Quantity").value;
  var r = confirm("are you sure you want to add this item");
    if (r == true) {
      items.push(Quantity + ' ' + Product); 
      localStorage.setItem("Productvalue",items);
      var li = document.createElement("li");
      var inputvalue1 = document.getElementById("Quantity").value + " ";
      var inputValue = document.getElementById("myInput").value;
      var t = document.createTextNode(inputValue);
      var u = document.createTextNode(inputvalue1);
      li.appendChild(u);
      li.appendChild(t);
    }
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }


  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var r = confirm("Are you sure you want to delete this item?");
      var ele = $(this).parent().text().slice(0,-1).split(" ");
      var quantity = ele[0];
      var product = ele[2];
      if (r == true) {
      var div = this.parentElement;
      div.style.display = "none";
      $.ajax({
			url: "delete.php",
			type: "POST",
			cache: false,
			data:{
				'product': product,
        'quantity': quantity
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					alert("Deleted");
				}
			}
		});

    }

  } 
  }
}

// removes ul list elements when clicking on the "new list" button
function newList() {
   var myobj = document.getElementById('myUL');
    myobj.remove();
  
 
}
</script>


</html>