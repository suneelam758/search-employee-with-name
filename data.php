<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table cellspacing="2px" border="20px">
  <th>Name</th>
  <th>Status</th>
  <th>Action</th>
   
<?php
include 'conn.php';
$search = $_POST['search'];

$qsearch = "select * from employeemaster where EmpCode = '$search'";

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
          <td><?php echo $row['FirstName'];?></td>
          <td><?php echo $row['Status'];?></td>
        </tr>
        
            <form>

       FirstName: <input type="text" value="<?php echo $row['FirstName'];?>" readonly><br><br>
      
      Status:  <select name="st" id="s1" >
        <option value="<?php echo $row['Status']?>" readonly><?php echo $ss?></option>
      </select>
      
            </form>

  <a href="update_form.php?id=<?= $row['Id']?>">Update</a>
    <?php
    }
}


?>
</table>

</body>
</html>
