<?php
    session_start();
    include("includes/header_backend.php");   
?>

<!DOCTYPE html>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="display_home.css">
    <title>View  post</title>
</head>
<body>
    <div class="row">
        <div class="col-sm-12">
            <center><h2>View posts</h2><br></center>
            <?php single_post_for_back(); ?>
        </div>
    </div>
</body>
</html>