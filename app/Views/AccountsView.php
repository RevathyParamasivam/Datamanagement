<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;

}


/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  top: 111px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  text-align:"center";
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 400px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 90%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 97%;
  margin-bottom:10px;
  opacity:  0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
<!-- Start Styles. Move the 'style' tags and everything between them to between the 'head' tags -->
<style type="text/css">
.myTable { width:400px;background-color:#eeee;border-collapse:collapse; }
.myTable th { background-color:#000;color:white;}
.myTable td, .myTable th { padding:5px;border:1px solid #000; }
</style>
<!-- End Styles -->

</style>
</head>
<body >
<div style="background-color: #2596be; height:100px;width:100%;font-size:18px;color:white;text-align:center;padding:10px;margin:-20px -35px -20px -8px"><p> Welcome Revathy</p></div>
<?php if(isset($result)) {
       $cash=0; 
              foreach($result as $value)
                      $cash=$cash+$value['income']-$value['expense'];         
                }?>

<h1>Cash at hand: <?= $cash ?></h1>
<div style="align-items:center;position:absolute;left:20%;top:25 %;right:20%">
<table class="myTable"  id="table" style="width:100%;margin-left:-35px ">
          <tr>
              <th style="padding:10px;">Date</td> 
              <th >Purpose</td>
              <th >Income</td>
              <th >Expense</td>
          </tr>
         <?php
         if(isset($result)) {
            foreach($result as $value)
            { ?>
            <tr>
              <td style="text-align:center"> <?= $value['date'] ?> </td> 
              <td style="text-align:center"> <?= $value['purpose'] ?> </td>
              <td style="padding:10px"> <?= $value['income'] ?></td>
              <td> <?= $value['expense'] ?></td>
          <?php 
          }
          } ?>  
        </table>
</div>
<button class="open-button" onclick="openForm()">Insert Accounts Data</button>

<div style="align-items:center;position:absolute;left:40%;top:20%">
<div class="form-popup" id="myForm">
  <form action="./AccountsController" method="post" class="form-container">
    <h1 style="text-align:center">Accounts</h1>
    <input type="date" name="date" style="width: 90%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;"required>
    <input type="text" placeholder="Enter Purpose" name="purpose" required>
    <select name="type" style="width: 97%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">
                  <option value="Income" selected="selected">Income</option>
                  <option value="Expense" selected="selected">Expense</option>
    </select>
    <input type="text" placeholder="Enter Amount" name="amt" required>

    <button type="submit" class="btn">Insert</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
</div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "contents";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>
