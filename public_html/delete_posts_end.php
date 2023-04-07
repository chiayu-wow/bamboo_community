<?php

include("includes/connection.php");

$postid=$_GET['post_id'];

$delete_post="DELETE FROM post WHERE id='$postid';";

$query=mysqli_query($conn,$delete_post);

echo"<script>window.open('manage_post.php','_self')</script>";

?>