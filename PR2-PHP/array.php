<!-- Array ek data structure hai jo multiple values ko ek single variable me store karne ke liye use hota hai. Iska use tab hota hai jab humein ek hi type ke multiple data ko manage karna ho. PHP me arrays teen tareeke ke hote hain:

1. Indexed Array -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array</title>
</head>
<body>
    


<?php         
$stdNames = ["ali" ,"aqsa" , "hamza" , "sana"] ;
// var_dump($stdNames);
// echo "<br>";
// print_r($stdNames);
// echo $stdNames;
?>
<ul>
    <?php
    for($i=0;$i<=3;$i++){
           ?>
           <li><?php echo $stdNames[$i]?></li>
           <?php
            }
            ?>
</ul>

</body>
</html>