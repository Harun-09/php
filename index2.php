<?php
$result = null;
if (isset($_GET['btn_submit'])){
    $mark = $_GET['number'];
    if ($mark>=80 && $mark<=100){
        $result = "A+";
    }else if($mark>=70 && $mark<80){
        $result = "A";
    }else if($mark>=60 && $mark<70){
        $result = "A-";
    }else if($mark >= 50 && $mark <60){
        $result = "B";
    }else{
        $result = "Fail";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .red{
        color:red;
    }
    .green{
        color:green;
    }
</style>
<body>
    <?php
    if($result=="Fail"){
        echo "<h1 class = 'red'>Result is $result</h1>";
    }else{
        echo "<h1 class= 'green'>Result is $result</h1>";
    }
    ?>

    <form action="index2.php" method="GET">
        <label for="m">Give the obtain mark</label>
        <input type="text" name="number"><br><br>

        <button type="submit" name="btn_submit">Submit</button>
    </form>
</body>
</html>
