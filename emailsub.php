<?php 
$conn=mysqli_connect("localhost","nucatalo_usrNCat","$5}mRLrwi(i%");
mysqli_select_db($conn,'nucatalo_nuCatNewDb');


$email = $_POST['email'];

$inssql="INSERT INTO  subscribe_leads(`subscribed_email_id`) values('$email')";
 $result=mysqli_query($conn, $inssql);
?>