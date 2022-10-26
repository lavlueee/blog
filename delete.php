<?php 

include('connection.php');
   

    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
    }

    $sql="delete from registration where id=".$id;
    $result = mysqli_query($con,$sql);
    header('Location: index.php');
      die();

?>