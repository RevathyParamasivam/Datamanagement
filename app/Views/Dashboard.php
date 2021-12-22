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
    
      
<header style="background-color: #eceff1">
	
	<div id="logo-container" style="text-align:center">
			<img src="./images/logo_1.png" alt="LOGO" height="250">
	</div>
	<div style="margin-top: -60px">
			<ul style="text-align:center">
			<li class="menu-toggle">
				<button onclick="toggleMenu();">&#9776;</button>
			</li>
			<li class="menu-item hidden"><a href="Home" target="_self">Home</a></li>
			<li class="menu-item hidden"><a href="#" target="_self">Supplements</a>
			</li>
			<li class="menu-item hidden"><a href="LoginController" target="_self">Share</a></li>
			<li class="menu-item hidden"><a
					href="DonateController" target="_self">Donate</a>
			</li>
	     	</ul>
	</div>
</header>
      <div class="jumbotron bg-white">
        <table class="table" id="table">
          <tr>
              <th style="padding-right: 15px; padding-left: 15px;" id="th1" width="300">Source</td> 
              <th style="padding-right: 15px; padding-left: 15px;" id="th2">Benefits</td>
            </tr>
		  <?php if(isset($result)) {
            foreach($result as $value)
            { ?>
			
            <tr>
              <td id="column1" style="padding-right: 15px; padding-left: 15px;padding-top: 15px; padding-bottom: 15px;"> <?= $value['source'] ?> </td> 
              <td id="column2" style="padding-right: 15px; padding-left: 15px;padding-top: 15px; padding-bottom: 15px;"> <?= $value['benefits'] ?> </td>
            </tr>
          <?php 
          }
          } ?>  
        </table>
      </div>
    </div>
  </body>
<footer>

	<div class="copyrights">

		<p>&copy; <?= date('Y') ?> Live with Nature. All rights reserved</p>

	</div>

</footer>

</html>