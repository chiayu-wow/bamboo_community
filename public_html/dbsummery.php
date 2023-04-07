
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
 

    <title> DB summery </title>
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
                 $select_user="select * from user;";
                 $query= mysqli_query($conn,$select_user);
                 $users=mysqli_num_rows($query);
              

                 $select_post="select * from post;";
                 $query2= mysqli_query($conn,$select_post);
                 $post=mysqli_num_rows($query2);
                

                 $select_q="select * from exam_question;";
                 $query3= mysqli_query($conn,$select_q);
                 $Q=mysqli_num_rows($query3);
                 

                 echo"
                 <ul class='list-group'>
                 <li class='list-group-item active' aria-current='true'>Database overview</li>

                 <li class='list-group-item'>The total number of posts in the current database：$post</li>
                 <li class='list-group-item'>The total number of users in the current database：$users</li>
                 <li class='list-group-item'>The total number of questions in the current database：$Q</li>

               

                
               </ul>";
            ?>
        </div>
    </div>
</body>
</html>

