<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Task 2</title>
    <style>
        body{
            background-color: palegreen;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body>
<html>
<body>
    <div>

<form action="#" method="POST" style="display: flex;" >
 <input type="text" name="search" placeholder="search employee"><br><br>
<input type ="submit" name="submit">
</form>
</div><br>
<table cellpadding="7px" border="2px groove black" id="t1"  class="table">
    <thead>
    
    <th>Name</th>
    <th>Status</th>
    <th> Action</th>



<?php
if(isset($_POST['submit'])){
include 'conn.php';
$search = $_POST['search'];

$qsearch = "select * from employeemaster where FirstName LIKE '%$search%'";

$result = mysqli_query($conn,$qsearch);

if(mysqli_num_rows($result)){
    while($row =mysqli_fetch_assoc($result)){
       if($row['Status'] == 0){
            $ss = 'Inactive';
       }
       if($row['Status'] == 1){
        $ss = 'Active';
   }
        ?>
        
        <tr>
       
       <td><?php echo $row['FirstName']?></td>
       <td><option name="st" value="<?php echo $row['Status']?>"><?php echo $ss?></option></td>
        <td><a href="update_form.php?id=<?= $row['Id']?>">Update</a></td>
    </tr>
      
      
 

 
    <?php
    }
}
}


?>
</table>

</body>
</html>
