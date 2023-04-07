<?php
    session_start();
    include("includes/header_backend.php");
?>

<!DOCTYPE html>


<head>

    <?php
           if(isset($_GET['user_ID']))
           {
               $uid=$_GET['user_ID'];
           }
           
            $get_user="select * from user where id='$uid'";
            $run_user=mysqli_query($conn,$get_user);
            $row=mysqli_fetch_array($run_user);
            $user_name=$row['name'];

    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="home_style2.css">
 

    <title> <?php echo "$user_name"; ?> </title>
</head>
<style>

 #user_img
 {
     float:left;
 }

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

    #button_profile
    {
        position:absolute;
        top:365px;
        Left :130px;
        cursor:pointer;
        transform:translate(-50%,-50%);
    }

    #own_posts
    {
        border:5px solid #e6e6e6;
        padding : 40px 50px;
    }

    #post_img
    {
        height:300px;
        width:100%;
    }

</style>
<body>
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
            <?php   
            
            if(isset($_GET['user_ID']))
            {
                $uid=$_GET['user_ID'];
            }
          
            $get_user="select * from user where id='$uid'";
            $run_user=mysqli_query($conn,$get_user);
            $row=mysqli_fetch_array($run_user);
            $user_image=$row['photo'];
            $user_name=$row['name'];
            $user_email=$row['email'];
                echo "
                <div>
                    <div>
                        <img id='cover_img' class='img-rounded' src='images/cover.jpeg' >
                    </div>
                </div>   
                <div>
                    <img id='profile_img' src='$user_image' alt='profile' class='img-circle' width='180px' height='185px'>
                    
                  

                </div>
                "
                ;
            ?>
             <div class="col-sm-2">
            </div>
        </div>
       
    </div>
    <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-2" style="background-color:#e6e6e6; text-align:center; Right:0.8%; 
            border-radius:5px;">
                <?php
                echo"
                <center><h2><strong>About</strong></h2></center>
                <center><h3>$user_name</h3></center>
                <center><small>$user_email</small></center>";
                ?>
            </div>
            <div class="col-sm-6">

            <?php

                global $conn;

                if(isset($_GET['user_ID']))
                {
                    $user_id=$_GET['user_ID'];
                }
               
                
                $get_posts="select * from post where id=$user_id ORDER by 1 DESC LIMIT 5";
                $run_post=mysqli_query($conn,$get_posts);
                while($row_posts=mysqli_fetch_array($run_post))
                {
                    $post_id=$row_posts['id'];
                    $user_id=$row_posts['author_id'];
                    $content= ($row_posts['content']);
                    $upload_img=$row_posts['picture'];
                    $post_date=$row_posts['post_time'];

                    $user="select * from user where id='$user_id' ";
                    $run_user=mysqli_query($conn,$user);
                    $row_user=mysqli_fetch_array($run_user);

                    $user_name=$row_user['name'];
                    $user_image=$row_user['photo'];
                   
                    
                    ///now display post from databse

                    if($content=="NO" && strlen($upload_img)>=1)
                    {
                        echo"
                        <div id='own_posts'>
                            <div class='row'>
                                <div class='col-sm-3'>
                                </div>
                                    <div id='posts' class='col-sm-6'>

                                        <div class='row'>
                                             <div class='col-sm-6'>
                                                 <p>
                                                      <img src='$user_image' class='img-circle' width='100px' height='100px'>
                                                  </p>
                                             </div>
                                            <div class='col-sm-6'>
                                                <h3>
                                                   $user_name 
                                                </h3>
                                                <h4>
                                                <small style='color:balck;'> Updated a post on <strong>$post_date</strong></small> 
                                                </h4>
                                            </div>
                                        </div>
        
                                        <div class='row'>
                                            <div class='col-sm-12'>
                                                <img id='post-img' src='$upload_img' style='width:200px;'>
                                            </div>
                                        </div><br>
                                    
                                     </div>
                                    <div class='col-sm-3'>
                                    </div>
                                </div> 
                        </div><br><br>
                        ";
                    }
                    else if(strlen($content) >=1 && strlen($upload_img)>=1)
                    {
                        echo"
                        <div class='row' id='own_posts'>
        
                        <div class='col-sm-3'></div>
                        <div id='posts' class='col-sm-6'>
                            <div class='row'>
                                <div  class='col-sm-6'>
                                    <p>
                                        <img  id='user_img' src='$user_image' class='img-circle' width='100px' height='100px'>
                                    </p>
                                </div>
                                <div  class='col-sm-6'>
                                    <h3>
                                    $user_name 
                                    </h3>
                                    <h4>
                                    <small style='color:balck;'> Updated a post on <strong>$post_date</strong></small> 
                                    </h4>
                                </div>
                             
                            </div>
        
                            <div class='row'>
                                <div class='col-sm-12'>
                                   <h3> <p>$content</p></h3>
                                    <img id='post-img' src='$upload_img' style='width:200px;'>
                                </div>
                            </div><br>
                    
                        </div>
                        <div class='col-sm-3'>
                        </div>
                     </div><br><br>
                        ";
                    }
                    else
                    {
                        echo"
                        <div class='row' id='own_posts'>
        
                            <div class='col-sm-3'>
                            </div>
                            <div id='posts' class='col-sm-6'>

                                <div class='row'>
                                    <div  class='col-sm-6'>
                                        <p>
                                            <img src='$user_image' class='img-circle' width='100px' height='100px'>
                                        </p>
                                    </div>
                                    <div  class='col-sm-6'>
                                        <h3>
                                           $user_name 
                                        </h3>
                                        <h4>
                                            <small style='color:balck;'> Updated a post on <strong>$post_date</strong></small> 
                                        </h4>
                                    </div> 
                                </div> 

                                 <div class='row'>
                                     <div class='col0sm-2'
                                     </div>
                                    <div class='col-sm-6'>
                                        <h3><p>$content</p></h3>
                                     </div>
                                    <div class='col-sm-4'>
                                   </div>
                                 </div><br>
                            </div>
                        <div class='col-sm-3'>
                        </div>
                    
                     <div class='row'>";
                     
                     global $conn;
                     
                     if(isset($_GET['uid']))
                     {
                         $user_id=$_GET['uid'];
                     }

                     $get_posts="select user_email from users where user_id='$user_id' ";
                     $run_user=mysqli_query($conn,$get_posts);
                     $row=mysqli_fetch_array($run_user);

                    
                     $user_email=$row['user_email'];

                     $user=$_SESSION['user_email'];
                     $get_user="select * from users where user_email='$user' ";
                     $run_user=mysqli_query($conn,$get_user);
                     $row=mysqli_fetch_array($run_user);

                     $user_id=$row['user_id'];
                     $u_email=$row['user_email'];

                     

                     if($u_email!=$user_email)
                     {
                         if(isset($_GET['user_ID']))
                         {
                    
                         }else
                         {
                            echo"<script>window.open('profile.php?uid=$user_id','_self')</script>";
                         }
                     }
                    echo "
                    </div>
                    </div>
                </div><br><br>
                        ";

                    }
                }
            ?>
            </div>
</div>
</body>
</html>

