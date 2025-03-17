<!-- Yeh code PHP me variable scope ke mukhtalif types ko demonstrate karta hai. PHP me variable scope teen tareeke ka hota hai:

1)Global Scope(Global variable ko kisi bhi function ke andar use kar sakte hai.)
2)Local Scope(Sirf function ke andar define aur use hota hai.)
3)Static Scope(Function call ke baad bhi apni value yaad rakhta hai.)
 -->
<?php
$x = 10 ;
function printVal(){
    global $x ;
    echo $x ."<br>"  ;
}

printVal();

function hello(){
    $x = 10 ;
    echo "local scope variable " .$x . "<br>";
}
hello();


function staticScope(){
   static $x = 1 ;
    echo $x ;
    $x++ ;
}
staticScope();
echo "<br>";
staticScope();
echo "<br>";
staticScope();
?>