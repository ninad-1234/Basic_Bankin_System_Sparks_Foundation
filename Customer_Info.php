
<?php
     $con=mysqli_connect('localhost','root','');
     mysqli_select_db($con,'spark_bank');
    $result=mysqli_query($con,"select * from  customer");
    ?>
 
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> CUSTOMER INFORMATION </title>
        <style>
    body{
        padding: 0;
        margin: 0;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    table
    {
        position: absolute;
        left: 50%;
        top: 40%;
        transform: translate(-50%,-50%);
        border-collapse: collapse;
        width: 800px;
        height: 200px;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2),-1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    tr
    {
        transition: all .2s ease-in;
    }
    th,
    td{
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    #header {
        background-color: #16a085;
        color: #fff;
    }
    h1{
        font-weight: 600;
        text-align: center;
        background-color: #16a085;
        color: #fff;
        padding: 10px 0px;
    }

    tr:hover{
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2),-1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    .GFG {
            background-color: white;
            border: 2px solid black;
            color: green;
            padding: 5px 10px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 10px 30px;
            cursor: pointer;
            text-decoration:none;
        }

</style>
    </head>
<body>
    <h1>CUSTOMER INFORMATION</h1>
    <table >
    <tr id="header">
             <td><b>Customer ID</b></td>
             <td><b>Customer Name</b></td>
             <td><b>Customer Email-ID</b></td>
             <td><b>View Details</b></td>
        </tr>
    <?php 
        while($rows=mysqli_fetch_assoc($result))
        {
         ?>  
        
            <tr>
           
               <td> <?php echo $rows['CUST_ID']; ?></td>
               <td><?php echo $rows['CUST_NAME']; ?></td>
               <td><?php echo $rows['CUST_EMAIL']; ?></td>
               <td> <a href="Customer_Info_Detail.php?CID=<?php echo $rows['CUST_ID']; ?>" class="GFG"> VIEW  </a></td>
                
        </tr>
               
                <?php
        }
    ?>    
    </table>
    <a href="index.php" class="GFG"> BACK  </a>
    
</body>
</html>