<?php
session_start();
?>
<?php
$id= $_GET['CID'];
$_SESSION["id"]=$id;
//echo $_GET['CID'];
?>
<?php
     $con=mysqli_connect('localhost','root','');
     mysqli_select_db($con,'spark_bank');
    $result=mysqli_query($con,"select * from  customer");
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transfer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Transfer.css" type="text/css">
  <style>


.transfer-popup .box .img-area .img{
	position: absolute;
	left:0;
	top:0;
	width: 100%;
	height: 100%;
	background-image: url('images/Customer.png');
	background-size: cover;
	background-position: center;
	animation: zoomInOut 7s linear infinite;
	z-index: -1;

}


    </style>
</head>
<body>

  <div class="transfer-popup">
  	 <div class="box">
  	 	 <div class="img-area">
  	 	 	<div class="img">
  	 	 	</div>
  	 	 	
  	 	 </div>
  	 	 <div class="form">
            <div class="close">&times;</div>
                <h1>Customer Info</h1>
                
                <?php

                $result=mysqli_query($con,"select * from  customer where CUST_ID='$id'");
                $row=mysqli_fetch_array($result);
                ?>

  	 	 	<form method="POST" action="Personal_Transfer.php">
  	 	 		<div class="form-group">
                    
                    <h4> ID :<?php echo "".$row['CUST_ID'] ?> </h4>
                    <h4>  Name: :<?php echo "".$row['CUST_NAME'] ?> </h4>
                    <h4> Balance :<?php echo "".$row['CUST_BALANCE'] ?> Rs </h4>
                    <h4> Email ID :<?php echo "".$row['CUST_EMAIL'] ?> </h4>
                    <input type="submit" class="btn" value="TRANSFER">
                        </div>
  	 	 		
  	 	 		
  	 	 	</form>
  	 	 </div>
  	 </div>
  </div>

<script >



const loginPopup = document.querySelector(".transfer-popup");
  const close = document.querySelector(".close");


  window.addEventListener("load",function(){
 
   showPopup();

  })

  function showPopup(){
       
          loginPopup.classList.add("show");
         
  }


  close.addEventListener("click",function(){
    window.location.replace('Customer_Info.php');
  })




</script>
</body>
</html>