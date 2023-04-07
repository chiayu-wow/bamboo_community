
<!-- download phpmailer first from https://github.com/PHPMailer/PHPMailer -->

<?php
    include("includes/connection.php");
 
    if (isset($_POST["register"]))
    {
        $name = htmlentities(mysqli_real_escape_string($conn, $_POST["name"]));
        $email = htmlentities(mysqli_real_escape_string($conn, $_POST["email"]));
        $password = htmlentities(mysqli_real_escape_string($conn, $_POST["password"]));

 
           // connect with database
           
 
            // insert in users table
     
        $check_email="select * from user where email= ' $email' ";
        $run_email=mysqli_query($conn,$check_email);

        $check=mysqli_num_rows($run_email);

        if($check==1)
        {
            echo"<script> alert('email already exist , try another email!')</script>";
            echo"<script> window.open('register.php','_self') </script>";
            exit();
        }
      
        
        $profile_pic="https://project-ccu-2021.000webhostapp.com/pic/user/default.png";

        $insert="insert into user (name,email,password,photo,identification_code) values ('$name','$email','$password','$profile_pic',1)";
    
        $query= mysqli_query($conn,$insert);

        if($query)
        {
            echo"<script> alert('well done! $name you are good to go')</script>";
            echo"<script> window.open('login.php','_self') </script>";
            exit();
        }else
        {
            echo"<script> alert('register failed ,please try again!')</script>";
            echo"<script> window.open('register.php','_self') </script>";
            exit();
        }


    }
?>