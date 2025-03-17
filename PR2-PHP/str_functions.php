<!-- Topic: PHP String Functions

-> explode(' ', $str) → String ko words ka array banata hai.
-> explode('.', $fileName) → File extension extract karne ke liye use hota hai.
-> str_word_count($str) → String me words ki counting karta hai.
-> strlen($str) → String ki total length return karta hai.
-> strcmp($str1, $str2) → Do strings ko compare karta hai.
-> strrev($str) → String ko reverse karta hai.
-> strtolower($str) → String ko lowercase me convert karta hai.
-> ucwords($str) → Har word ka first letter capital karta hai.
-> str_replace("old", "new", $str) → String me kisi word ko replace karta hai. 

Use Case:
Yeh functions text processing, validation, aur data manipulation ke liye useful hote hain, jaise file type check karna, text formatting, aur authentication.
-->



    <?php
$str = "hello this is ali. ali is intelligent";
$arrayStr = explode(' ', $str);
print_r($arrayStr);
echo "<br>";
$fileName = "img1.rar";
$fileNameArray = explode(".",$fileName);
print_r($fileNameArray);
echo "<br>";
$output = $fileNameArray[count($fileNameArray)-1];
echo $output . "<br>";
if($output == "png" || $output == "jpeg" ){
    echo "valid extension";
}
else{
    echo "invalid extension";
}
echo "<br>";
echo str_word_count($str);
echo "<br>";
echo strlen($str);
echo "<br>";
$stdName = "admin";
$userAuth =  strcmp($stdName,'admin');
if($userAuth == 0)
{
        echo "admin login";
}
else{
       echo "admin not found";
}
echo "<br>";
$empName = "Ali khan";
echo strrev($empName);
echo "<br>";
echo strtolower($empName) . "<br>";
echo ucwords($empName) . "<br>";
echo str_replace("ali" , "hassan" , $str) . "<br>";

?>