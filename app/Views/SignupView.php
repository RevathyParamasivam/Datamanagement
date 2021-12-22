<html>
<head>
 <link rel="stylesheet" href="boot/css/stylesheet.css">
  <link rel="stylesheet" href="boot/css/LoginStyle.css">
</head>
<body>
 
  	

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="wrapper">
  <div id="formContent">
      <div >
        <h3><img src="./images/logo4.png" class="logotext"></h3>
    </div>

   <?php if(session()->get('failure')) { ?>
           <div class="alert alert-danger"> <?php foreach(session()->get('failure') as $value) { print($value);?><br><?php }; ?> </div>
           <?php } ?>
     
     <form method="post"  action="Signup"> 
      <input type="text" id="user_id"  name="email" placeholder="Enter User Name" class="form-control" value="<?= set_value('email') ?>">
      <input type="password" id="password"  name="password" placeholder="Enter Password">
      <input type="password" id="cpassword"  name="cpassword" placeholder="Re-Enter Password">
      <input type="text" id="hint"  name="hint" placeholder="Enter Password Hint" autocomplete="off">

      <input type="submit" value="Sign Up"><br>
      <a href="LoginController">Already Having Account? Login</a>
    </form>    
    <div id="formFooter">       
    </div>
  </div>
</div>
</body>
</html>