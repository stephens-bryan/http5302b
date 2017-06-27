<?php
if (isset($_POST['editId'])) {
    require_once '../includes.php';
    require_once '../database.php';

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
    if($check !== false) {
        $errorImage = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $errorImage = "File is not an image.";
        $uploadOk = 0;
      }
    }
    // Check file size
    if ($_FILES["profilePicture"]["size"] > 500000) {
        $errorImage = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $errorImage = "Sorry, only images are allowed.";
        $uploadOk = 0;
    }
     // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $errorImage = "Sorry, your file was not uploaded.";
     // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
                $errorImage = "The file ". basename( $_FILES["profilePicture"]["name"]). " has been uploaded.";
            } else {
                $errorImage = "Sorry, there was an error uploading your file.";
            }
        }
    // Check password
    if (empty($_POST['Password'])) {
        $errorPassword = "Password is required.";
        if (empty($_POST['confirmPassword'])) {
            $errorConfirmPassword = "Confirm password is required.";
        } else {
            $password = $_POST['Password'];
        }
    }
    if (($_POST['Password'] == $_POST['confirmPassword'])) {
        if (!isset($errorPassword) && !isset($errorConfirmPassword)) {
            require_once '../includes.php';
            require_once '../database.php';;
            $profileObj = new AccountDAO();
            $profilePic = $profileObj->editPicture($db, $profilePic);
            $email = $profileObj->editAccount($db, $email, $password);
            require_once 'account-settings.php';
        } else {
            require_once '../includes.php';
            require_once '../database.php';
            $profileObj = new AccountDAO();
            $account = $profileObj->viewAccount($db, $userName);
        }
        require_once 'account-settings.php';
    }
}
    ?>
