
<?php 

include('connection.php');




$error=array();

$fullname='';
$email='';
$phone='';
$hobby='';
$gender='';
$country='';
$password='';




if(isset($_POST['submit'])){
  
 // $fullname = $_POST['fullname'];
  //$email = $_POST['email']

  extract($_POST);



  if(empty($fullname)){

      $error['fullname'] = 'Please type full name';

 }

 if(empty($email)){

      $error['email'] = 'Please type email';

 }

 if(empty($phone)){

      $error['phone'] = 'Please type phone';

 }

 if(empty($hobby)){

      $error['hobby'] = 'Please check hobby';

 }

  if(empty($gender)){

      $error['gender'] = 'Please check gender';

 }

  if(empty($country)){

      $error['country'] = 'Please select country';

 }

 if(empty($password)){

      $error['password'] = 'Please fillup password';

 }


     if(count($error) == 0){


        $hobby = implode(",",$hobby);
        $filed="";
        $filed.="full_name='$fullname'";
        $filed.=",email='$email'";
        $filed.=",phone='$phone'";
        $filed.=",country='$country'";
        $filed.=",password='$password'";
        $filed.=",gender='$gender'";
        $filed.=",hobby='$hobby'";

        $sql1="INSERT INTO registration SET ".$filed;
        $result = mysqli_query($con,$sql1);
        
/*

        $sql2= "INSERT INTO registration (full_name,email,phone,gender,hobby,country,password) VALUES ('$fullname','$email','$phone','$gender','$hobby','$country','$password') ";
       $result = mysqli_query($con,$sql2);

*/
       if($result){

      $error['success'] = "Data Successfully save database.";
      $successmsg= $error['success'];

      }else{
        $error['warning'] = "Data not save. something is woring!!";
      }



    }



}


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
  <h2>Registration Form<a href="index.php">List </a></h2>

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

  <form method="POST" action="index.php" autocomplete="off">
    <div class="form-group">
      <label for="fullname">Full Name:</label>
      <input type="text" class="form-control" autocomplite="off" id="name" value="<?php if(!empty($fullname)){ echo $fullname;}?>" placeholder="Enter Full Name" name="fullname">
      <span style="color:red;"><?php if(!empty($error['fullname'])){ echo $error['fullname'];}?></span>
    </div>
    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" class="form-control" autocomplete="off" id="email" placeholder="Enter E-mail" name="email">
       <span style="color:red;"><?php if(!empty($error['email'])){ echo $error['email'];}?></span>
    </div>

    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
      <span style="color:red;"><?php if(!empty($error['phone'])){echo $error['phone'];}?></span>
    </div>


    <div class="form-group">
       <label for="Hobby">Hobby:</label>
        <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" name="hobby[]" class="form-check-input" value="Traveling">Traveling
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" name="hobby[]" class="form-check-input" value="Cooking">Cooking
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" name="hobby[]" class="form-check-input" value="Drawing" >Drawing
      </label>
    </div>
    <span style="color:red;"><?php if(!empty($error['hobby'])){echo $error['hobby'];}?></span>
   </div>



    <div class="form-group">
      <label>Gender</label>
        <div class="form-check-inline">
          <label class="form-check-label" for="radio1">
            <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male" checked>Male
          </label>
        </div>
        <div class="form-check-inline">
          <label class="form-check-label" for="radio2">
            <input type="radio" class="form-check-input" id="radio2" name="gender" value="Female">Female
          </label>
          
        </div>
        <span style="color:red;"><?php if(!empty($error['gender'])){ echo $error['gender'];}?></span>
    </div>

    <div class="form-group">
      <label for="sel1">Select Country:</label>
      <select class="form-control" id="sel1" name="country">
        <option value="">-Select Country-</option>
        <option value="Japan">Japan</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="India">India</option>
        <option value="Pakistan">Pakistan</option>
      </select>
      <span style="color:red;"><?php if(!empty($error['country'])){ echo $error['country'];}?></span>
    </div>


    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      <span style="color:red;"><?php if(!empty($error['password'])){echo $error['password'];}?></span>
    </div>
   
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>












