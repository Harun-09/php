<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">

    <input type="text" name="number" id=""><br>
    <input type="submit" name="submit" id="">
    </form>
<?php
function btn(){
if(isset($_GET['submit'])){
    $mulN=$_GET['number'];

    $html= "<ul>";
    for($i=1; $i<=10; $i++){
        $res= $mulN*$i;
        $html.="<li>{$mulN}x{$i} = {$res}</li>";
    }
    $html.="</ul>";
    echo $html;
}
}
?> 

<!-- //1.check if a number is positive or negative using if -->

<?php
function posOrNeg(){
$number = 5;  

if ($number > 0) {
    echo "$number is positive";
} elseif ($number < 0) {
    echo "$number is negative";
} else {
    echo "number is zero";
}
}

posOrNeg();
?> <br> <br>




<!-- //2.check if a number is even or odd using ternary -->
<?php
function evenOrOdd(){
$number = 5;
echo ($number % 2 == 0) ? "$number is even" : "$number is odd";
}
evenOrOdd();
?>

<br> <br>
<!-- 
//3.find the largest of two numbers using if -->

<?php
function lNumber(){
$num1=10;
$num2=15;
if($num1>$num2){
    echo "$num1 is greater";
}else{
    echo"$num2 is greater";
}
}
lnumber();

?>
<br> <br>

<!-- //4.check if a number is divisible by both 3 and 5 using if -->

<?php

function divNumber(){
$number=10;
if($number%3==0 && $number%5==0){
    echo "$number is divisible by 3 and 5";
}else{
    echo "$number is not divisible by 3 and 5";
}

}
divNumber();

?>

<br> <br>
<!-- //5.assign defult name using ternary -->

<?php
function dName(){
$name="Kamal";
echo $name ? $name :"";
}
dName();

?>

<br> <br>


<!-- //6.Display "Adult" or "Child" or "Middle aged": -->

<?php
function age(){
$age = "25";
if($age>0 && $age<18){
    echo "You are a child";
}else if($age>18 && $age<35){
    echo "You are middle aged";
}else{
    echo"You are an adult";
}

}
age();
?>

<br> <br>

<!-- //7.Display "is login" -->

<?php


?>




</body>
</html>