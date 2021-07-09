<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transfer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="Transfer.css" type="text/css">-->
</head>
<style>
    body{
	font-family: sans-serif;
	margin:0;
    line-height: 1.5;
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)) ,url("images/background.jpg");
    height: 100vh;
    -webkit-background-size:cover;
    background-size: cover;
    background-position: center center;
    position: relative;
}

*{
	box-sizing: border-box;
	margin:0;
}

.transfer-popup{
	position: fixed;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	z-index: 1099;
	background-color:rgba(0,0,0,0.6);
	visibility: hidden;
	opacity: 0;
	transition: all 1s ease;
}
.transfer-popup.show{
	visibility:visible;
	opacity: 1;
}
.transfer-popup .box{
    height:250px;
	background-color:#ffffff;
	width: 750px;
	position: absolute;
	left: 50%;
	top:50%;
	transform:translate(-50%,-50%);
	display: flex;
	flex-wrap: wrap;
	opacity: 0;
	margin-left: 50px;
	transition: all 1s ease;

}
.transfer-popup.show .box{
	opacity: 1;
	margin-left: 0;
}
.transfer-popup .box .img-area{
	flex:0 0 50%;
	max-width: 50%;
	position: relative;
	overflow: hidden;
	padding:30px;
	display: flex;
	align-items: center;
	justify-content: center;
}
.transfer-popup .box .img-area h1{
	font-size: 30px;
}
.transfer-popup .box .img-area .img{
	position: absolute;
	left:0;
	top:0;
	width: 100%;
	height: 100%;
	background-size: cover;
	background-position: center;
	animation: zoomInOut 7s linear infinite;
	z-index: -1;

}
@keyframes zoomInOut{
	0%,100%{
		transform: scale(1);
	}
	50%{
		transform: scale(1.1);
	}
}
.transfer-popup .box .form{
	flex:0 0 50%;
	max-width: 50%;
	padding:40px 30px;
}

.transfer-popup .box .form h1{
	color:#000000;
	font-size: 30px;
	margin:0 0 30px;
}

.transfer-popup .box .form .close{
	position: absolute;
	right: 10px;
	top:0px;
	font-size: 30px;
	cursor: pointer;
}

/*responsive*/
@media(max-width: 767px){
	.transfer-popup .box{
		width: calc(100% - 30px);
	}
	.transfer-popup .box .img-area{
		display: none;
	}
	.transfer-popup .box .form{
		flex: 0 0 100%;
        max-width: 100%;
	}
}

    </style>
<body>

  <div class="transfer-popup">
  	 <div class="box">
  	 	 <div class="img-area">
  	 	 	<div class="img">
                </div>
                <?php
                if($_SESSION["status"]=="Success")
                {

                ?>
                <style>
                    .transfer-popup .box .img-area .img{
                    background-image: url('images/success.jpg');
                    }

                    </style>
                <?php
                }?>

                <?php
                if($_SESSION["status"]=="No_Sucess")
                {

                ?>
                <style>
                    .transfer-popup .box .img-area .img{
                    background-image: url('images/unsuccess.jpg');
                    }

                    </style>
                <?php
                }?>

  	 	 </div>
  	 	 <div class="form">
            <div class="close">&times;</div>
                
              
                <?php
                if($_SESSION["status"]=="Success")
                {

                ?>
               <h1>Payment Sucessfully Done</h1>
                <?php
                }?>

                <?php
                if($_SESSION["status"]=="No_Sucess")
                {

                ?>
               <h1>Failed Transaction Process  -- LOW BALANCE</h1>
                <?php
                }?>
  	 	 		
  	 	 	</form>
  	 	 </div>
  	 	 	
  	 	 	
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


  close.addEventListener("click",function(){
    window.location.replace('index.php');
  })


  </script>
</body>
</html>