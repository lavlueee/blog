<?php 

include('connection.php');
   

    if(isset($_GET['view_id'])){
        $id = $_GET['view_id'];
    }

    $sql="select * from registration where id=".$id;
    $result = mysqli_query($con,$sql);
    $viewRow=mysqli_fetch_object($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration | Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
 
</head>
<body>

<div class="container">
  <h2>Registration List &nbsp;<a href="create.php">Create</a>| &nbsp;<a href="index.php">List</a>|&nbsp;<a href="edit.php?edit_id=<?php echo $viewRow->id;?>">edit</a></h2>

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
            <td><?php echo $viewRow->id ? $viewRow->id : ''; ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo  $viewRow->full_name ? $viewRow->full_name : ''; ?></td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td><?php echo $viewRow->email ? $viewRow->email : ''; ?></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><?php echo $viewRow->phone ? $viewRow->phone : ''; ?></td>
        </tr>
        <tr>
            <th>Gender</th>
            <td><?php echo $viewRow->gender ? $viewRow->gender : ''; ?></td>
        </tr>
        
    </thead>
    

        
 </table>
</div>
  
</div>

</body>
</html>
