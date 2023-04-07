


<html>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>Bamboo community Registerpage</title>
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
          height: 65%;
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
    
      
      #register
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
              <form method="post" action="insert_user.php">
                <div class="ipnut-group">
                   <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                    <input class="form-control" type="text" name="name" id="name" placeholder="name" required="required"/>
                </div><br>


                <div class="ipnut-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <input class="form-control" type="text" name="email" id="email" placeholder="email" required="required"/>
               </div><br>
    
                <div class="ipnut-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control" type="password" name="password" id="password"  placeholder="password" required="required" >
                </div><br>

                

                
    
                <a style="text-decoration:none;float:right;color :#187fab;" title:"sign-in" href="login.php" data-toggle:"tooltip">
                  already have account? try to login
                </a><br>
    
                <center> <button id="register" class="btn btn-info btn-lg" name="register" title="bamboo community" width="80px" height="80px" >sign up</button><br><br> </form></center>

                <?php include("insert_user.php"); ?>

              </form>
            </div>
          </div>
          </div>
         </div>
    </body>
    </html>
</html>
