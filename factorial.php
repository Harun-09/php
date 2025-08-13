<?php
$result=1;
$number=null;
if(isset($_GET['btn_submit'])){
    $number = $_GET['number'];
    for($i=1; $i<=$number; $i++){
        $result *=$i;
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
<body>
    <?php
    echo "<h1 class=''>Factorial of $number is $result</h1>";
    ?>
    <form action="factorial.php" method="GET">
        <label for="n">The Number</label><br>
        <input type="text" name="number" id=""><br><br>
        <button type="submit" name="btn_submit">Submit</button>
    </form>
</body>
</html>