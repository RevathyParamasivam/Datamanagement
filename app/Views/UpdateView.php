<html>
<head>
 <title>Live with Nature</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="boot/css/style.css">
    <link rel="stylesheet" href="boot/css/stylesheet.css">
    <link rel="stylesheet" href="boot/css/style-up.css">
  </head>
<body>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <header style="background-color: #eceff1">
<div class="d-flex justify-content-end" style="text-align:right; ">
              <a href="http://localhost/Weblog/ProfileController/logout" class="btn btn-right btn-primary" style="margin: 20px;background-color: rgb(36,121,93);padding: 10px 20px; border: none; color: white; text-transform: uppercase;font-size: 13px;">Logout</a>
            </div>

      <div style="text-align:center; margin-top: -120px">
		  <img src="http://localhost/Weblog/images/logo_1.png" alt="LOGO" height="250" style="margin-top: 20px;">
      </div>

       <div class="heroe" style="margin-top: -60px; margin-bottom: -25px ">

          <h1 id="heading" style="text-align: center; margin-left: 3rem;padding: 1rem 1.75rem 1.75rem 1.75rem;">Welcome <?php $session = session(); echo $session->get('user_name'); ?>  </h1>
        </div>
        <hr/>
      </header>
      
      <br/>

  <div class="main-container" style="margin-left: 5rem;">
   <div class="wrapper">
  
    <?php if(session()->get("sourceId1")) { ?>
     <div class="alert alert-danger"> <?php echo (session()->get("sourceId")); ?><br> <?php }?></div>

     <form method="post" action="OperationController"> 
       <?php
                    $session=session();   
                    $session->setFlashdata('lid1', $session->get('lid1'));
                    $session->setFlashdata("user_name",$session->get('user_name'));
                    ?>
         <input type="text" id="source"  name="source" style="width: 37rem;height: 5rem;background-color: rgb(248, 248, 248);border: none;border-radius: 5px;padding: 10px;" value="<?php echo ($session->get('source')); ?>"><br><br>
         <textarea class="textarea" id="benefits" name="benefits" cols="75%" rows="10" style="border-radius: 5px;background-color: rgb(248, 248, 248);border: none;padding: 10px;"><?php echo htmlspecialchars($session->get('benefits')); ?></textarea><br><br>
         <input type="hidden" name="sourceId" id="sourceId" value="<?php echo (session()->get("sourceId"));?>" /><br />
       
         <input type="submit" value="Update" style="background-color: rgb(36,121,93);padding: 15px 26px;border: none;color: white; text-transform: uppercase;font-size: 13px; border-radius: 5px;margin-bottom: -10rem;">
        <img class="fruit-img-1"src="http://localhost/Weblog/images/fruits.jpg" alt="fruit image" style="display: flex;margin-left: 60%;margin-top: -20%;">
        <br/> 
        <br/> 
        <br/> 

     </form>  
     <br/>  
 </div>
<br>
<br>
<br>
  </div>
<footer>

    <div class="copyrights" style="background-color: #7db86a;color: rgba(200, 200, 200, 1);padding: .25rem 1.75rem; text-align:center;">

        <p>&copy; <?= date('Y') ?> Live with Nature. All rights reserved</p>

    </div>

</footer>

</body>
</html>
