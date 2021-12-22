<html>
  <head>
    <title>Live with Nature</title>
    <link rel="stylesheet" href="boot/css/stylesheet.css">
    <link rel="stylesheet" href="boot/css/LoginStyle.css">
  </head>
  
  <body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <div style="background-color: #2596be; height:100px;width:100%;border: solid 1px black;font-size:18px;color:red;"></div>

  <div class="backimage">
  <div class="container" >
    <div class="wrapper1">
     
          <p>Jesus answered, “I am the way and the truth and the life. No one comes to the Father except through me"</p>

     </div>
      <div class="wrapper">
        <div id="formContent" text-align: center>
          <div >
            <h3><img src="./images/loginimage.jpg" class="logotext"></h3>
          </div>
          <?php if(session()->get("success")) { ?>
          <div class="alert alert-success"> <?= session()->get("success") ?> 
          </div>
          <?php } ?>
          <?php if(session()->get("fail")) { ?>
          <div class="alert alert-danger"> <?= session()->get("fail") ?> 
          </div>
          <?php } ?>
          <?php if(session()->get("failure1")) { ?>
          <div class="alert alert-danger"> <?= session()->get("failure") ?> 
          </div>
          <?php } ?>

          <form method="post"  action="login_check"> 
            <input type="text" id="user_id"  name="user_id" placeholder="User Name">
            <input type="password" id="password" name="password" placeholder="Password"><br>
            <br>
            <input type="submit" value="Login" ><br>
            <div class='row d-flex justify-content-center'>
            <a href="ResetController"><p class="col-md-12">Forget Password?</p></a>
            <a href="SignupController"><p class="col-md-12">New User? Sign Up</p></a>
            </div>
          </form>    
        </div>
     </div>
         
  </div>
  </div>
  </body>

</html>