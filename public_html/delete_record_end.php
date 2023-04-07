<?php

 $rid=$_GET['r_id'];

 $conn = mysqli_connect("localhost", "id17866793_admin", 'P9%X?Fba\wn\F|yY', "id17866793_androiddb");


$delete_Q="DELETE FROM exam_record WHERE id='$rid';";

$query=mysqli_query($conn,$delete_Q);

echo"<script>window.open('manage_record.php','_self')</script>";

?>