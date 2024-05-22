<?php

include_once '../config/conn.php';

if (!isset($_POST)) {
    header('Location: ../views/404.php');
} else {
    if ($_POST['action'] == 'registerOrder') {
        registerOrder($_POST);
    }
}
function registerOrder($data)
{
    $conn = $GLOBALS['conn'];
    $name = mysqli_real_escape_string($conn, $data['name']);
    $class = mysqli_real_escape_string($conn, $data['class']);
    $No_plate = mysqli_real_escape_string($conn, $data['No_plate']);
    // $food_id = mysqli_real_escape_string($conn, $data['food_id']);
    $food_id = 1;
   
        // $sql = "INSERT INTO Order(course,name,sname,email,address,NIC,phone,dob,gender,level,purpose) 
        //             VALUES('$course','$name','$sname','$email','$address','$NIC','$phone','$dob','$gender','$level','$purpose')";
        $sql = "INSERT INTO Orders (food_id, name, class, number)
        VALUES
          ($food_id, '$name', '$class', $No_plate)";
        $sql = mysqli_query($conn, $sql);
        if (!$sql) {
            $_SESSION['messageRegister'] = [
                'state' => '0',
                'message' => 'AN ERROR OCCUR DURING REGISTRATION PLEASE CONTACT ADMIN',
                'display' => 'block',
                'class' => 'alert-danger',
        ];
        } else {
            $_SESSION['messageRegister'] = [
                'state' => '1',
                'message' => 'YOU HAVE SUCCESSFULY REGISTED',
                'display' => 'block',
                'class' => 'alert-success',
            ];
        }
        // unset($_SESSION['CandidateInfo']);
        // unset($_SESSION['messageRegister']);
        // unset($_SESSION['payment']);
        // unset($_SESSION['responseResult']);
        header('Location: /index.php');
}
function getAllOrder(){
    $conn = $GLOBALS['conn'];
    $query = "select * from Orders";
    $result = $conn->query($query);
    return $result;

}

