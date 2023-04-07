<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Bamboo community</title>
</head>
<style>
  body{
    overflow-x: hidden;
  }

  #centered1
  {
    position: absolute;
    font-size: 10px;
    top: 48%;
    left :30%;
    transform: translate(-50%,-50%);
  }

  #centered2
  {
    position: absolute;
    font-size: 10vw;
    top: 68%;
    left :30%;
    transform: translate(-50%,-50%);
  }
  #centered3
  {
    position: absolute;
    font-size: 10vw;
    top: 88%;
    left :40%;
    transform: translate(-50%,-50%);
  }

  #sign-up
  {
    width:60%;
    color:#3EDC5D;
    border:1px solid #3EDC5D;
    width:60%;
    background-color:#fff;
    border-radius:30px;
  }

  #login-in
  {
    width:60%;
    color:#fff;
    border:1px solid #3EDC5D;
    width:60%;
    background-color:#3EDC5D;
    border-radius:30px;
  }

  #login-in:hover
  {
    width:60%;
    color:#208033;
    border:2px solid #208033;
    width:60%;
    border-radius:30px;
  }

  .well
  {
    background-color:#2DBD49;
  }


</style>

<body>
   

    <div class="row">
      <div class="col-sm-12">
        <div class="well">
          <center> <h1 style="color:white;">Bamboo</h1> </center>
        </div>
      </div>
    </div>

   <div class="row">
     <div class="col-sm-6" style="Left:0.5%;">
       <img src="images/mainpage.jpeg" class="img-rounded" title="bamboo-community" width="650px" height="565px" >
       <div id="centered1" class="centered"><h3 style="color:white;"><span class="glyphicon glyphicon-search"></span>
      &nbsp&nbsp <strong>Follow your interest</strong></h3></div>
      <div id="centered2" class="centered"><h3 style="color:white;"><span class="glyphicon glyphicon-search"></span>
        &nbsp&nbsp <strong>Discover bamboo</strong></h3></div>
       <div id="centered3" class="centered"><h3 style="color:white;"><span class="glyphicon glyphicon-search"></span>
        &nbsp&nbsp <strong>make green economy stronger!</strong></h3></div>
       </div>
  
       <div class="col-sm-6" style="Left:8%">
        <img src="images/bamboologo.jpeg" class="img-rounded" title="bamboo-community" width="300px" height="210px" >
        <h2><strong>Here is Bamboo Community <br> come on </strong></h2> <br><br>
        <h4><strong>Join  Bamboo Community today<br> come on </strong></h4> <br><br>
        <form action="register.php">
         <button id="sign-up" class="btn btn-info btn-lg" name="sign-in" title="bamboo community" width="80px" height="80px" > Sign up</button><br><br>
        </form><br><br>
        <form action="login.php">
         <button id="login-in" class="btn btn-info btn-lg" name="login-in" title="bamboo community" width="80px" height="80px" >Login in</button><br><br>
        </form><br><br>
       </div>
        
 
     </div>
     
   

  


   
  
</body>
</html>