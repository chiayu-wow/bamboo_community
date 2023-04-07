<?php
   
    

   function Limit()
{
    if(isset($_POST['limit']))
    {
       
        $update_user_limit="UPDATE users SET limit_user=0 WHERE userid='$user_id'";
        $query= mysqli_query($conn,$update_user_limit);
        echo fdffd;
    }
   
}
    
    function insertPost()
    {
        if(isset($_POST['sub']))
        {   
             $con = mysqli_connect("localhost", "id17866793_admin", 'P9%X?Fba\wn\F|yY', "id17866793_androiddb");     
             echo 
            $user_id=$_SESSION['uid'];
            $contents = htmlentities($_POST['contents']);
            
            $upload_img=basename($_FILES['upload_image']['name']);
            $tmp_name = $_FILES["upload_image"]["tmp_name"];
            $random_number=rand(1,100);
            if(strlen($contents)>250)
            {
                echo"<script> alert('too much words, should be less than ')</script>";
                echo"<script>windows.open('home.php?uid=$user_id','_self')</script>";
            }else
            {
                if( strlen($contents) >=1 && strlen($upload_img) >= 1)
                {
                    move_uploaded_file($tmp_name, "https://project-ccu-2021.000webhostapp.com/$upload_img.$random_number");

                    $insert="insert into post (author_id,picture,content,post_time) values 
                    ('$user_id','https://project-ccu-2021.000webhostapp.com/$upload_img.$random_number','$contents',NOW())";

                    $run=mysqli_query($con,$insert);
                    if($run)
                    {
                      
                       echo '<br><br>';
                       echo'<div class="row">';
                       echo get_post();
                       echo'</div>';
                       
                    }else
                    {
                        echo"<script> alert('your post failed)</script>";
                        echo"<script>windows.open('home.php','_self')</script>";
                    }
                    exit();
                }else
                        if( $upload_img == '' && $contents == '')
                        {
                            echo"<script> alert('error occured while uploading')</script>";
                            echo"<script>windows.open('home.php','_self')</script>";
                        }else
                        {
                            if($contents == '')
                            {
                                
                                
                                move_uploaded_file($tmp_name, "https://project-ccu-2021.000webhostapp.com/pic/post/$upload_img.$random_number");

                                $insert="insert into post (author_id,content,picture,post_time) values 
                                ('$user_id','no','https://project-ccu-2021.000webhostapp.com/pic/post/$upload_img.$random_number',NOW())";
            
                                $run=mysqli_query($con,$insert);
                                if($run)
                                {
                                    echo"<script> alert('your posts updated a moment ago!')</script>";
                                    echo"<script>windows.open('home.php?uid=$user_id','_self')</script>";

                                    echo '<br><br>';
                                    echo'<div class="row">';
                                    echo get_post();
                                    echo'</div>';
             
            

                                }
                                exit();
                            }else
                            {
                                  $con = mysqli_connect("localhost", "id17866793_admin", 'P9%X?Fba\wn\F|yY', "id17866793_androiddb");     
                            
                                $insert="insert into post (author_id,content,post_time) values 
                                ('$user_id','$contents',NOW())";
            
                                $run=mysqli_query($con,$insert);
                                if($run)
                                {
                                    echo"<script> alert('your posts updated a moment ago!')</script>";
                                    echo"<script>windows.open('home.php?uid=$user_id','_self')</script>";
            
                                    echo '<br><br>';
                                    echo'<div class="row">';
                                    echo get_post();
                                    echo'</div>';
             

                                    
                                }
                                exit();
                            }
                }
            }
        }
    }

    function get_post()
    {
        $con = mysqli_connect("localhost", "id17866793_admin", 'P9%X?Fba\wn\F|yY', "id17866793_androiddb");
        $per_page=4;

        if(isset($_GET['page']))
        {
            $page=$_GET['page'];
           
        }else
        {
            $page=1;
        }

        $start_from=($page-1)*$per_page;

        $get_post="select * from post ORDER by 1 DESC LIMIT $start_from , $per_page";

        $run_post=mysqli_query($con,$get_post);


        while($row_posts=mysqli_fetch_array($run_post))
        {
            $post_id=$row_posts['id'];
            $user_id=$row_posts['author_id'];
            $content= substr($row_posts['content'],0,40);
            $upload_img=$row_posts['picture'];
            $post_date=$row_posts['post_time'];

            $user="select * from user where id='$user_id'";
            $run_user=mysqli_query($con,$user);
            $row_user=mysqli_fetch_array($run_user);

            $user_name=$row_user['name'];
            $user_image=$row_user['photo'];

            ///now display images from databse

            if($content=="NO" && strlen($upload_img)>=1)
            {
                echo"
                <div class='row'>
                <div class='col-sm-3'></div>
                <div id='posts' class='col-sm-6'>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <p>
                                <img src='$user_image' class='img-circle' width='100px' height='100px'>
                            </p>
                        </div>
                        <div class='col-sm-6'>
                            <h4>
                                <a style='text-decoration:none ; cursor:pointer; color:#3897f0;' href='profile_for_others.php?uid=$user_id'> $user_name </a>
                            </h4>

                               <small style='color:balck;'>$user_id Updated a post on <strong>$post_date</strong></small> 
                            </h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-sm-12'>
                            <img id='post-img' src='$upload_img' style='height:350px;'>
                        </div>
                    </div><br>
                    <a href='single.php?post_id=$post_id' style='float:right;'> <button class='btn btn-info'>comment</button></a><br>
                </div>
                <div class='col-sm-3'>
                </div>
             </div><br><br>
                ";
            }
            else if(strlen($content) >=1 && strlen($upload_img)>=1)
            {
                echo"
                <div class='row'>

                <div class='col-sm-3'></div>
                <div id='posts' class='col-sm-6'>
                    <div class='row'>
                        <div  class='col-sm-2'>
                            <p>
                                <img src='$user_image' class='img-circle' width='100px' height='100px'>
                            </p>
                        </div>
                        <div  class='col-sm-6'>
                            <h4>
                                <a style='text-decoration:none ; cursor:pointer; color:#3897f0;' href='profile_for_others.php?uid=$user_id'> $user_name </a>
                            </h4>
                               <small style='color:balck;'>Updated a post on <strong>$post_date</strong></small> 
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-sm-12'>
                            <p>$content</p>
                            <img id='post-img' src='$upload_img' style='height:350px;'>
                        </div>
                    </div><br>
                    <a href='single.php?post_id=$post_id' style='float:right;'> <button class='btn btn-info'>comment</button></a><br>
                </div>
                <div class='col-sm-3'>
                </div>
             </div><br><br>
                ";
            }
            else
            {
                echo"
                <div class='row'>

                <div class='col-sm-3'></div>
                <div id='posts' class='col-sm-6'>
                    <div class='row'>
                        <div  class='col-sm-2'>
                            <p>
                                <img src='$user_image' class='img-circle' width='100px' height='100px'>
                            </p>
                        </div>
                        <div  class='col-sm-6'>
                            <h4>
                                <a style='text-decoration:none ; cursor:pointer; color:#3897f0;' href='profile_for_others.php?uid=$user_id'> $user_name </a>
                            </h4>
                               <small style='color:balck;'>Updated a post on <strong>$post_date</strong></small> 
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-sm-12'>
                            <p>$content</p>
                        </div>
                    </div><br>
                    <a href='single.php?post_id=$post_id' style='float:right;'> <button class='btn btn-info'>comment</button></a><br>
                </div>
                <div class='col-sm-3'>
                </div>
             </div><br><br>
                ";
            }

        }
        include('pagination.php');
    }
    
      function single_post()
    {
        
        if(isset($_GET['post_id']))
        {
            

            $get_id=$_GET['post_id'];
            $get_posts="select * from posts where post_id='$get_id' ";
            $run_post= mysqli_query($conn,$get_posts);

            $row_posts=mysqli_fetch_array($run_post);

            $post_id = $row_posts['post_id'];
            $user_id = $row_posts['user_id'];
            $content =$row_posts['post_content'];
            $upload_img= $row_posts['upload_image'];
            $post_date =$row_posts['post_date'];

            $user="select * from users where user_id='$user_id' AND post='yes' ";
            $run_user=mysqli_query($conn,$user);
            $row_user=mysqli_fetch_array($run_user);

            $user_name=$row_user['user_name'];
            $user_image=$row_user['user_photo'];

            ///user_comment means the user who want to comment
            $user_comment=$_SESSION['user_email'];
            $get_com="select * from users where user_email='$user_comment' ";


           

            $run_com=mysqli_query($conn,$get_com);
            $row_com=mysqli_fetch_array($run_com);

            $user_com_id=$row_com['user_id'];
            $user_com_name=$row_com['user_name'];

        

            if(isset($_GET['post_id']))
            {
                $post_id=$_GET['post_id'];
            }

            $get_posts="select post_id from users where post_id='$post_id ' ";

            $run_user=mysqli_query($conn,$get_posts);

            $post_id=$_GET['post_id'];
            $post=$_GET['post_id'];
            $get_user="select * from  posts where post_id='$post' ";

            $run_user=mysqli_query($conn,$get_user);

            
            $row=mysqli_fetch_array($run_user);

           

            $p_id=$row['post_id'];

            if($p_id!=$post_id)
            {
                echo "<script>alert('error!')</script>";
                echo "<script>window.open('home.php','_self')</script>"; 
            }else
            {
                if($content=="NO" && strlen($upload_img)>=1)
                {
                    echo"
                    <div class='row'>
                    <div class='col-sm-3'></div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class='col-sm-2'>
                                <p>
                                    <img src='$user_image' class='img-circle' width='100px' height='100px'>
                                </p>
                            </div>
                            <div class='col-sm-6'>
                                <h4>
                                    <a style='text-decoration:none ; cursor:pointer; color:#3897f0;' href='profile_for_others.php?uid=$user_id'> $user_name </a>
                                </h4>
    
                                   <small style='color:balck;'>$user_id Updated a post on <strong>$post_date</strong></small> 
                                </h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
    
                        <div class='row'>
                            <div class='col-sm-12'>
                                <img id='post-img' src='$upload_img' style='height:350px;'>
                            </div>
                        </div><br>

                    </div>
                    <div class='col-sm-3'>
                    </div>
                 </div><br><br>
                    ";
                }
                else if(strlen($content) >=1 && strlen($upload_img)>=1)
                {
                    echo"
                    <div class='row'>
    
                    <div class='col-sm-3'></div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div  class='col-sm-2'>
                                <p>
                                    <img src='$user_image' class='img-circle' width='100px' height='100px'>
                                </p>
                            </div>
                            <div  class='col-sm-6'>
                                <h4>
                                    <a style='text-decoration:none ; cursor:pointer; color:#3897f0;' href='profile_for_others.php?uid=$user_id'> $user_name </a>
                                </h4>
                                   <small style='color:balck;'>Updated a post on <strong>$post_date</strong></small> 
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
    
                        <div class='row'>
                            <div class='col-sm-12'>
                                <p>$content</p>
                                <img id='post-img' src='$upload_img' style='height:350px;'>
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
                    <div class='row'>
    
                    <div class='col-sm-3'></div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div  class='col-sm-2'>
                                <p>
                                    <img src='$user_image' class='img-circle' width='100px' height='100px'>
                                </p>
                            </div>
                            <div  class='col-sm-6'>
                                <h4>
                                    <a style='text-decoration:none ; cursor:pointer; color:#3897f0;' href='profile_for_others.php?uid=$user_id'> $user_name </a>
                                </h4>
                                   <small style='color:balck;'>Updated a post on <strong>$post_date</strong></small> 
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
    
                        <div class='row'>
                            <div class='col-sm-12'>
                                <p>$content</p>
                            </div>
                        </div><br>
                       
                    </div>
                    <div class='col-sm-3'>
                    </div>
                 </div><br><br>
                    ";
                }//else condition close


                include("comments.php");
                echo "
                <div class='row'>
                    <div class='col-md-6 col-md-offset-3'>
                                <form action='' method='post' class='form-inline'>
                                    <textarea placeholder='Write your comment here!' id='pb-cmnt-textarea' class='pb-cmnt-textarea form-control' name='comment'></textarea>
                                    <button class='btn btn-info pull-right' name='reply'>Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                ";

                if(isset($_POST['reply']))
                {
                   
                    $comments = htmlentities($_POST['comment']);

                    if($comments == "")
                    {
                        echo "<script>alert('Enter your comment!')</script>";
                        echo "<script>window.open('single.php?post_id=$post_id','_self')</script>"; 
                    }else
                    {
                        ///get current comment  user
                        $user_comment=$_SESSION['user_email'];
                        $get_com="select * from users where user_email='$user_comment' ";
            
            
                       
            
                        $run_com=mysqli_query($conn,$get_com);
                        $row_com=mysqli_fetch_array($run_com);
            
                        $user_com_id=$row_com['user_id'];
                        $user_com_name=$row_com['user_name'];

                       
                        $insert="insert into comments(post_id,user_id,comment,comment_author,date) values('$post_id' , '$user_com_id' , '$comments' , '$user_com_name', NOW() )";

                        $run=mysqli_query($conn,$insert);

                        echo "<script>alert('your comment added')</script>";
                        echo "<script>window.open('single.php?post_id=$post_id','_self')</script>"; 
                    }
                }
            }
        }
    }

    function single_post_for_back()
    {
        
        if(isset($_GET['post_id']))
        {
         $conn = mysqli_connect("localhost", "id17866793_admin", 'P9%X?Fba\wn\F|yY', "id17866793_androiddb");         

            $get_id=$_GET['post_id'];
            $get_posts="select * from post where id='$get_id' ";
            $run_post= mysqli_query($conn,$get_posts);

            $row_posts=mysqli_fetch_array($run_post);

            $post_id = $row_posts['id'];
            $user_id = $row_posts['author_id'];
            $content =$row_posts['content'];
            $upload_img= $row_posts['picture'];
            $post_date =$row_posts['post_time'];

            $user="select * from user where id='$user_id' ";
            $run_user=mysqli_query($conn,$user);
            $row_user=mysqli_fetch_array($run_user);

            $user_name=$row_user['name'];
            $user_image=$row_user['photo'];

         

            if(isset($_GET['post_id']))
            {
                $post_id=$_GET['post_id'];
            }

           

            
            $post=$_GET['post_id'];
            $get_user="select * from  post where id='$post' ";

            $run_user=mysqli_query($conn,$get_user);

            
            $row=mysqli_fetch_array($run_user);

           

            $p_id=$row['id'];

        
            
                if($content=="NO" && strlen($upload_img)>=1)
                {
                    echo"
                    <div class='row'>
                    <div class='col-sm-3'></div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class='col-sm-2'>
                                <p>
                                    <img src='$user_image' class='img-circle' width='100px' height='100px'>
                                </p>
                            </div>
                            <div class='col-sm-6'>
                                <h4>
                                   $user_name 
                                </h4>
    
                                   <small style='color:balck;'>$user_id Updated a post on <strong>$post_date</strong></small> 
                                </h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
    
                        <div class='row'>
                            <div class='col-sm-12'>
                                <img id='post-img' src='$upload_img' style='height:350px;'>
                            </div>
                        </div><br>

                    </div>
                    <div class='col-sm-3'>
                    </div>
                 </div><br><br>
                    ";
                }
                else if(strlen($content) >=1 && strlen($upload_img)>=1)
                {
                    echo"
                    <div class='row'>
    
                    <div class='col-sm-3'></div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div  class='col-sm-2'>
                                <p>
                                    <img src='$user_image' class='img-circle' width='100px' height='100px'>
                                </p>
                            </div>
                            <div  class='col-sm-6'>
                                <h4>
                                     $user_name 
                                </h4>
                                   <small style='color:balck;'>Updated a post on <strong>$post_date</strong></small> 
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
    
                        <div class='row'>
                            <div class='col-sm-12'>
                                <p>$content</p>
                                <img id='post-img' src='$upload_img' style='height:350px;'>
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
                    <div class='row'>
    
                    <div class='col-sm-3'></div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div  class='col-sm-2'>
                                <p>
                                    <img src='$user_image' class='img-circle' width='100px' height='100px'>
                                </p>
                            </div>
                            <div  class='col-sm-6'>
                                <h4>
                                 $user_name 
                                </h4>
                                   <small style='color:balck;'>Updated a post on <strong>$post_date</strong></small> 
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
    
                        <div class='row'>
                            <div class='col-sm-12'>
                                <p>$content</p>
                            </div>
                        </div><br>
                       
                    </div>
                    <div class='col-sm-3'>
                    </div>
                 </div><br><br>
                    ";
                }//else condition close


            
        }
    }
?>




