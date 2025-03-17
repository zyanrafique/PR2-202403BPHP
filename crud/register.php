<!-- Topic:Signup System
 Overview:
✅ query.php include kiya gaya hai (validation/database logic ke liye).
✅ Form me Name, Email, Password, Confirm Password fields hain.
✅ Error messages ke liye small tags use kiye gaye hain.
✅ Register button (registerUser) form submit karta hai.

Use Case:
➡️ User registration system banane ke liye.
➡️ Form validation aur error handling ke liye.
➡️ Database me user insert karne ke liye future me use ho sakta hai.
 
-->


<?php
include('query.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container p-5 mt-5">
            <form action="" method="post">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" value="<?php echo $userName?>" name="uName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo $userNameErr?></small>
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="uEmail" value="<?php echo $userEmail ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo $userEmailErr?></small>
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="uPassword"  value="<?php echo $userPassword ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo $userPasswordErr?></small>
              </div>
              <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="text" name="uConfirmPassword"  value="<?php echo $userConfirmPassword ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo $userConfirmPasswordErr?></small>
              </div>
              <button name="registerUser" class="btn btn-info">Register</button>
            </form>
      </div>
     </body>
</html>