<?php

 $cid=$_GET['c_id'];

 $conn = mysqli_connect("localhost", "id17866793_admin", 'P9%X?Fba\wn\F|yY', "id17866793_androiddb");


$delete_Q="DELETE FROM exam_question WHERE id='$cid';";

$query=mysqli_query($conn,$delete_Q);

echo"<script>window.open('manage_Q.php','_self')</script>";

?>