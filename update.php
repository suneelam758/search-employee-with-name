<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include('conn.php');
    

    $userid = $_POST['uid'];
    
     $st = $_POST['st'];

    $upd = "UPDATE `employeemaster` SET `Status`='$st' where Id = {$userid} ";
    $up_data = mysqli_query($conn,$upd);
    
    
   header('location: result.php');

    ?>
</body>
 