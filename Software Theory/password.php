<?php
$sql="SELECT email FROM customer_det WHERE username='".$_SESSION['user_name']."'";
$result=mysql_query($sql);
if(mysql_num_rows($result) == 0)
{
echo 'You have given a wrong username. Please try again.';
}
else
{
while($row=mysql_fetch_array($result))
{
$otp=mt_rand(10000000,99999999);
require "C:/xampp/htdocs/phpmailer/PHPMailerAutoload.php";

$mail = new PHPMailer;                      
$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                               
$mail->Username = 'anushka.bohara2015@vit.ac.in';                 
$mail->Password = 'Animesha@123';                           
$mail->SMTPSecure = 'tls';                            
$mail->Port = 587;                                    

$mail->setFrom('noreply@parketel.com', 'ParKeTel');    
$mail->addAddress($row['email']);                
$mail->isHTML(true);                                  

$mail->Subject = 'ParKeTel: Account Recovery Email';
$mail->Body    = 'Dear user, your OTP is <b>'.$otp.'</b>';

if(!$mail->send()) 
{
    echo 'OTP could not be sent.';
    echo 'Error: ' . $mail->ErrorInfo;
} 
else 
{
    echo 'An OTP has been sent to the registered email address.<br>';
}
echo '<form action="recovery.php" method="post">
<input type="hidden" name="otp" value="'.$otp.'">
<br />One-Time Password: <input type="number" name="recovery" required><br />
<input type="submit" value="Submit"></form>';
echo '<meta http-equiv="refresh" content="120;URL=index.php"';			
}
}
?>