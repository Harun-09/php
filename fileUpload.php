<?php 
$name = null;
if (isset($_POST['btnSubmit'])) {
    $file =$_FILES['myfile'];
    $name=$file['name'];
    $fileTmp = $file['tmp_name'];
    $folder = "uploads/";
    $ext = pathinfo($name, PATHINFO_EXTENSION);

    if (!is_dir($folder)) {
        mkdir($folder,0777, true);
    }

    if (move_uploaded_file($fileTmp, $folder . $name)) {
        echo"File uploaded successfully: " . $name;
    }else{
        echo "Failed to upload file.";
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
    <h2>Upload a File</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="myfile" id="">
        <button type="submit" name="btnSubmit">Upload</button>
    </form>
    <img src="uploads/<?php echo $name ?>" alt="jjjj" srcset="">
</body>
</html>