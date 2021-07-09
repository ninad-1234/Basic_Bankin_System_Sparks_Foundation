<?php
session_start();
?>

<?php
     $con=mysqli_connect('localhost','root','');
     mysqli_select_db($con,'spark_bank');
?>


<?php
$sender= $_POST['sender'];
$receiver= $_POST['receiver'];
$amount= $_POST['amount'];
echo $sender ; 
echo $receiver;
echo $amount;
echo "<br>";

$result_sender=mysqli_query($con,"select * from customer where CUST_NAME= '$sender'");

$result_receiver=mysqli_query($con,"select * from customer where CUST_NAME= '$receiver'");

$rows=mysqli_fetch_assoc($result_sender);
$rowr=mysqli_fetch_assoc($result_receiver);

echo $rows['CUST_NAME'];echo "<br>";
echo $rows['CUST_EMAIL']; echo "<br>";

if($rows['CUST_BALANCE']>= $amount)
{
    $updated_amount_sender= $rows['CUST_BALANCE']-$amount;
    $update_query_sender=mysqli_query($con,"UPDATE customer SET CUST_BALANCE='$updated_amount_sender' WHERE CUST_NAME= '$sender'");
    $updated_amount_receiver = $rowr['CUST_BALANCE']+$amount;
    $update_query_receiver=mysqli_query($con,"UPDATE customer SET CUST_BALANCE='$updated_amount_receiver' WHERE CUST_NAME= '$receiver'");
    $_SESSION["status"]="Success";
    date_default_timezone_set("Asia/Calcutta");
    $date= date("Y/m/d");
    $time= date("h:i:sa");
    $History=mysqli_query($con,"INSERT INTO history(SENDER,RECEIVER,AMOUNT,DATE,TIME) values('$sender','$receiver','$amount','$date','$time')");

    header('location:Transfer_Status.php');

}
else
{
    $_SESSION["status"]="No_Sucess";
    
    header('location:Transfer_Status.php');
}
    
?>