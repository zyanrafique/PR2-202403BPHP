<!-- Topic:Login System

-> query.php file include ki gayi hai, jisme database queries ya logic ho sakta hai.
-> Form me email aur password ka input field diya gaya hai.
-> Agar query.php me $userEmail ya $userPassword set hai, to unka value form me pre-filled hoga.
-> Errors dikhane ke liye <small> tag me $userEmailErr aur $userPasswordErr use kiya gaya hai.
-> name="userLogin" button ka use login form submit karne ke liye ho raha hai.

Use Case:
-> User authentication ke liye use hota hai.
-> Error handling aur form validation me madad karta hai.
-> Future me database se email/password verify karne ke liye query.php me logic add kiya ja sakta hai. 
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
                <label for="">Email</label>
                <input type="text" name="uEmail" value="<?php echo $userEmail ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo $userEmailErr?></small>
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="uPassword"  value="<?php echo $userPassword ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo $userPasswordErr?></small>
              </div>
             
              <button name="userLogin" class="btn btn-info">Login</button>
            </form>
      </div>
     </body>
</html>