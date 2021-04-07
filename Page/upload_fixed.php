<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>upload file</title>
    <link rel="stylesheet" href="">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileUpload" value="">
    <input type="submit" name="up" value="Upload">
</form>

<?php
    $target_dir = "upload/"; 
    $uploadOk = 1;
   

    // Check if image file is a actual image or fake image
    if(isset($_POST["up"])) {
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
        if($check !== false) {
            echo "Đây là một file ảnh- " . $check["mime"] . "<br>";
            $uploadOk = 1;
        } else {
            echo 'Đây không phải là file ảnh!!!'.'<br>';
            $uploadOk = 0;
        }
         // Check if file already exists
        if (file_exists($target_file)) {
          echo 'File này đã tồn tại.'.'<br>';
          $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileUpload"]["size"] > 500000) {
          echo 'File này quá  lớn.'.'<br>';
          $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          echo 'File này không được phép upload.'.'<br>';
          $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo 'Bạn không thể upload.'.'<br>';
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
            echo 'File '. htmlspecialchars( basename( $_FILES["fileUpload"]["name"])). ' đã được upload thành công'.'<br>';
            echo 'Đường dẫn: upload/' . $_FILES['fileUpload']['name'] . '<br>';
            echo 'Loại file: ' . $_FILES['fileUpload']['type'] . '<br>';
            echo 'Dung lượng: ' . ((int)$_FILES['fileUpload']['size'] / 1024) . 'KB';
        } else {
            echo "Đã có lỗi khi upload file.";
        }
        }
    }

?>
</div>

