<?php
session_start();
// session_destroy();
if (!isset($_SESSION['img'])) {
    $_SESSION['img'] = array();
    
}
?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    
    <body>
        
        <?php
    if (isset($_FILES['image'])) {
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileTmp = $_FILES['image']['tmp_name'];
        $fileType = $_FILES['image']['type'];
        array_push($_SESSION['img'],$_FILES['image']['name']);
    }
    if ($fileType == "image/png")
    {
        move_uploaded_file($fileTmp, "pictures/".$fileName);
        echo "file uploaded successfully.";
    } 
    else {
        echo "file is not png!";
         }

         ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image"> <br> <br>
        <input type="submit" name="submit" value="Upload File">
    </form>
    <?php
    // var_dump($_SESSION);
    foreach ($_SESSION['img'] as $key=>$v) {
        echo "<img src='./pictures/$v' height=200px width =200px>";
    }
    ?>
</body>

</html>