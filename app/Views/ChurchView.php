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

      <div class="org-wrapper" class="wrapper">
          <form method="post"  action="" enctype="multipart/form-data">
            <label>Name of the Church</label>
            <input type="text" id="church" style="width:200px" name="church" placeholder="Name of the Church">
            <br/><br/>
            <label >Date of Formation</label>
            <input type="date" id="formdate" style="width:200px" name="formdate" placeholder="Date of Formation">
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
            <label>Taluk/Block</label>
            <input type="text" id="taluk" style="width:200px" name="taluk" placeholder="Taluk/Block">
            <br><br>
            <label>Pincode</label>
            <input type="text" id="pin" maxlength="6" style="width:200px" name="pin" placeholder="Pincode">
            <br><br>
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
            <br><br>
            
            <label>Property Possession?</label>
            <span class="radio-btn">
            <input type="radio" name="build" value="Own" /> Own 
            <input type="radio" name="build" value="Rented" /> Rented 
            </span>
            <br><br>
            <label style="align-items: center;">Remarks, if any</label>
            <textarea id="remarks" name="remarks" rows="3" cols="30"></textarea>  
            <br><br>
            <label>Organization to which the Church belongs</label>
                <input type="text" name="org" id="org" style="width:200px" placeholder="Name of the Organization">
           
            <div class="map">
                <label>Number of Believers</label>
                <input type="text" name="believersN" id="believersN" style="width:200px" name="believerN" placeholder="No. of Believers">
                <br/><br/>
                <label>Number of Baptized Believers</label>
                <input type="text" name="BbelieversN" id="BbelieversN" style="width:200px" name="BbelieverN" placeholder="No. of Baptized Believers">
                <br/><br/>
                <label>Number of Youths(above 18 yrs)</label>
                <input type="text" name="youthsN" id="youthsN" style="width:200px" name="youthsN" placeholder="No. of Youths">
                <br/><br/>
                <label>Number of Teenagers(from 13 to 18 yrs)</label>
                <input type="text" name="teenagersN" id="teenagersN" style="width:200px" name="teenagersN" placeholder="No. of Teenagers">
                <br/><br/>
                <label>Number of Children(below 13 yrs)</label>
                <input type="text" name="childrenN" id="childrenN" style="width:200px" name="childrenN" placeholder="No. of Children">
                <br/><br/>
                 <input type="hidden" name="lat" id="lat"/>
                 <input type="hidden" name="lng" id="lng"/>

                <label style="width:100px">Location</label>
                <div id="us2"  style="width: 90%; height: 400px;"></div>
                
       <!--
                <input type="file" name="logoimage">
-->
                <br><label>History of Church</label><br>
                <textarea id="history" name="history" rows="8" cols="65" style="width: 95%;"></textarea>  
                <br>                  
            </div>
            <br/><br/>
           <div style="text-align:center;">
            <input id="submit-btn" style="background-color: #2596be" type="submit" value="Add Church">
           </div>
            <br/><br/><br/><br/>
            </form>    
            <br/><br/>
                  
          
        </div>
  </div>
    <footer style="margin-top:-80px" >
     <div class="copyrights" style="background-color: #2596be;padding:20px">
		    <p>&copy; <?= date('Y') ?> Datamanagement. All rights reserved</p>
	   </div>
    </footer>
 </body>

</html>