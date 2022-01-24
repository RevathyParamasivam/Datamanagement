<!DOCTYPE html>
 <html>

<head>
	<meta charset="UTF-8">
	<title>GEMS</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url('images/logo_icon.ico')?>">

    <link rel="stylesheet" href="boot/css/stylesheet.css">
    <link rel="stylesheet" href="boot/css/style.css">
	
	</head>

  <body style="display:block;position:relative;bottom:0px;">
    
      <div style="display:flex;background-color: #1e81b0; height:75px;width:100%;font-size:18px;color:red;padding:0px 0px 10px 0px">
    	<img src="./images/logo1.png" style="height:75px; padding:10px 0px 15px 50px">
    	<h1 style="color:tomato;font-size: 2em;font-weight:bold;">GEMS</h1>
	  </div>
	<div style="margin-left:100px;margin-right:100px;margin-top:10px;border:2px groove">
		<div style="background-image: url(./images/bar.png);padding:10px 10px 10px 20px" ><img src="<?=base_url('images/summary.jpg')?>" style="height:25px">Summary
		<br></div>
		<div>
		  
  	<div class="container-menu" style="padding: 50px 100px 50px 100px; text-align:center;"> 
	<div id="menu-1"class="menu1">
		<div style="height:100px;line-height:100px;background-color:#96be25;text-align:center;border-radius:2px;"><a href="OrgController" target="_self" style="text-decoration:none;">Organizations Registered : <?= session()->get("org") ?></a></div>
		<div style="height:45px;background-color:#75951d;text-align:center;border-radius:2px;color:aliceblue;"><a href="OrgController" target="_self">Organization</a></div>
	</div>
	<div id="menu-1"class="menu1">
		<div style="height:100px;line-height:100px;background-color:#ff000f;text-align:center;border-radius:2px;"><a href="ChurchController" target="_self" style="text-decoration:none;">Churches Registered : <?= session()->get("church") ?></a></div>
		<div style="height:45px;background-color:#e60000;text-align:center;border-radius:2px;"><a href="ChurchController" target="_self">Church</a></div>
	 </div>
	 
	<div id="menu-3"class="menu2"style="text-align:center;border-radius:2px;">
		<div style="height:100px;line-height:100px;background-color:#be2596;"><a href="MemberController" target="_self" style="text-decoration:none;">Members Registered : <?= session()->get("member") ?></a></div>
		<div style="height:45px;background-color:#801964;"><a href="MemberController" target="_self">Members</a></div>
	 </div>
	<div id="menu-4"class="menu2" style="text-align:center;border-radius:2px;">
		<div style="height:100px;line-height:100px;background-color:#25a5be;"><a href="AttendanceController" target="_self"style="text-decoration:none;">Occassions Registered : <?= session()->get("attendance") ?></a></div>
		<div style="height:45px;background-color:#2587be;"><a href="AttendanceController" target="_self">Attendance</a></div>
	 </div>
		<div id="menu-5"class="menu2" style="text-align:center;border-radius:2px;">
		<div style="height:100px;line-height:100px;background-color:#dd5555;"><a href="AccountsController" target="_self" style="text-decoration:none;">No. of entries made : <?= session()->get("accounts") ?></a></div>
		<div style="height:45px;background-color:#951d1d;"><a href="AccountsController" target="_self">Accounts</a></div>
	 </div>
	</div>
</div>
	</div>
</br>

<div style="margin-top:58px;text-align:center;padding:20px 20px 24px 20px;background:#1e81b0">Copyright &copy; 2021. Gospel Echoing Missionary Society</div>


  </body>
</html>