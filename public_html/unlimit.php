<?php
 ///0 means limit 1 mean unlimit
    include("includes/connection.php");
    $uid=$_GET['uid'];
        $update_user_limit="UPDATE user SET identification_code='1' WHERE id='$uid'";
        $query= mysqli_query($conn,$update_user_limit);
        echo"<script>window.open('manage_user.php','_self')</script>";
    

?>