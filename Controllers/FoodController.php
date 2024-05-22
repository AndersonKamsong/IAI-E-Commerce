<?php
 include_once '../config/conn.php';
if (!isset($_POST)) {
    header('Location: ../views/404.php');
} 
else {
    if (isset($_POST['action']) && $_POST['action'] == 'createActivity') {
        createActivity($_POST);
    }
    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        register($_POST);
    }
    if (isset($_POST['action']) && $_POST['action'] == 'updatepass') {
        updatepass($_POST);
    }
}


function createActivity($data){
    $conn = $GLOBALS['conn'];
    $userId = $_SESSION['user']['user_id'];
    $titleFrench = $data['titleFrench'];
    $titleEnglish = $data['titleEnglish'];
    $descFrench = $data['descFrench'];
    $descEnglish = $data['descEnglish'];
    $image = "";
    if (isset($_FILES['activity_image_upload'])) {
        $fileName = $_FILES['activity_image_upload']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $image = uniqid().'_'."$fileName";
    }
    $query = "INSERT INTO Posts (titleFrench,titleEnglish,descFrench,descEnglish,user_id,image) 
    VALUES ('$titleFrench','$titleEnglish','$descFrench','$descEnglish',$userId,'$image')";
    $sql = mysqli_query($conn, $query);
    if (!$sql) {
        $_SESSION['message'] = [
            'state' => '0',
            'message' => 'An ERROR OCCUR CREATING THE ACTIVITY',
            'display' => 'block',
            'class' => 'alert-danger',
        ];
    } else {
        saveActivityImage($_FILES['activity_image_upload'], $image);
        $_SESSION['message'] = [
            'state' => '1',
            'message' => 'ACTIVITY CREATED SUCCESSFULY',
            'display' => 'block',
            'class' => 'alert-success',
    ];
    }

}


// To upload the selected image of the activity
function saveActivityImage($file,$name){
    $currentDirectory = getcwd();
    $uploadDirectory = '/assets/images/activities/';

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg', 'jpg', 'png','JPG']; // These will be the only file extensions allowed

    $fileName = $name;
    $fileSize = $file['size'];
    $fileTmpName = $file['tmp_name'];
    $fileType = $file['type'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $uploadPath = $currentDirectory.$uploadDirectory.basename($fileName);
    if (!in_array($fileExtension, $fileExtensionsAllowed)) {
        echo $fileExtension;
        echo '<br>';
        $errors[] = 'This file extension is not allowed. Please upload a JPEG or PNG file';
        die;
    }

    if ($fileSize > 4000000) {
        echo $fileSize;
        echo '<br>';
        $errors[] = 'File exceeds maximum size (4MB)';
        die;
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


// To get all activities(publish and not published activities)
function getAllActivity() {
    $conn = $GLOBALS['conn'];

    $query = "SELECT * FROM Foods";
    $result = $conn->query($query);
    
    // Check if query was successful
    if ($result === false) {
        return []; // Return an empty array in case of a query error
    }

    $activities = [];
    while ($row = $result->fetch_assoc()) {
        $activities[] = $row;
    }
    
    return $activities; // Return the array of activities
}



// Funtion to get an accitivity upon searching using a particular filter
function filterActivity($filter) {
    $conn = $GLOBALS['conn'];
    $query = "SELECT * FROM Foods WHERE nameEnglish LIKE CONCAT('%', ?, '%') OR nameFrench LIKE CONCAT('%', ?, '%') OR prix LIKE CONCAT('%', ?, '%')";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        // Handle error
        return [];
    }
    $stmt->bind_param("sss", $filter, $filter, $filter);
    $stmt->execute();
    $result = $stmt->get_result();
    $activities = [];
    while ($row = $result->fetch_assoc()) {
        $activities[] = $row;
    }
    $stmt->close();
    return $activities;
}


// To delete an activity
function deleteActivity($id){
    $conn = $GLOBALS['conn'];
    $query = "delete from Posts where post_id = $id";
    $result = $conn->query($query);
    return $result; 
}


// To update an existing activity
function updateActivity($postId, $et, $ed, $ft, $fd, $img) {
    // Assuming $conn is your database connection object from included file
    include_once '../config/conn.php';
    $userId = $_SESSION['user']['user_id'];

    // Assuming saveActivityImage() returns the name of the image file
    // Ensure $name is defined before calling saveActivityImage()
    $name = ''; // Initialize $name appropriately
    $image = saveActivityImage($img, $name);

    $query = "UPDATE Posts SET titleFrench=?, titleEnglish=?, descFrench=?, descEnglish=?, status='NOT PUBLISHED', user_id=?, image=? WHERE post_id = ?";

    // Prepare statement
    if ($stmt = $conn->prepare($query)) {
        // Bind parameters
        // "ssssis" means 4 strings, an integer, another string, then an integer
        $stmt->bind_param("ssssisi", $ft, $et, $fd, $ed, $userId, $image, $postId);
        
        // Execute the statement
        if ($stmt->execute()) {
            // If execute() is successful, return true
            $result = true;
        } else {
            // Return an error message if execute() fails
            $result = "Execute failed: " . htmlspecialchars($stmt->error);
        }
        
        // Close the statement
        $stmt->close();
    } else {
        // Return an error message if prepare() fails
        $result = "Prepare failed: " . htmlspecialchars($conn->error);
    }

    return $result;
}


?>