
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
 

    <title> manage EXAM records </title>
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
            <center><h2><strong>BamCommunity Comments summery</strong></h2><br></center>
            <?php
                 $select_r="select * from exam_record;";
                 $query= mysqli_query($conn,$select_r);
                 $rec=mysqli_num_rows($query);
                 echo"

                 <ul class='list-group'>
                 <li class='list-group-item active' aria-current='true'>ALL test record</li>";
                
                 while ($rows = mysqli_fetch_assoc($query)) {
                     $r_id=$rows['id'];
                     $date=$rows['date'];
                     $level=$rows['level'];
                     $score=$rows['score'];
                     $author_id=$rows['user_id'];
                     
                    
                     $select_user="select * from user where id='$author_id';";
                     $query2= mysqli_query($conn,$select_user);
                     $rows_for_user=mysqli_fetch_array($query2);
                     $user_name=$rows_for_user['name'];
                         
                    echo"
                    ";
                    
                   echo" 
                  
                            <div class='col-sm-8'>
                                <li class='list-group-item'> Test record ID :$r_id <br> test date : $date <br> test user : $user_name <br> test score : $score <br> level : $level ";
                                echo"</li></div>
                   ";

                   echo"
                      
                            <div class='col-sm-2'>
                            <a href='delete_record_end.php?r_id=$r_id' style='float:right;'> <button class='btn btn-danger'>delete this test record</button></a><br>
                            </div>
                        ";
                     
                        
                 }
                echo  "</ul>";
            ?>
        </div>
    </div>
</body>
</html>

