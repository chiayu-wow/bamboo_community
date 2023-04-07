
<!DOCTYPE html>

<?php
  
    include("includes/header_backend.php");

    
?>
<head>

  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
    <link rel="stylesheet" href="display_home.css">
 

    <title> backend panel </title>
</head>
<style>
 #cover_img
    {
        height:400px;
        width :100%;
    }
    #profile_img
    {
        position: absolute;
        top:180px;
        Left:40px;
    }

    #update_profile
    {
        position:absolute;
        top:300px;
        cursor:pointer;
        Left:130px;
        border-radius:4px;
        background-color:rgba(0,0,0,0.1);
        transform:translate(-50%,-50%);
    }

   

</style>
<body>
    

<div class="row">
        <div class="col-sm-12">
            <center><h2><strong>BamCommunity user summery</strong></h2><br></center>
            <?php
                 $conn = mysqli_connect("localhost", "id17866793_admin", 'P9%X?Fba\wn\F|yY', "id17866793_androiddb");
                 $select_user="select * from user where identification_code='1' OR identification_code='8' ;";
                 $query= mysqli_query($conn,$select_user);
                 $users=mysqli_num_rows($query);
                 echo"

                 <ul class='list-group'>
                 <li class='list-group-item active' aria-current='true'>ALL user</li>";
                
                 while ($rows = mysqli_fetch_assoc($query)) {
                     $user_id=$rows['id'];
                     $user_name=$rows['name'];
                     $pass=$rows['password'];
                     $log=$rows['identification_code'];
                     $email=$rows['email'];
                   
                    
                   echo" 
                  
                            <div class='col-sm-8'>
                                <li class='list-group-item'> user ID :$user_id <br> user eamil：$email <br> password： $pass <br> permission： $log  <br> name : "; echo"<a href='profile_end.php?user_ID=$user_id'> $user_name </a>"; 
                                echo"</li></div>
                   ";

                   echo"
                      
                            <div class='col-sm-2'>
                            <a href='limit.php?uid=$user_id' style='float:right;'> <button class='btn btn-danger'>limit this account</button></a><br>
                            </div>
                        ";
                        Limit();   
                        echo "
                            <div class='col-sm-2'>
                            <a href='unlimit.php?uid=$user_id' style='float:right;'> <button class='btn btn-success'>Restoring restricted accounts </button></a><br>
                             </div>
                       ";
                        
                 }
                echo  "</ul>";
            ?>
        </div>
    </div>
</body>
</html>

