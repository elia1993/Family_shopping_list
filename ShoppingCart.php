
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link rel="stylesheet" type="text/css" href="button.css" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


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

    .titles {
      display: none;
      font-family: Georgia, 'Times New Roman', Times, serif;
      margin: 4px;
      padding: 5px;
      color: black;
      background: #cce5ff;
      list-style-type: none;
    }

    #newdiv {
      width: 150px;
      position: fixed;
      right: 59%;
      top: 25%;
    }

    #LogOut{
      max-width: 10%;
      margin-left: 0%;
      margin-top: -3%;
    }

    #LogOut:hover {
      background-color: red;
    }

    a {
      text-decoration: none;
      color: black;
    }

    #Change:hover {
      color: green;
    }

    #person,
    #deleteUser {
      width: 200px;
    }

    #addfamily {
      width: 40px;
      margin-top: 3px;
    }

    #DeleteFamily {
      width: 65px;
      margin-top: 3px;
    }
.ui-menu {
    list-style:none;
    padding: 2px;
    margin: 0;
    float: left;
    margin-left: 40px;

}
.ui-menu .ui-menu {
    margin-top: -3px;
    margin-left: 40px;

}
.ui-menu .ui-menu-item {
    margin:0;
    padding: 0;
    zoom: 1;
    float: left;
    clear: left;
    width: 100%;

}
.ui-menu .ui-menu-item a {
    text-decoration:none;
    display:block;
    padding:.2em .4em;
    line-height:1.5;
    zoom:1;
    background:grey;
}
content{
  position: relative;
}
h2{
  position: relative;
}
#MyProducts{
  margin-left:60%;
}


.bar1, .bar2, .bar3 {
  width: 35px;
  height: 5px;
  background-color: #333;
  margin: 6px 0;
  transition: 0.4s;
}

.change .bar1 {
  -webkit-transform: rotate(-45deg) translate(-9px, 6px);
  transform: rotate(-45deg) translate(-9px, 6px);
}

.change .bar2 {opacity: 0;}

.change .bar3 {
  -webkit-transform: rotate(45deg) translate(-8px, -8px);
  transform: rotate(45deg) translate(-8px, -8px);
}
#icon-bar span {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 30px;
   width:150px;
  background-color: #555;
}
#icon-bar {
  width: 150px;
  background-color: #555;
}
#icon-bar a:hover {
  color: whitesmoke;
}

  </style>
</head>
<body>
  <?php
  session_start();
  ?>
  <header>
		<div style="margin-top:-3%" id="time" class="col-md-8">
		 <span class="btn btn-light" id="ct"></span>  
 </div>
 <div style="margin-top:-2%"   id="LogOut">
    <span  class="btn btn-danger"  class="addBtn"><a href="logout.php">LogOut</a></span>
    </div>
  </header>
  <content>

<div style="padding:2%"   class="container" onclick="myFunction(this)">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
  </div>
  <div style='display:none; ' id='icon-bar'>
  <span   onclick='Family()' id="MyFamily" class="addBtn"><a >Family</a></span>
  <span   id="Profile" class="addBtn"><a href="profile.php">Profile</a></span>
  <span   style='margin-left:2% ; ' id="MyProducts" class="addBtn"><a  href="MyProducts.php">Products</a></span>
  </div>
  
  <h3 id="Family-list1" style='display:none;' >Add To Family-List<span onclick="showInput()"><img  src="plus.png" width="50" height="20"></span></h3>
    <h3 id="Family-list2" style='display:none;'>Delete User From Family-List<span onclick="showDelete()" id=""><img src="minus.png" width="50" height="20"></span></h3>
    <h3   id="Family-list3" style='display:none;'>FamilyMembers<span   id=""></span></h3>
    <tr >
<?php
include 'config.php';
  $email = $_SESSION['Email'];
  $sql = "SELECT `family` From `users` WHERE `email` = '$email'" ;
  $result = mysqli_query($conn,$sql );
  $row = mysqli_fetch_array($result); 
  $familynum = (int)$row['family'];
  $family = "SELECT `name` FROM `users` WHERE `family` = '$familynum' AND  NOT `email` = '$email'";
  $result1 = mysqli_query($conn,$family);
  echo "<div id='memebers' style='display:none;font-size: 25px;'>";
  while ($row3 = mysqli_fetch_array($result1)) {
    echo  "<div style='background-color:lightseagreen;border-style: solid; border-width: thin; max-width:5%;border-radius:  20px; text-align:center;'><th    value='". $row3['name']." '>" .$row3['name']."<br>"."</th></div>";
    echo "<br>";
  }
echo "</div>";
mysqli_close($conn);
?>
</tr>
 
  <form style="margin-top:-4%" id="myform" method="POST">
      <input style='display:none;' type="text" name="person" id="person" placeholder="Email">
      <span  style='display:none;' class="addBtn" id="addfamily">Add</span>
      <input style='display:none;' autocomplete="on" type="text" name="deleteUser" id="deleteUser" placeholder="Email">
      <span style='display:none;' class="addBtn" id="DeleteFamily">Delete</span>
    </form>
      <div   class="login" id="success">
        <div id="myDIV" class="header">
        <h1>Products List</h1>
          <form id="myform" method="POST">
            <input id="myInput" type="text"  name="Product"  placeholder="Product..">
            <script>
  $(function() {
     $( "#myInput").autocomplete({

       source: 'gethint.php',
     });
  });
</script>

            <input class="Quantity" name="Quantity" type="text" id="Quantity" placeholder="Quantity" min="1">
            <span  onclick="newElement()" class="addBtn" id="add">Add</span>
            <span onclick="newList()" id="newList" class="addBtn">New List</span>
            <span style='width:34%;' id="Family" class="addBtn">FamilyList</span>
        </div>
      </div>
      <div  >
          <select   name='history' class="custom-select">
    <option disabled selected>HistoryList</option>
    </div >
    </form>
    <ul id="myUL">
    </ul>
  </content>

  <script>
    function Family(){
      
      document.getElementById('memebers').style.display = 'block';
      document.getElementById('Family-list1').style.display = 'block';
      document.getElementById('Family-list2').style.display = 'block';
      document.getElementById('Family-list3').style.display = 'block';
      document.getElementById("icon-bar").style.display = 'none';
    }
function myFunction(x) {
  document.getElementById('memebers').style.display = 'none';
  document.getElementById('Family-list3').style.display = 'none';
  document.getElementById('Family-list1').style.display = 'none';
      document.getElementById('Family-list2').style.display = 'none';
      document.getElementById('person').style.display = 'none';
      document.getElementById('addfamily').style.display = 'none';
      document.getElementById('deleteUser').style.display = 'none';
      document.getElementById('DeleteFamily').style.display = 'none';
  x.classList.toggle("change");
  var x = document.getElementById("icon-bar");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
    function showInput() {
      document.getElementById('person').style.display = 'block';
      document.getElementById('addfamily').style.display = 'block';
      document.getElementById('deleteUser').style.display = 'none';
      document.getElementById('DeleteFamily').style.display = 'none';
    }

    function showDelete() {
      document.getElementById('deleteUser').style.display = 'block';
      document.getElementById('DeleteFamily').style.display = 'block';
      document.getElementById('person').style.display = 'none';
      document.getElementById('addfamily').style.display = 'none';
    }

    $('#DeleteFamily').on('click', function() { // Delete Family
      $("#DeleteFamily").attr("disabled", "disabled");
      var family = $('#deleteUser').val();
      if (family != "") {
        $.ajax({
          url: "DeleteFamily.php",
          type: "POST",
          data: {
            'family': family
          },
          cache: false,
          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
              $("#DeleteFamily").removeAttr("disabled");
              $('#DeleteFamily').find('input:text').val('');
              alert('Family Deleted successfully !');
            } else if (dataResult.statusCode == 201) {
              alert("Error occured !");
            }
          }
        });
      } else {
        alert('Please fill all the field !');
      }
    });
    $(document).ready(function() { //Add User To Family
      $('#addfamily').on('click', function() {
        $("#addfamily").attr("disabled", "disabled");
        var family = $('#person').val();
        if (family != "") {
          $.ajax({
            url: "addFamily.php",
            type: "POST",
            data: {
              'family': family
            },
            cache: false,
            success: function(dataResult) {
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {
                $("#addfamily").removeAttr("disabled");
                $('#myform').find('input:text').val('');
                alert('Family Added successfully !');
              } else if (dataResult.statusCode == 201) {
                alert("Error occured !");
              } else if (dataResult.statusCode == 203) {
                alert("You Are Already Family With This User!!");
              }
            }
          });
        } else {
          alert('Please fill all the field !');
        }
      });
    });
    $(document).ready(function() { //add product and quantity to DB
      $('#add').on('click', function() {
        $("#add").attr("disabled", "disabled");
        var name = $('#Quantity').val();
        var email = $('#myInput').val();
        if (name != "" && email != "") {
          $.ajax({
            url: "save.php",
            type: "POST",
            data: {
              'product': Product,
              'quantity': Quantity
            },
            cache: false,
            success: function(dataResult) {
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {
                $("#add").removeAttr("disabled");
                $('#myform').find('input:text').val('');
                alert('Data added successfully !');
              } else if (dataResult.statusCode == 201) {
                alert("Error occured !");
              }

            }
          });
        } else {
          alert('Please fill all the field !');
        }
      });
    });
  </script>
 

  <Script>
    $(document).ready(function() {
      $('#newList').on('click', function() {
        window.location = "insertIntoHistory.php";
        window.location = "UpdateListNum.php";
        $('#newList').attr("disabled", "disabled");

        $.ajax({
          url: "deleteAll.php",
          type: "POST",
          data: {
            email: $(this).attr("data-id")
          },
          cache: false,
          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {

            }

          }
        });
      })
    });
  </script>
</body>

<?php
        include "config.php";// Using database connection file here
        $email = $_SESSION['Email'];
        $records = mysqli_query($conn, "SELECT distinct listnum , `date` From `history` WHERE email='$email' ORDER BY listnum");  // Use select query here 
        while($data = mysqli_fetch_array($records))
        {
            echo "<option   value='". $data['listnum']." - ".$data['date'] ."'>" .$data['listnum']." - ".$data['date'] ."</option>";  // displaying data in option menu
        }
        echo "<input style=' margin-left:40%; width:5%; height:15%; '  type='submit' name='submit'>";
        if(isset($_POST['submit'])){
          if(!empty($_POST['history'])) {
              $selected = $_POST['history'];
              $selected= $selected[0];
              include 'InsertToUserList.php';
            } else {
              echo 'Please select the value.';
          }
        }
    mysqli_close($conn);
?>
<?php //show user_list
include "config.php";
$email = $_SESSION['Email'];
$result2 = mysqli_query($conn, "SELECT distinct product ,quantity FROM `user_list` WHERE email= '$email' ORDER BY product  ");
echo " <ul style='width:40%; margin-left:30%;'    id='myUL'>";
while ($row3 = mysqli_fetch_array($result2)) {
  echo "<li class='mylist' style='display:block;' >" . $row3['quantity'] . " " . $row3['product'] . "</li>";
}
echo "</ul>";
mysqli_close($conn);
?>
<script>
  var btn = document.getElementById('Family');
  btn.addEventListener('click', function() {
    window.location = "FamilyList.php";
  });
</script>

<script>



  let items = [],
    ul = document.createElement('ul');
  document.getElementById('myUL').appendChild(ul);

  items.forEach(function(item) {
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
  for (var i in close) {
    close[i].onclick = function() {
      var r = confirm("Are you sure you want to delete this item?");
      var ele = $(this).parent().text().slice(0, -1).split(" ");
      var quantity = ele[0];
      var product = ele[2];
      if (r == true) {
        var div = this.parentElement;
        div.style.display = "none";
        $.ajax({
          url: "delete.php",
          type: "POST",
          cache: false,
          data: {
            'product': product,
            'quantity': quantity
          },
          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
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
      localStorage.setItem("Productvalue", items);
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
        var ele = $(this).parent().text().slice(0, -1).split(" ");
        var quantity = ele[0];
        var product = ele[2];
        if (r == true) {
          var div = this.parentElement;
          div.style.display = "none";
          $.ajax({
            url: "delete.php",
            type: "POST",
            cache: false,
            data: {
              'product': product,
              'quantity': quantity
            },
            success: function(dataResult) {
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {
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
  function display_c() {
    var refresh = 1000; // Refresh rate in milli seconds
    mytime = setTimeout('display_ct()', refresh)
  }

  function display_ct() {
    var timex = new Date();
    var time = timex.getHours() + ":" + timex.getMinutes() + ":" + timex.getSeconds();
    document.getElementById('ct').innerHTML = time;
    display_c();
  }


  var today = new Date();
  var month = new Array();
  month[0] = "January"; month[1] = "February"; month[2] = "March"; month[3] = "April"; month[4] = "May"; month[5] = "June";
  month[6] = "July"; month[7] = "August"; month[8] = "September"; month[9] = "October"; month[10] = "November"; month[11] = "December";
  var date = today.getDate() + ' ' + (month[today.getMonth()]) + ' , ' + today.getFullYear();
  jQuery(document).ready(function () { display_ct(); jQuery(".date-text").text(date); });
</script>
<footer>

  <hr>
  <h2>&#169 CopyRights</h2>
</footer>

</html>