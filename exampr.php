<!-- file upload -->



<?php
$name = null;
$newName = null;

if(isset($_POST['btnSubmit'])){
    $file=$_FILES['myfile'];
    $name =$file['name'];
    $fileTmp=$file['tmp_name'];
    $fileSize=$file['size'];
    $fileType=$file['type'];
    $folder = "uploads/";

    $allowSize=2*1024*1024;

    $allowedMimeType =[
        'image/jpeg',
        'image/png',
        'image/gif',
        'application/pdf',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    ];

    $ext = pathinfo($name,PATHINFO_EXTENSION);
    $newName = uniqid("pic_",true).".".$ext;

    if(!is_dir($folder)){
        mkdir($folder,0777,true);
    }

    if($fileSize>$allowSize){
        die("File is too large");
    }

    if(!in_array($fileType, $allowedMimeType)){
        die("Invalid file type");
    }

    if(move_uploaded_file($fileTmp,$folder.$newName)){
        echo"File uploaded successfully :".$newName;
    }else{
        echo"Failed to upload file.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile" >
        <button type="submit" name="btnSubmit">Upload</button>
    </form>
     <?php if (!empty($newName)) : ?>
    <img src="uploads/<?php echo $newName ?>" width="300">
    <embed src="uploads/<?php echo $newName ?>" type="" width="300" height="500">
<?php endif; ?>
</body>
</html>



<!-- Username Validation with Length + '@' Check -->

<?php
$result = "";

if (isset($_POST["username"])) {
  $name = $_POST["username"];

 
  if (strlen($name) < 4 || strlen($name) > 8) {
    $result = "<span style='color:red;'>Username must be 4-8 characters long.</span>";
  } 
  
  elseif (strpos($name, "@") === false) {
    $result = "<span style='color:red;'>Username must contain '@' sign.</span>";
  } 
  else {
    $result = "<span style='color:green;'>Welcome, $name </span>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Validation</title>
</head>
<body>
  <h2>Login</h2>
  <form method="post">
    <input type="text" name="username" placeholder="Enter username">
    <input type="submit" value="Submit">
  </form>
  <p><?php echo $result; ?></p>
</body>
</html>


<!-- Count Vowels in a String -->


<form method="post">
    Enter a word: <input type="text" name="word" required>
    <input type="submit" value="Count Vowels">
</form>

<?php
if (isset($_POST["word"])) {
    $str = $_POST["word"];

    function countVowels($str) {
        $vowels = ['a','e','i','o','u','A','E','I','O','U'];
        $count = 0;
        for ($i = 0; $i < strlen($str); $i++) {
            if (in_array($str[$i], $vowels)) {
                $count++;
            }
        }
        return $count;
    }

      echo "The word $str has " . countVowels($str) . " vowels.";
}
?>

<!-- form validation -->

<?php
$errors = [];
if (isset($_POST['btn_Name'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $gender = $_POST['gender'];

  if ($name == "") {
    $errors["name"] = "Please fill The name filed";
  } else if (!preg_match("/^[a-zA-Z .]{3,}$/", $name)) {
    $errors["name"] = "Invalid Name";
  }

  if (empty($email)) {
    $errors["email"] = "Please fill The Email filed";
  } elseif (!preg_match("/^[a-zA-Z0-9._]{4,}[@][a-z]{2,}[.][a-zA-Z]{2,}$/", $email)) {
    $errors["email"] = "Invalid Email";
  }




  if (count($errors) == 0) {
    echo "Data is Saved";
 
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
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
  <h1> This is PHP File</h1>
  <form action="" method="POST">
    <label for="n">Give Your Name</label> <br>
    <input type="text" name="name" id="n"> <br>
    <?php
    echo  isset($errors["name"]) ? "<p style='color:red'> {$errors['name']} </p>" : ""
    ?>
    <br>
    <label for="n">Email</label> <br>
    <input type="text" name="email" id="email"> <br>
    <?php
    echo  isset($errors["email"]) ? "<p style='color:red'> {$errors['email']} </p>" : ""
    ?>
    <br>
    <input type="checkbox" name="subject[]" id="n" value="bangla"> Bangla<br>
    <input type="checkbox" name="subject[]" id="n" value="english"> english<br>
    <input type="checkbox" name="subject[]" id="n" value="Math"> Math<br>
    <input type="checkbox" name="subject[]" id="n" value="Arabic"> Arabic<br>
    <br>
    Gender
    <input type="radio" name="gender[]" id="n" value="Male"> Male<br>
    <input type="radio" name="gender[]" id="n" value="Female"> Female<br>


    <input type="submit" name="btn_Name">
  </form>

</body>

</html>

<!-- login form -->

<?php
session_start();

$_name = "hasnat";
$_password ="827ccb0eea8a706c4c34a16891f84e7b";

if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header("location:login.php");
    exit();
}

if(isset($_POST["btn_login"])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $message =[];

    if($_name==$name && $_password==md5($password)){
        $message=["login"=>"Welcome $name"];
        $_SESSION["name"] = $name;
        header("location:form_post.php");  //login er por ja show hobe....
        exit();
    }else{
        $message =["login"=>"incorret username or password"];
        echo $message["login"];
    }
}

if (isset($_SESSION["name"])){
    echo "<h2>Welcome, {$_SESSION['name']}</h2>";
    echo '<a href ="login.php?logout=true">Logout</a>';
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        body{
            display:flex;
            place-content:center;
            height:100vh;
        }
    </style>
</head>
<body>
    <div>
        <h1>Login Form</h1>
        <form action="login.php" method="post">
            <label for="name">Username</label><br>
            <input type="text" name="name" id="name"><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password"><br><br>
            <input type="submit" name="btn_login" id="" value="login">
        </form>
    </div>
</body>
</html>
