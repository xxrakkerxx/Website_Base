<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="Logical.php" method="POST">
Name:<input type="text" id="fname" value="Dennis">    
</form>
</body>
</html>
<?php
$x= 1;
$y = 2;
$z=1;
$year = 2019;
// Leap years are divisible by 400 or by 4 but not 100
if(($year % 400 == 0) || (($year % 100 != 0) && ($year % 4 == 0))){
    echo "<br>";
    echo "$year is a leap year!";
} else{
    echo "<br>";
    echo "$year is not a leap year!";
}



?>