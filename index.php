

<?php 

include('connection.php');
   
    $sql="select * from registration";
    $result = mysqli_query($con,$sql);
    $totalRow=mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
 
</head>
<body>

<div class="container">
  <h2>Registration List<a href="create.php">Create</a></h2>

  <?php if(!empty($error['success'])){
    
   echo '<div class="alert alert-success">';
    echo '<strong>Success!$successmsg</strong>';
  echo '</div>';
 }?>

  <?php if(!empty($error['warning'])): ?>
    <div class="alert alert-warning">
    <strong>Warning!<?php echo $error['warning'];?></strong> .
  </div>
  <?php endif;  ?>
<div class="row">
 <table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>full name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Hobby</th>
            <th>country</th>
            <th>Action</th>
        </tr>
        </tr>
    </thead>
    <tbody>

        <?php if($totalRow <= 0): ?>
            <tr>
                <td colspan="7"><center>No result found</center></td>
            </tr>
            <?php else: ?>
         <?php while($row=mysqli_fetch_array($result)): ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['full_name'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['hobby'];?></td>
                <td><?php echo $row['country'];?></td>
                <td>
                    <a class="btn btn-success" href="edit.php?edit_id=<?php echo $row['id']?>">Edit</a>
                    <a class="btn btn-info" href="view.php?view_id=<?php echo $row['id']?>">View</a>
                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="delete.php?delete_id=<?php echo $row['id']?>">Delete</a>
               </td>

              
            </tr>

            <?php endwhile;?>


                <?php endif;?>
        </tbody>
 </table>
</div>
  
</div>

</body>
</html>
