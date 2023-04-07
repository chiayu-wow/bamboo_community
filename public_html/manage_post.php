
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
 

    <title> manage post </title>
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
            <center><h2><strong>BamCommunity post summery</strong></h2><br></center>
            <?php
                 $select_posts="select * from post;";
                 $query= mysqli_query($conn,$select_posts);
                 $users=mysqli_num_rows($query);
                 echo"

                 <ul class='list-group'>
                 <li class='list-group-item active' aria-current='true'>ALL posts</li>";
                
                 while ($rows = mysqli_fetch_assoc($query)) {
                     $user_id=$rows['author_id'];
                     $postDate=$rows['post_time'];
                     $postID=$rows['id'];
                     

                     $select_user="select * from user where id='$user_id';";
                    $query2= mysqli_query($conn,$select_user);
                   $rows_for_user=mysqli_fetch_array($query2);
                   $user_name=$rows_for_user['name'];
                    echo"
                    ";
                    
                   echo" 
                  
                            <div class='col-sm-8'>
                                <li class='list-group-item'> Post ID    :    $postID   <br> author ID :    $user_id  <br> author name : $user_name ";
                                echo " <span class='badge badge-primary badge-pill'> <a href='single_for_backend.php?post_id=$postID'> >>> </a> </span>" ;
                                echo"</li></div>
                   ";

                   echo"
                      
                            <div class='col-sm-2'>
                            <a href='delete_posts_end.php?post_id=$postID' style='float:right;'> <button class='btn btn-danger'>delete this post</button></a><br>
                            </div><br><br>
                        ";
                 }
                echo  "</ul>";
            ?>
        </div>
    </div>
</body>
</html>

