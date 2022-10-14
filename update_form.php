<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
       
</head>
<body>
<?php
include 'conn.php';

        $uid = $_GET['id'];
         $q = " select * from employeemaster where Id = $uid ";
       
        $uresult = mysqli_query($conn,$q);
        $urow = mysqli_fetch_assoc($uresult);
        if($urow){
          if($urow['Status'] == 0){
            $ss = 'Inactive';
            $val = 1;
            $p = 'Active';
          
       }
       if($urow['Status'] == 1){
        $ss = 'Active';
        $val = 0;
        $p = 'Inactive';
       
   }
            ?>
    
      
      <div class="container">
      <form action="update.php" method="POST" id="form" name="form"  >
    <input type="hidden" name="uid" value="<?=$urow['Id']?>">
  
       <h4>First Name: <input type="text" value="<?php echo $urow['FirstName'];?>" readonly name="fn" class="form-control"><br><br></h4> 
      
     
      <h4>Status:  <select name="st" id="s1" class="form-control"></h4>
      <option><?php echo $ss?></option>
        <option value="<?php echo $val?>"><?php echo $p?></option>
        

      </select>
        
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Change Status</button>
      
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Alert</h4>
              </div>
              <div class="modal-body">
                <p><?php echo"Are you sure you want to change status to $p?"?></p>
              </div>
              <div class="modal-footer">
                <input type="submit" value="Change Status" class="btn btn-default">
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
    </form>

    <?php } ?>
 
</body>
</html>