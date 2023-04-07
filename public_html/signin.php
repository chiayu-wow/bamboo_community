<?php
 

    include("includes/connection.php");

    if (isset($_POST["login"]))
    {
       
        $email = htmlentities(mysqli_real_escape_string($conn, $_POST["email"]));
        $password = htmlentities(mysqli_real_escape_string($conn, $_POST["password"]));
       
        $select_user="select * from user where email='$email' AND password='$password' AND identification_code='8' ";
        $query= mysqli_query($conn,$select_user);
        $check_user=mysqli_num_rows($query);
       

        if($check_user==1)
        {
                echo"<script> alert('你的帳號已經被限制登入') </script>";
                echo"<script> window.open('login.php','_self')</script>";
        }else
        {
             $select_user2="select * from user where email='$email' AND password='$password' AND identification_code='1' ";
            $query2= mysqli_query($conn,$select_user2);
            $check_user2=mysqli_num_rows($query2);
            
            if($check_user2==1)
            {
                 $_SESSION['user_email']=$email;
                $get_user="select * from user where email='$email'";
                $run_user=mysqli_query($conn,$get_user);
                $row=mysqli_fetch_array($run_user);
                $_SESSION['uid']=$row['id'];
                $user_id=$row['id'];
                echo $_SESSION['uid'];
                
                echo "<script> window.open('home.php?user_id=$user_id','_self')</script>";
            }else
            {
                   echo"<script> alert('password is not correct') </script>";
                   echo"<script> window.open('login.php','_self')</script>";
            }
        }
    }
?>