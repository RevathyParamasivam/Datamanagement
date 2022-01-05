<!DOCTYPE html>
<html>

  <head>
    <title>Live with Nature</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="boot/css/style.css">
    <link rel="stylesheet" href="boot/css/stylesheet.css">
<script>
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
    
function handleClick(myRadio) {
          var selectedValue = myRadio.value;
          if(selectedValue=="1")
            {
            document.getElementById("ifYes").style.display ='block';
            //Show textbox
            }
          else if(selectedValue=="0")
            {
            document.getElementById("ifYes").style.display = 'none';
            //Hide textbox.
            }
 }

</script>

  </head>

  <body>
    
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
    <script type="text/javascript" src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>
    <script src="boot/js/script.js"></script>  
  <div style="background-color: #2596be; height:100px;width:100%;font-size:18px;color:white;text-align:center;padding:30px;margin:auto"><p> Welcome to Data Management System - Add Church</p></div>
		  
<header>
	
	<div style="margin-top: 5px">
			<ul style="text-align:center">
			<li class="menu-toggle">
				<button onclick="toggleMenu();">&#9776;</button>
			</li>
			<li class="menu-item hidden"><a href="Home" target="_self">Organization</a></li>
			<li class="menu-item hidden"><a href="#" target="_self">Churches</a>
			</li>
			<li class="menu-item hidden"><a href="LoginController" target="_self">Members</a></li>
			<li class="menu-item hidden"><a href="DonateController" target="_self">Attendance</a>
			<li class="menu-item hidden"><a href="DonateController" target="_self">Accounts</a>
			</li>
	     	</ul>
	</div>
</header>      
  
      
      <br/>

  <div id="main-container">  

      <div class="org-wrapper" class="wrapper" style="margin-left: 14%">
          <form method="post"  action="" enctype="multipart/form-data">
             <label>Church to which the Member belongs</label>
           <select name="cid" id="cid" size="1" style="width:200px;padding:3px;">  
            <?php if(isset($result)) { 
              foreach($result as $value) {?>
                   <option value="<?= $value['id'] ?>" selected="selected"><?= $value['church'] ?></option>
             <?php } } ?>
            </select>
            <br/><br/>
            <label>Member Name</label>
            <input type="text" id="member" style="width:200px" name="member" placeholder="Member Name">
            <br/><br/>
            <label>Believer or Pastor?</label>
            <select name="bOrp" id="bOrP" size="1" style="width:200px;padding:3px;">
                  <option value="Believer" selected="selected">Beliver</option>
                  <option value="Pastor" selected="selected">Pastor</option>
            </select>
            <br/><br/>
            <label >Date of Birth</label>
            <input type="date" id="dob" style="width:200px" name="dob" placeholder="Date of Formation">
            <br/></br>
            <label>Present Address</label>
            <input type="text" id="paddress" style="width:200px" name="paddress" placeholder="Present Address">
            <br/><br/>
            <label>City</label>
            <input type="text" id="city" style="width:200px" name="city" placeholder="City">
            <br><br>
            <label>Country</label>
            <select name="country" id="countySel" size="1" style="width:200px;padding:3px;">
                <option value="" selected="selected">Select Country</option>
            </select>
            <br><br>
            <label>State</label>
            <select name="state" id="stateSel" size="1" style="width:200px;padding:3px;">
                <option value="" selected="selected">Select State</option>
            </select>
            <br><br>
            <label>District</label>
            <select name="district" id="districtSel" size="1" style="width:200px;padding:3px;">
                <option value="" selected="selected">Select District</option>
            </select>
            <br><br>
            <label>Taluk/Block</label>
            <input type="text" id="taluk" style="width:200px" name="taluk" placeholder="Taluk/Block">
            <br><br>
            <label>Pincode</label>
            <input type="text" id="pin" maxlength="6" style="width:200px" name="pin" placeholder="Pincode">
            <br><br> 
              <label>Mobile Number</label>
              <input type="text" id="cnumber" maxlength="10" style="width:200px" name="cnumber" placeholder="Mobile Number">
              <br><br>
                       
            <div class="map" style="margin-top: -55%; margin-left: 45%;">
            
              <label>Whatsapp Number</label>
              <input type="text" id="wnumber" maxlength="10" style="width:200px" name="wnumber" placeholder="Alternate Mobile Number">
              <br><br>    
                
                <label>E-Mail Id</label>
                <input type="text" id="email" style="width:200px" name="email" placeholder="E-Mail Id">
                <br><br>
                <label>Gender</label>
                <select name="gender" id="gender" size="1" style="width:200px;padding:3px;">
                  <option value="Male" selected="selected">Male</option>
                  <option value="Female" selected="selected">Female</option>
                  <option value="Male" selected="selected">Transgender</option>
                </select>
                <br><br>
                <label>Qualification</label>
                <input type="equalification" id="equalification" style="width:200px" name="equalification" placeholder="Educational qualification">
                <br><br>
                <label>Skills</label>
                <input type="skills" id="skills" style="width:200px" name="skills" placeholder="skills">
                <br><br>
                <label>Church Involvement</label>
                <input type="text" id="involve" style="width:200px" name="involve" placeholder="Church Involvement">
                <br><br>
                <label>Baptized?</label>
                    <span class="radio-btn">
                    <input type="radio" onclick="handleClick(this);" id="yesCheck" name="baptized" value="1"/> Yes 
                    <input type="radio" onclick="handleClick(this);" id="noCheck" name="baptized" value="0"/> No 
                </span>
                <br><br>
                <div id="ifYes">
                <label>Self Declaration</label>
                <input type="file" name="declaration">
                <br><br>
                </div>
                <label>Adhar Number</label>
                <input type="text" id="adhar" style="width:200px" name="adhar" placeholder="Adhar number">
                <br><br>
                <label>Member Photo</label>
                <input type="file" name="memberimage">
                <br><br> 
                <label style="align-items: center;">Remarks, if any</label>
            <textarea id="remarks" name="remarks" rows="3" cols="30"></textarea>  
                    
            </div>
            <br/><br/>
            <br><br>
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