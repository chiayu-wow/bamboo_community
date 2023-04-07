<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../../img/favicon.ico"> 
      <title>Bamboo community loginpage</title>
</head>
<body>

  <style>

    body
    {
      overflow-x: hidden;
    }
    .main-content
    {
      width: 50%;
      height: 40%;
      margin: 10px auto;
      background-color: #fff;
      border: 2px solid #e6e6e6;
      padding: 40px 50px;
    }

    .header
    {
      border: 0px solid #000;
      margin-bottom: 5px;
    }

  .well
  {
    background-color:#2DBD49;
  }

  
  #log-in
  {
    width: 60%;
    border-radius: 30px;
  }

  </style>

  <div class="row">
    <div class="col-sm-12">
      <div class="well">
        <center> <h1 style="color:white;"> Bamboo Community</h1> </center>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="main-content">
        <div class="header">
          <h3 style="text-align:center;"><strong>Join Bamboo Community</strong> </h3><br>
        </div>
        <div class="1-part">
          <form method="post" action="signin.php">
            
          

            <a style="text-decoration:none;float:right;color :#187fab;" title:"sign-in" href="register.php" data-toggle:"tooltip">
              doesn't have account? try to register one!
            </a><br>
            <?php
            include("signin.php");
            ?>
          </form>
          <form action="login_for_manager.php">
              <center> <button id="log-in" class="btn btn-success btn-lg" name="login" title="bamboo community" width="80px" height="80px" >Login in for manager</button><br><br></center>
          </form>
        </div>
      </div>
      </div>
     </div>
  






</body>
</html>