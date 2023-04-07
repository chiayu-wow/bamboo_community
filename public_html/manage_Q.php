

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
 

    <title> manage Question </title>
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
            <center><h2><strong>BamCommunity Question management</strong></h2><br></center>
            <?php
                $conn = mysqli_connect("localhost", "id17866793_admin", 'P9%X?Fba\wn\F|yY', "id17866793_androiddb");

                $get_question="select * from exam_question;";
                
                $query=mysqli_query($conn,$get_question);
                
             

                 echo"

                 <ul class='list-group'>
                 <li class='list-group-item active' aria-current='true'>ALL Question</li>";
                
                 while ($rows = mysqli_fetch_assoc($query)) {
                     $c_id=$rows['id'];
                     $Question=$rows['question'];
                     $ans=$rows['correct_answer'];
                     $o1=$rows['option_1'];
                     $o2=$rows['option_2'];
                     $o3=$rows['option_3'];
                     $o4=$rows['option_4'];
                    echo"
                    ";
                    
                   echo" 
                  
                            <div class='col-sm-8'>
                                <li class='list-group-item'> Question ID :$c_id <br> Question : $Question <br>
                                option 1：$o1 <br>
                                option 2：$o2 <br>
                                option 3：$o3 <br>
                                option 4：$o4 <br>
                                answer : $ans ";
                                echo"</li></div>
                   ";

                   echo"
                      
                            <div class='col-sm-2'>
                            <a href='delete_Q.php?c_id=$c_id' style='float:right;'> <button class='btn btn-danger'>delete this question</button></a><br>
                            </div>
                        ";
                     
                        
                 }
                echo  "</ul>";
            ?>
        </div>
    </div>
    
    <div>
        <h1> ADD NEW QUESTION </h1>
        <form method="POST" action="insert_Q.php">
          <div class="form-group">
            <label for="question">題目：</label>
            <input type="input" class="form-control" id="question"  placeholder="Enter question" name="question">
          
          </div>
          <div class="form-group">
            <label for="option1">選項一：</label>
            <input type="option1" class="form-control" id="option1" placeholder="Option1" name="option1">
          </div>
           <div class="form-group">
            <label for="option2">選項二：</label>
            <input type="option3" class="form-control" id="option2" placeholder="Option2" name="option2">
          </div>
        
             <div class="form-group">
            <label for="option3">選項三：</label>
            <input type="option3" class="form-control" id="option3" placeholder="Option3" name="option3">
          </div>
          
           <div class="form-group">
            <label for="option4">選項四：</label>
            <input type="option4" class="form-control" id="option4" placeholder="Option4" name="option4">
          </div>
          
           <div class="form-group">
            <label for="ans">答案：</label>
            <input type="ans" class="form-control" id="ans" placeholder="Ans" name="ans">
          </div>
          
             <div class="form-group">
            <label for="category">category：</label>
            <input type="category" class="form-control" id="category" placeholder="category" name="category">
          </div>
        
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>






