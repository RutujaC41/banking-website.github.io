<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer History</title>
    <style>
    .tab
   { width:80%;
    height: 50%;
     border: 2;
     margin-top:10px;
     border:black;
   }
   .btn{
    margin: 30px;
    width:210px;
    height:50px;
    font-size:20px;
    margin-left:207px;
   }
   .bt{
    margin: 30px;
    width:210px;
    height:50px;
    font-size:20px;

   }
   .btn:hover{
   background-color:rgb(114, 170, 196);
   }
   .bt:hover{
   background-color:rgb(114, 170, 196);
   }
   body
   {
    background-color:rgb(229, 237, 241);;

   }
   table td{
       border:2px solid black;
       padding: 15px;
   }
   table th{
       border:2px solid black;
       padding: 10px;
       background-color: rgb(114, 170, 196);
   }
   h1{
       margin-left:550px;
       font-size:35px;
   }
   .head{
       border:2px solid black;
   }
</style>
</head>
<body>
<div class="head">
<h1><I>Transfer History<I></h1>
</div>
<div class="tab">
<table  width="80%"  style="margin-top:10px; margin-left:200px; border:2px solid black">
<tr style="background-color:#000; color:#fff;">
<tr>

<th>Sender</th>
<th>Receiver</th>
<th>Amount</th>
<th>Date&Time</th>
</tr>
<?php
$con=mysqli_connect('localhost','root','','bbs');

if($con==False){
	echo "connection is not done";
}
$sql="SELECT * FROM `transaction`";
$run = mysqli_query($con,$sql);
if(mysqli_num_rows($run)<1)
{
    echo "<tr><td>No Records Found</td></tr>";
 }
else
{
    $count=0;
    while($data=mysqli_fetch_assoc($run))
    {    $count++;
    
        ?>
    <tr align="center">
    <td> <?php echo $data['sender']; ?></td>
    <td><?php echo $data['receiver']; ?></td>
    <td><?php echo $data['balance']; ?></td>
    <td><?php echo $data['date_time']; ?></td>
    </tr>
    <?php
    }
}

?>
</table>
</div>
</body>
</html>