<!-- Topic: Database Connection Using PDO in PHP
Summary:
-> PDO (PHP Data Objects) ka use MySQL database se connect hone ke liye kiya gaya hai.
-> $server me host aur database name (on mysql) define hai.
-> $user aur $password me database credentials diye gaye hain.
-> new PDO($server, $user, $password) se database connection establish hota hai.
-> Agar connection successful hota hai, to script silently execute hoti hai (alert commented out hai).

Use Case:
-> Yeh secure aur flexible database connection establish karne ke liye use hota hai.
-> SQL injection se bachne aur multiple databases support karne me madad karta hai. -->



<?php
$server = "mysql:host=localhost;dbname=adminpanel";
$user = "root";
$password = "" ;
 $pdo =  new PDO($server , $user , $password);
 if($pdo){
    echo "<script>alert('connected with adminpanel')</script>";    
 }

?>