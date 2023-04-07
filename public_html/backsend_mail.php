<!DOCTYPE html>

<?php
    session_start();
    include("includes/header_backend.php");

?>
<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="home_style2.css">
 

    <title>  </title>
</head>
<style>
</style>
<body>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



require '/storage/ssd2/565/18804565/public_html/PHPMailer-master/src/Exception.php';
require '/storage/ssd2/565/18804565/public_html/PHPMailer-master/src/PHPMailer.php';
require '/storage/ssd2/565/18804565/public_html/PHPMailer-master/src/SMTP.php';

function sendemail()
{
  if(isset($_POST['post']))
  {
     $con = mysqli_connect("localhost", "id17866793_admin", 'P9%X?Fba\wn\F|yY', "id17866793_androiddb");
    
    $contents = htmlentities($_POST['contents']);
    $Title = htmlentities($_POST['title']);
    $get_email="select * from user;";
    $query=mysqli_query($con,$get_email);
    $upload_file=basename($_FILES['upload_file']['name']);
    $tmp_name = $_FILES["upload_file"]["tmp_name"];
    
        while($rows = mysqli_fetch_assoc($query))
    {
           
            $email=$rows['email'];
             if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
   
     
        // valid address
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //服务器配置
                $mail->CharSet ="UTF-8";                     //设定邮件编码
                $mail->SMTPDebug = 0;                        // 调试模式输出
                $mail->isSMTP();                             // 使用SMTP
                $mail->Host = 'smtp.gmail.com';                // SMTP服务器
                $mail->SMTPAuth = true;                      // 允许 SMTP 认证
                $mail->Username = 'yoyowang2000@gmail.com';                // SMTP 用户名  即邮箱的用户名
                $mail->Password = 'A34013862@';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
                $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
                $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

                $mail->setFrom('yoyowang2000@gmail.com', 'bamtech');  //发件人
                $mail->addAddress($email, 'user');  // 收件人
                //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
                $mail->addReplyTo('yoyowang2000@gmail.com', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致
                //$mail->addCC('cc@example.com');                    //抄送
                //$mail->addBCC('bcc@example.com');                    //密送

                //发送附件
                $mail->addAttachment($tmp_name,'documents');         // 添加附件
                // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名

                //Content
                $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
                $mail->Subject = $Title . time();
                $mail->Body    =  $contents;
                $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';

                $mail->send();
                echo '邮件发送成功';
            } catch (Exception $e) {
                echo '邮件发送失败: ', $mail->ErrorInfo;
            }
     
            }
            

    }
    
    
   
  }
}
?>
<div class="row">
        <div class="col-sm-12" id="insert_post">
            <center>
                <form action="backsend_mail.php" method="POST"  enctype="multipart/form-data">
                    <h3><center>email title：</center></h3>
                    <textarea class="form-control" name="title" id="content" placeholder="what's in your mind?" rows="4"  ></textarea><br>
                    <h3><center>email content：</center></h3>
                    <textarea class="form-control" name="contents" id="content" placeholder="what's in your mind?" rows="4"  ></textarea><br>
                    <label id="upload-image-button" class="btn btn-warning">
                        Select files
                        <input type="file" style="display:none;" name="upload_file" >
                    </label>      
                      <button  id="btn-post" name="post" class="btn btn-info">send</button>
                </form>
                  <?php sendemail();?>
            </center>
        </div>
    </div>
</body>
</html>
