<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Live with Nature</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="stylesheet" href="boot/css/stylesheet.css">
    <link rel="stylesheet" href="boot/css/style.css">
	</head>

  <body>
    
    <div style="background-color: #2596be; height:100px;width:100%;font-size:18px;color:white;text-align:center;padding:5px;margin:auto"><p> Welcome Revathy</p></div>
		  
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
<div class="container-menu" style="padding: 50px 100px 50px 100px;"> 
	<div class="menu1" style="background-color:#96be25;text-align:center; 
	padding: 20px 20px 40px 20px;
	 "><a href="ProfileController" target="_self">Organization</a></div>
	<div class="menu1" style="background-color: #ff000f; text-align:center; 
	padding: 20px 20px 40px 20px;
	 ">Chruches</div>
	 
	
	<div class="menu2" style="background-color: #be4d25;text-align:center; 
	padding: 20px 20px 40px 20px;margin: top 3px;
	  ">Members</div>
	<div class="menu2" style="background-color: #ff00ff;text-align:center; 
	padding: 20px 20px 40px 20px;margin: top 3px;
	  ">Attendance</div>
	<div class="menu2" style="margin: top 3px;background-color: #be2596;text-align:center; 
	padding: 20px 20px 40px 20px;
	  ">Accounts</div>
	  
	
	
</div>
</br>
<footer>

	<div class="copyrights">

		<p>&copy; <?= date('Y') ?> Live with Nature. All rights reserved</p>

	</div>

</footer>

</html>