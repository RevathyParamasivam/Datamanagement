  <!DOCTYPE html>
  <html>
  <head>
      <link rel="stylesheet" href="boot/css/stylesheet.css">
      <link rel="stylesheet" href="boot/css/style.css">
  <style>

 #myInput {
    background-image: url('/css/searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
  }

  #myTable {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #ddd;
    font-size: 18px;
  }

  #myTable th, #myTable td {
    text-align: left;
    padding: 12px;
  }

  #myTable tr {
    border-bottom: 1px solid #ddd;
  }

  #myTable tr.header, #myTable tr:hover {
    background-color: #f1f1f1;
  }
  </style>
  </head>
  <body>
    <div style="background-color: #2596be; height:100px;width:100%;font-size:18px;color:white;text-align:center;padding:5px;margin:0"><p> Welcome Revathy</p></div>
		  

  <div class="list-align">
      <h2>Mark Attendance</h2>
      <form method="post"  action="">
          <div style="text-align:center">
            <input type="text" style="width:20%" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="width:20%" id="myInput" name="occassion" placeholder="Occassion Name">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="date" id="myInput" style="width:20%;padding:9px;" name="oDate">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input id="submit-btn" style="width:20% ; background-color: #2596be" type="submit" value="Submit Attendance">
          </div>
        <table id="myTable">
          <tr class="header">
            <th style="width:30%;">Name</th>
            <th style="width:30%;">Photo</th>
            <th style="width:30%;">Attendance</th>
          </tr>
    
          <?php if(isset($result)) { 
          foreach($result as $value){ ?>
             <tr>
              <td id="member" name='" . $value['member'] . "'><?= $value['member'] ?></td>
              <td id="memberimage"><span><img src="./uploads/<?= $value['memberimage'] ?>"></span></td>
              <td id="cnumber" name="memberId"><span><input id="attend" type="checkbox" name="attend"  onclick="getatt(this.checked);" value="0" /> Present</span></td>
            </tr>
 
          <?php }}?>
          </table>
      </form>
  </div>
  <script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }

  function getatt(value)
	{
		if(value == true)
		{
			document.getElementById("attend").value = 1;
			
		}
		else
		{
			document.getElementById("attend").value = 0;
		}
	}
  </script>

  </body>
  </html>
