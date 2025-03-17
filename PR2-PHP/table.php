<!-- Topic: PHP Multiplication Table Generator

-> User ek number enter karta hai form me.
-> PHP POST method ka use hota hai value retrieve karne ke liye.
-> for loop ka use kiya gaya hai 1 se 10 tak multiplication table generate karne ke liye.
-> Bootstrap table ka use kiya gaya hai output ko stylish aur readable banane ke liye.
  Use Case:
Yeh script math learning apps, student portals, aur educational websites ke liye useful hai. -->

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
      <div class="container">
        <form action="" method="post">
            <input type="text" name="tableNumber"  placeholder="Enter Number">
            <button name="sub">Sumbit</button>            
        </form>
      </div>
      <?php
      if(isset($_POST['sub'])){
        $inpVal = $_POST['tableNumber'];
        ?>
            <table class="table table-striped">
                <thead>
                  
                <tbody>
                    <?php
                    for($i = 1 ; $i<=10 ; $i++){
                    ?>
                    <tr>
                        <td><?php echo $inpVal?></td>
                        <td><?php echo 'x'?></td>
                        <td><?php echo $i?></td>
                        <td><?php echo '='?></td>
                        <td><?php echo $i*$inpVal?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    
                </tbody>
            </table>    
        <?php
      }
      ?>
    </body>
</html>
