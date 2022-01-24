  <!DOCTYPE html>
  <html>
  <head>
      <link rel="stylesheet" href="boot/css/stylesheet.css">
      <link rel="stylesheet" href="boot/css/style.css">
  <style>
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
            
        <table id="myTable" style="text-align:center;padding: 0.2em;">
          <tr class="header">
            <th style="width:25%;">Member Name</th>
            <th style="width:25%;">Photo</th>
            <th style="width:25%;">View</th>
            <th style="width:25%;">View-Pdf</th>
          </tr>
    
          <?php if(isset($customer_data)) {
                      foreach($customer_data as $value){ ?>
             <tr>
              <td id="memberid" name="<?=$value['id']?>"><?= $value['member'] ?></td>
              <td id="memberimage"><span><img src="./uploads/<?= $value['memberimage'] ?>"></span></td>
              <td id="viewId"><a href="./HtmlToPdfController/details/<?=$value['id']?>">View</a></td>
              <td id="viewId"><a href="./HtmlToPdfController/pdfdetails/<?=$value['id']?>">VIEW-PDF</a></td>
            </tr>
 
          <?php }}?>
          </table>
      </form>
  </div>
   <?php if(isset($customer_details)) 
                      echo $customer_details; ?>
  
   
  
  </body>
  </html>
