<html>
<head>
  <title>Live with Nature</title>
 <link rel="stylesheet" href="boot/css/stylesheet.css">
  <link rel="stylesheet" href="boot/css/LoginStyle.css">
  <link rel="stylesheet" href="boot/css/style.css">
</head>
<body>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="wrapper">
  <div id="formContent">
      <div >
        <h3><img src="./images/logo4.png" class="logotext" ></h3>
    </div>
    
    <?php if(session()->get("failure")) { ?>
           <div class="alert alert-danger"> <?php foreach(session('failure') as $value) { print($value);?><br><?php }; ?> </div>
           <?php } ?>
     <form method="post"  action="resethint"> 
      <input  style="text-align:center" type="text" id="user_id" name="user_id" placeholder="User Name">
      <input type="text" id="hint" name="hint" placeholder="Enter Hint" autocomplete="off">
       <input type="password" id="password"  name="password" placeholder="Enter New Password" autocomplete="off">
       <input type="password" id="cpassword"  name="cpassword" placeholder="Confirm Password" autocomplete="off">
      <input type="submit" value="Reset"><br>
         </form>    
      </div>
</div>
</body>
</html>