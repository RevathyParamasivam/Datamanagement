<!DOCTYPE html>
<html>

  <head>
    <title>GEMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="boot/css/style.css">
    <link rel="stylesheet" href="boot/css/stylesheet.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
    <script type="text/javascript" src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>
    <script src="boot/js/script.js"></script>  
<style>
   #viewbutton {
        background: none;
        background-image: url('./images/view.png');
        background-size: cover;
        border-color:Transparent;
        border-image: none;
        width: 35px;
        height: 35px;
        
      }
  table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th {
		text-align: center;
    padding: 16px;
    background-color: #ffcc00;
		
		}

td {
  text-align: center;
  padding: 16px;
}

tr:nth-child(odd) {
  background-color: #f2f2f2;
}
.form-container .cancel {
  background-color: red;
}


</style>    
<script>

function openForm() {
  document.getElementById("myForm").style.display = "contents";
    
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
var stateObject = {
"India": { "Tamilnadu": ["Ariyalur", "Chennai","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kallakurichi","Kanchipuram","Kanniyakumari","Karur","Krishnagiri","Madurai","Nagapattinam","Namakkal","Nilgiris","Perambalur","Pudukkottai","Ramanathapuram","Salem","Sivaganga","Thanjavur","Theni","Thoothukudi","Tiruchirappalli","Tirunelveli","Tiruppur","Tiruvallur","Tiruvannamalai","Tiruvarur","Vellore","Viluppuram","Virudhunagar" ],
"Bihar": ["Araria", "Arwal","Banka","Bhojpur","Gaya","Patna","Rotas","Vaishali"],
},
"Australia": {
"South Australia": ["Dunstan", "Mitchell"],
"Victoria": ["Altona", "Euroa"]
}, "Canada": {
"Alberta": ["Acadia", "Bighorn"],
"Columbia": ["Washington", ""]
},
}
window.onload = function () {
var countySel = document.getElementById("countySel"),
stateSel = document.getElementById("stateSel"),
districtSel = document.getElementById("districtSel");
for (var country in stateObject) {
countySel.options[countySel.options.length] = new Option(country, country);
}
countySel.onchange = function () {
stateSel.length = 1; // remove all options bar first
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done 
for (var state in stateObject[this.value]) {
stateSel.options[stateSel.options.length] = new Option(state, state);
}
}
countySel.onchange(); // reset in case page is reloaded
stateSel.onchange = function () {
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done 
var district = stateObject[countySel.value][this.value];
for (var i = 0; i < district.length; i++) {
districtSel.options[districtSel.options.length] = new Option(district[i], district[i]);
}
}
}
</script>

  </head>

  <body style="display:block;position:relative;bottom:0px;">
    
    
    <div style="display:flex;background-color: #1e81b0; height:75px;width:100%;font-size:18px;color:red;padding:0px 0px 10px 0px">
    	<img src="./images/logo1.png" style="height:100px;padding:5px 5px 20px 50px">
    	<h1 style="color:tomato;font-size:2em; font-weight:bold;padding:20px 5px 20px 0px">GEMS</h1>
	  </div>
		  
<header>
  <!-- Displaying list of Organization -->
    <div class="list-align" id="list-id" style="width:90%">
      <br>
      <h2 style="color:tomato">List of Registered Organizations</h2>
      <br>
      <button>Add</button>
      <form method="post"  action="">
          
        <table id="myTable" style="text-align:center;padding:0.2em; width:100%">
          <tr class="header" id="list_header">
            <th style="width:30%;">Organization</th>
            <th style="width:30%;">Contact Number</th>
            <th style="width:20%;">View</th>
            <th style="width:20%;">Update</th>
            <th style="width:20%;">Delete</th>
          </tr>
    
          <?php if(isset($result)) {
                      foreach($result as $value){ ?>
             <form action="./OrgController" method="post" class="form-container">

             <tr>
              <td id="org" name="<?=$value['id']?>"><?= $value['org'] ?></td>
              <td id="mobile" name="<?=$value['id']?>"><?= $value['mobile'] ?></td>
              <td id="column4" style="vertical-align:middle"> <a href="http://localhost/Datamanagement//OrgController/view/<?=$value['id']?>"><img src="http://localhost/Datamanagement/images/view.png" onclick="openForm()" style="height:30px"></a></td>
              <?php   
                    $session=session();
                    $session->setFlashdata('ActionId', $session->get('lid1'));
                    
                    ?>
              <td><a href="/OrgController/update/<?=$value['id']?>""><img src="http://localhost/Datamanagement//images/edit.png" style="height:30px"></a></td>
              <td id="column5" style="vertical-align:middle"> <a href="OrgController/delete/<?=$value['id']?>""><img src="http://localhost/Datamanagement/images/delete.png" style="height:30px"></a></td>
            </tr>
             </form>
          <?php }}?>
          </table>
      </form>
  </div>

  <!-- Display Single Organization Details -->
       <div style="align-items:center;position:absolute;left:15%;top:10%">
       <div id="myForm" class="form-popup">
         <form action="./AccountsController" method="post" class="form-container">
       <?php
       if(session()->get("action")=="view")  {
         ?>
                
        <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">Organization ID   : <?= session()->get("orgId") ?></label>
       <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">Organization Name  : <?= session()->get("name") ?></label>
       <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">Formation Date     : <?= session()->get("formdate") ?></label>
       <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">Address            : <?= session()->get("paddress") ?></label>
       
       <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">State              : <?= session()->get("state") ?></label>
       <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">Country            : <?= session()->get("country") ?></label>
       <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">District           : <?= session()->get("district") ?></label>
       <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">Taluk              : <?= session()->get("taluk") ?></label>
       <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">Village/City               : <?= session()->get("city") ?></label>
       <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">Pin                : <?= session()->get("pin") ?></label>
       <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">Mobile             : <?= session()->get("mobile") ?></label>
       <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">Amobile            : <?= session()->get("Amobile") ?></label>
       <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">Email              : <?= session()->get("email") ?></label>
       <label style="width: 40%;padding: 15px;margin: 5px 0 22px 0;border: none;background: #f1f1f1;">Username           : <?= session()->get("username") ?></label>
       <br>
        <?php }?>
        <button type="button" style="padding:10px 10px 10px 10px" class="btn cancel" onclick="closeForm()">Close</button>
         </form>
       </div>
       </div>
	</header>      
  
      
      <br/>

    <div id="main-container">  

      <div class="org-wrapper wrapper" >
          <form method="post"  action="" enctype="multipart/form-data">
            <label>Name of the Organization</label>
            <input type="text" id="org" style="width:200px" name="org" placeholder="Name of the Organization">
            <br/><br/>
            <label >Date of Formation</label>
            <input type="date" id="formdate" style="width:200px" name="formdate" placeholder="Date of Formation">
            <br/></br>
            <label>Present Address</label>
            <input type="text" id="paddress" style="width:200px" name="paddress" placeholder="Present Address">
            <br/><br/>
            
            <label>Country</label>
            <select name="country" id="countySel" size="1" style="width:200px;padding:3px;">
                <option value="" selected="selected">Select Country</option>
            </select>
            <br><br>
            <label>state</label>
            <select name="state" id="stateSel" size="1" style="width:200px;padding:3px;">
                <option value="" selected="selected">Select State</option>
            </select>
            <br><br>
            <label>District</label>
            <select name="district" id="districtSel" size="1" style="width:200px;padding:3px;">
                <option value="" selected="selected">Select District</option>
            </select>
            <br><br>
            <label>Village/City</label>
            <input type="text" id="city" style="width:200px" name="city" placeholder="City">
            <br><br>
            <label>Taluk/Block</label>
            <input type="text" id="taluk" style="width:200px" name="taluk" placeholder="Taluk/Block">
            <br><br>
            
            <label>Pincode</label>
            <input type="text" id="pin" maxlength="6" style="width:200px" name="pin" placeholder="Pincode">
            <br><br> 
            <label style="align-items: center;">Remarks, if any</label>
            <textarea id="remarks" name="remarks" rows="3" cols="30"></textarea>  
            <br><br>
            <label>Logo</label>
                       <input type="file" name="logoimage">
        
            
            <div class="map" style="margin-top: -47.5%;">
           
                <label>Mobile Number</label>
                <input type="text" id="mobile" maxlength="10" style="width:200px" name="mobile" placeholder="Mobile Number">
                <br><br>
                <label>Alternate Mobile Number</label>
                <input type="text" id="Amobile" maxlength="10" style="width:200px" name="Amobile" placeholder="Alternate Mobile Number">
                <br><br>
                <label>E-Mail Id</label>
                <input type="text" id="email" style="width:200px" name="email" placeholder="E-Mail Id">
                <br><br>
                <label>Username for Weblogin</label>
                <input type="text" id="username" style="width:200px" name="username" placeholder="Username for Weblogin">
                 <input type="hidden" name="lat" id="lat"/>
                 <input type="hidden" name="lng" id="lng"/>

                <br><br>
                <label style="width:100px">Location</label>
                <div id="us2"  style="width: 90%; height: 400px;"></div>
                               

                              
            </div>
            <br/><br/>
           <div style="text-align:center;">
            <input id="submit-btn" style="background-color: #2596be" type="submit" value="Add Organization">
           </div>
            <br/><br/><br/><br/>
            </form>    
            <br/><br/>

          
        </div>
  </div>
    <footer style="margin-top:-50px" >
     <div class="copyrights" style="background-color: #2596be;padding:20px">
		    <p>&copy; <?= date('Y') ?> Datamanagement. All rights reserved</p>
	   </div>
    </footer>
 </body>

</html>