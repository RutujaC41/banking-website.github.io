
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <style>
    .container
    {
        background-color: rgb(114, 170, 196);
        margin-top:20px;
    }
    input[type=submit]{
        background:rgb(17, 73, 99);
    }
    h1 {
        font-size:100px;
    }
    body
   {
    background-color:rgb(229, 237, 241);;

   }
    </style>
</head>
<body>
<div>
    <h1><I>Transfer Money Faster & safer<I></h1>
</div>
<div class="container">
        
         <form method="post" action="transfer.php" enctype="multipart/form-data">
             <div class="formgrup">
                 <input type="text" name="email" placeholder="Enter email of sender" required>
             </div>
             <div class="formgrup">
                <input type="text" name="name" placeholder="Name of Sender" required>
            </div>
             <div class="formgrup">
                <input type="text" name="email1" placeholder="Email of receiver" required>
            </div>
            <div class="formgrup">
                <input type="text" name="name1" placeholder="Name of receiver" required>
            </div>
            <div class="formgrup">
                <input type="text" name="amount" placeholder="Amount to transfer">
            </div>
            <div class="formgrup">
            <input type="submit" name="submit" value="submit">
            </div>
         </form>
      </div>
    
</body>
</html>

<?php
if(isset($_POST['submit']))
{
    $con=mysqli_connect('localhost','root','','bbs');

if($con==False){
	echo "connection is not done";
}

    $email= $_POST['email'];
    $name=$_post['name'];
    $email1=$_POST['email1']; 
    $name1=$_post['name1'];
    $amount=$_POST['amount'];
    $sql = "SELECT * from customer WHERE 'email'='$email'";
    $run = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($run); 
    

    $sql = "SELECT * FROM customer WHERE 'email'='$email1'";
    $run = mysqli_query($con,$sql);
    $sql2 =mysqli_fetch_array($run);

    if (($amount)<0)
   {
        ?>
        <script>
            alert('Negative Value!! Please enter correct amount');
        </script>
        <?php
    }
     
    else if($amount == 0){
         ?>
        <script>
            alert('Error!!');
        </script>
        <?php

    }
    else {
      
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE `Customer` set `balance`=`balance`-'$amount' where `email`= '$email'";
        mysqli_query($con,$sql);
     
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE `Customer` set `balance`=`balance`+'$amount' where `email`='$email1'";
        mysqli_query($con,$sql);
        
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
       $sql = "INSERT INTO `transaction`(`sender`, `receiver`, `balance`) VALUES ('$email','$email1','$amount')";
        $run=mysqli_query($con,$sql);

       if($run==true){
                   ?>
            <script>
            alert('successful');
    </script>
    <?php
            
       }

        $newbalance= 0;
        $amount =0;
}
}


?>


