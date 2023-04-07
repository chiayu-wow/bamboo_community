
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
 

    <title> backend home page </title>
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
            <center><h2><strong>BamCommunity usage today</strong></h2><br></center>
            <?php
                 $select_post="select * from post where DATEDIFF( NOW() , post_time )<1;";
                 $query= mysqli_query($conn,$select_post);
                 $today_new_post=mysqli_num_rows($query);
                 
                 $select_r="select * from exam_record where DATEDIFF( NOW() , date )<1;";
                 $query= mysqli_query($conn,$select_post);
                 $today_new_r=mysqli_num_rows($query);
                 
                
               
                 /**$select_comment="select * from comments where  DATEDIFF( NOW() ,date )<1;";
                 $query= mysqli_query($conn,$select_comment);
                 $today_new_comment=mysqli_num_rows($query);*/

                 $select_post="select * from post where DATEDIFF( NOW() , post_time )<30;";
                 $query= mysqli_query($conn,$select_post);
                 $today_new_post_month=mysqli_num_rows($query);
                
                 $select_r="select * from exam_record where DATEDIFF( NOW() , date )<30;";
                 $query= mysqli_query($conn,$select_post);
                 $today_new_r_month=mysqli_num_rows($query);
                
                 /**$select_comment="select * from comments where  DATEDIFF( NOW() ,date )<30;";
                 $query= mysqli_query($conn,$select_comment);
                 $today_new_comment_month=mysqli_num_rows($query);*/

                 $select_pop=" select  id, count( * ) AS count from post GROUP BY id ORDER BY count DESC
                 LIMIT 1";
                 $query= mysqli_query($conn,$select_pop);
                 $row_pop=mysqli_fetch_array($query);
                 $pop=$row_pop['id'];
                 $select_user="select * from user where id='$pop' ";
                 $query2= mysqli_query($conn,$select_user);
                 $row_user=mysqli_fetch_array($query2);
                 $user=$row_user['name'];
                 
                 




                 echo"
                 <ul class='list-group'>
                 <li class='list-group-item active' aria-current='true'>Account activity statistics table (everyday)</li>

                 <li class='list-group-item'>Number of new posts added today： $today_new_post</li>
                 <li class='list-group-item'>The number of answer records added today : $today_new_r</li>

                 <li class='list-group-item active' aria-current='true'>Account activity statistics table (every 30 days)</li>

                 <li class='list-group-item'>Number of new posts in the first 30 days : $today_new_post_month</li>
                 <li class='list-group-item'>The number of user answer records in the first 30 days  :  $today_new_r_month</li>


                 <li class='list-group-item active' aria-current='true'>most active account</li>

                 <li class='list-group-item'>$user</li>
               </ul>



                 ";
            ?>
        </div>
    </div>
</body>
</html>

