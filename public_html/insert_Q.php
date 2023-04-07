<?php

include("includes/connection.php");

    $ans=$_POST['ans'];
    $Q=$_POST['question'];
    $option1=$_POST['option1'];
    $option2=$_POST['option2'];
    $option3=$_POST['option3'];
    $option4=$_POST['option4'];
    $category=$_POST['category'];
    
    

    $insert_new_Q="insert into exam_question (question, option_1,option_2,option_3,option_4,correct_answer,category) values ($Q,$option1,$option2,$option3,$option4,$ans,$category);";

    $result=mysqli_query($conn,$insert_new_Q);
    
      echo"<script>window.open('manage_Q.php','_self')</script>";

    

?>