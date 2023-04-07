<?php
include("includes/connection.php");
include("functions/function.php");
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-toggle="collapse" type="button" aria-expanded="false" data-target="#bs-example-navbar-collapse-1">    
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a href="back_home.php" class="navbar-brand">Bamboo Community backend control panel</a>
        </div>
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
            <ul class="navbar-nav nav">

            
                <?php
                    if(isset($_SESSION['uid']))
                    {
                       $user=$_SESSION['uid'];
                   
                       $get_user="select * from users where user_email='$user'";
                       $run_user=mysqli_query($conn,$get_user);
                       $row=mysqli_fetch_array($run_user);
   
                       
                       $user_name=$row['user_name'];
                       $user_reg_date=$row['user_reg_date'];
                       $user_pass=$row['user_password'];
                       $user_image=$row['user_photo'];
   
                       $user_post="select * from posts where user_id='$user_id'";
                       $run_post=mysqli_query($conn,$user_post);
                       $posts=mysqli_num_rows($run_post); 
                    }
                    
                ?>
                <li> <a href="manage_user.php">Ｍanage user</a></li>
                <li> <a href="manage_post.php">Manage posts</a></li>
                <li> <a href="manage_record.php">Manage exam record</a> </li>
                <li> <a href="dbsummery.php">databse summery</a> </li>
                <li> <a href="manage_Q.php">manage questions</a> </li>
                <li> <a href="backsend_mail.php">mass mailing</a> </li>
                <li>  <a href='logout.php'>Logout</a> </li>              
            </ul>
           
        </div>
    </div>
</nav>
