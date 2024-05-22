<?php

include_once '../config/conn.php';

if (!isset($_POST)) {
    header('Location: ../views/404.php');
} else {
    if (isset($_POST['action']) && $_POST['action'] == 'login') {
        login($_POST);
    }
    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        register($_POST);
    }
    if (isset($_POST['action']) && $_POST['action'] == 'updatepass') {
        updatepass($_POST);
    }
    if (isset($_POST['action']) && $_POST['action'] == 'deleteUser') {
        deleteUser($_POST);
    }
    if (isset($_POST['action']) && $_POST['action'] == 'registerCandidate') {
        registerCandidate($_POST);
    }
}

function login($data)
{
    $conn = $GLOBALS['conn'];
    $creds = mysqli_real_escape_string($conn, $data['creds']);
    $password = mysqli_real_escape_string($conn, $data['password']);
    $sql = "SELECT * FROM Users WHERE name =  '$creds' OR email =  '$creds'";
    // $sql = "SELECT * FROM Users WHERE name =  'Anderson' OR email =  '$creds'";
    // $results = $conn->query($sql);
    $results = mysqli_query($conn, $sql);
    if ($results->num_rows <= 0) {
        $_SESSION['message'] = [
            'state' => false,
            'message' => "USERNAME OR PASSWORDS DON'T MATCH",
            'display' => 'block',
            'class' => 'alert-danger', ];
            header('Location:login.php');
    } else {
        if ($results->num_rows > 0) {
            $user = mysqli_fetch_array($results);
            if (!password_verify($password, $user['password'])) {
                $_SESSION['message'] = [
                        'state' => false,
                        'message' => "USERNAME OR PASSWORDS DON'T MATCH",
                        'display' => 'block',
                        'class' => 'alert-danger', ];
                header('Location:login.php');
                exit;
            } else {
                $_SESSION['message'] = [
                            'state' => true,
                            'message' => 'LOGIN SUCCESSFULY',
                            'display' => 'block',
                            'class' => 'alert-success',
                        ];
                unset($user['password']);
                $_SESSION['user'] = $user;
                header('Location:dashboard.php');
            }
        } else {
            $_SESSION['message'] = [
            'state' => false,
            'message' => "USERNAME OR PASSWORDS DON'T MATCH",
            'display' => 'block',
            'class' => 'alert-danger', ];
            header('Location:login.php');
        }
    }
}
function register($data)
{
    $conn = $GLOBALS['conn'];
    $fname = mysqli_real_escape_string($conn, $data['fname']);
    $uname = mysqli_real_escape_string($conn, $data['uname']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $password = mysqli_real_escape_string($conn, $data['password']);
    $accountType = mysqli_real_escape_string($conn, $data['accountType']);
    $phone = mysqli_real_escape_string($conn, $data['phone']);
    $password = password_hash($password, PASSWORD_DEFAULT);
    if (isset($_FILES['image_upload'])) {
        $fileName = $_FILES['image_upload']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $image = "$fileName";
    } 
    if (!isset($data['user_id'])) {
        $sql = "INSERT INTO Users(fname,name,email,password,image,phone,accountType) 
                VALUES('$fname','$uname','$email','$password','$image','$phone','$accountType')";
    }else{
        $user_id = mysqli_real_escape_string($conn, $data['user_id']);
        if ($image != '') {
            $sql = "UPDATE Users SET fname = '$fname',name = '$uname',email = '$email',image = '$image', phone = '$phone',accountType = '$accountType' WHERE user_id = $user_id";
        }else{
            $sql = "UPDATE Users SET fname = '$fname',name = '$uname',email = '$email', phone = '$phone',accountType = '$accountType' WHERE user_id = $user_id";
        }        
    }
    $sql = mysqli_query($conn, $sql);
    if (!$sql) {
        $_SESSION['message'] = [
            'state' => '0',
            'message' => 'USER ALREADY EXIST',
            'display' => 'block',
            'class' => 'alert-danger',
    ];
    //header('Location: /register.php');
    } else {
        if (!isset($data['user_id'])) {
            $_SESSION['message'] = [
                'state' => '1',
                'message' => 'USER CREATED SUCCESSFULY',
                'display' => 'block',
                'class' => 'alert-success',
            ];
        }else{
            $_SESSION['message'] = [
                'state' => '1',
                'message' => 'USER UPDATED SUCCESSFULY',
                'display' => 'block',
                'class' => 'alert-success',
            ];
        }
        if (isset($_FILES['image_upload'])) {
            saveimage($_FILES['image_upload']);
        }
    }
}
function saveimage($file)
{
    $currentDirectory = getcwd();
    $uploadDirectory = '/assets/images/users/';

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg', 'jpg', 'png']; // These will be the only file extensions allowed

    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTmpName = $file['tmp_name'];
    $fileType = $file['type'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $uploadPath = $currentDirectory.$uploadDirectory.basename($fileName);

    if (!in_array($fileExtension, $fileExtensionsAllowed)) {
        $errors[] = 'This file extension is not allowed. Please upload a JPEG or PNG file';
    }

    if ($fileSize > 4000000) {
        $errors[] = 'File exceeds maximum size (4MB)';
    }

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            echo 'The file '.basename($fileName).' has been uploaded';
        } else {
            echo 'An error occurred. Please contact the administrator.';
        }
    } else {
        foreach ($errors as $error) {
            echo $error.'These are the errors'."\n";
        }
    }
}
function updatepass($data)
{
    $conn = $GLOBALS['conn'];
    $username = mysqli_real_escape_string($conn, $data['username']);
    $currentpass = mysqli_real_escape_string($conn, $data['currentpass']);
    $newpass = mysqli_real_escape_string($conn, $data['newpass1']);
    $password = password_hash($newpass, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $sql_run = mysqli_query($conn, $sql);
    if (!$sql_run) {
        $_SESSION['message'] = [
        'state' => '0',
        'message' => 'USER NOT FOUND',
        'display' => 'block',
        'class' => 'alert-danger', ];
    } else {
        if ($sql_run->num_rows > 0) {
            while ($row = $sql_run->fetch_assoc()) {
                if (!password_verify($currentpass, $row['password'])) {
                    $_SESSION['message'] = [
                        'state' => '0',
                        'message' => 'INVALID CURRENT PASSWORD',
                        'display' => 'block',
                        'class' => 'alert-danger', ];
                } else {
                    $sql = "UPDATE users SET password = '$password' WHERE usename='$username'";
                    $_SESSION['message'] = [
                        'state' => '1',
                        'message' => 'PASSWORD CHANGED SUCCESSFULLY',
                        'display' => 'block',
                        'class' => 'alert-success',
                ];
                    $_SESSION['user'] = $row;
                }
            }
        }
    }
}
function getAllUsers(){
    $conn = $GLOBALS['conn'];
    $userId = $_SESSION['user']['user_id'];

    $query = "select * from Users";
    $result = $conn->query($query);
    return $result;

}
function deleteUser($data){
    $conn = $GLOBALS['conn'];
    $userId = $_SESSION['user']['user_id'];

    $query = "Delete from Users WHERE user_id=".$data['user_id'];
    $result = $conn->query($query);
    if (!$result) {
        $_SESSION['message'] = [
            'state' => '0',
            'message' => 'AN ERROR OCCUR WHILE DELETING ACCOUNT',
            'display' => 'block',
            'class' => 'alert-danger',
    ];
    //header('Location: /register.php');
    } else {
        $_SESSION['message'] = [
            'state' => '1',
            'message' => 'USER DELETED SUCCESSFULY',
            'display' => 'block',
            'class' => 'alert-success',
    ];
    }

}

