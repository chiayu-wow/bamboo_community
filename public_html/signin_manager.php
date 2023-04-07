<?php
  
    $conn = mysqli_connect("localhost", "id17866793_admin", 'P9%X?Fba\wn\F|yY', "id17866793_androiddb");

    
   

    if (isset($_POST["login"]))
    {
       
        $email = htmlentities(mysqli_real_escape_string($conn, $_POST["email"]));
        $password = htmlentities(mysqli_real_escape_string($conn, $_POST["password"]));
       
 
        $select_user="select * from user where name='$email' AND password='$password'" ;
        $query= mysqli_query($conn,$select_user);
        $check_user=mysqli_num_rows($query);
        
        $rows = mysqli_fetch_assoc($query);
        
        $check_m=$rows['identification_code'];
        
        
        
        

        

        if($check_user==1&&$check_m==0)
        {
           
           
            echo"<script> window.open('back_home.php','_self')</script>";
        }else
        {
              echo"<script> alert('password is not correct') </script>";
            echo"<script> window.open('login_for_manager.php','_self')</script>";
        }
    }
?>