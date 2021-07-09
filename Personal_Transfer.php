
<?php
session_start();
?>
<?php
$id= $_SESSION["id"];

?>
<?php
     $con=mysqli_connect('localhost','root','');
     mysqli_select_db($con,'spark_bank');
     
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
	background-image: url('images/transfer.jpg');
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
  	 	 	<a href="Customer_Info_Detail.php?CID=<?php echo $id; ?>"><div class="close">&times;</div></a>
  	 	 	<h1>Transfer</h1>
  	 	 	<form method="POST" action="Operation.php">
  	 	 		<div class="form-group">
                    <select id="sender" name="sender" class="form-control">
                    
                        <?php
                        $result=mysqli_query($con,"select * from customer where CUST_ID =$id");
                            while($rows=mysqli_fetch_assoc($result))
                            {
                                ?>
                                <option value=<?php echo $rows['CUST_NAME']; ?> selected=selected> <?php echo $rows['CUST_NAME']; ?></option>
                                <?php
                            }

                        ?>
                        
                      </select>

                    </div>
                    <div class="form-group">
                        <select id="receiver" name="receiver" class="form-control">
                        <option value="Receiver">Receiver</option>
                        <?php
                        $result=mysqli_query($con,"select * from customer where CUST_ID != $id");
                            while($rows=mysqli_fetch_assoc($result))
                            {
                                ?>
                                <option value=<?php echo $rows['CUST_NAME']; ?>> <?php echo $rows['CUST_NAME']; ?></option>
                                <?php
                            }

                        ?>
                          </select>
    
                        </div>
  	 	 		<div class="form-group">
  	 	 			<input type="number" name="amount" placeholder="Amount in Rs " class="form-control" min="1">
                       
                </div>
  	 	 		
  	 	 		<input type="submit" class="btn" value="Transfer Amount">
  	 	 	</form>
  	 	 </div>
  	 </div>
  </div>

<script>
    const loginPopup = document.querySelector(".transfer-popup");
  const close = document.querySelector(".close");


  window.addEventListener("load",function(){
 
   showPopup();

  })

  function showPopup(){
       
          loginPopup.classList.add("show");
         
  }


 
</script>
</body>
</html>