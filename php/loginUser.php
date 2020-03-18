<?php
include "config.php";

function login($email, $password, $link) {
    //sets variables
    $arr = array(); //an array to put the return for ajax
    $query = "SELECT * FROM users WHERE email = '$email'"; //SQL for SELECT
    $query_role = "SELECT role FROM users WHERE email = '$email'"; //SQL query to check user roles
    $result_email = mysqli_query($link, $query) or die(mysqli_error($link));

     //unset any existing user sessions
    unset($_SESSION['useremail']);
    unset($_SESSION['name']);

    
    if ($row = mysqli_fetch_array($result_email)) {
        $hashedPasscheck = password_verify($password, $row['user_password']); //checking if password matches
        if ($hashedPasscheck == true) {
            $result_role = mysqli_query($link, $query_role) or die(mysqli_error($link));
            $_SESSION['memberID'] = $row['user_id']; // user_id stored in session
            $_SESSION['useremail'] = $row['email']; // email stored in session
            $_SESSION['name'] = $row['f_name']; // name stored in session
            $user = $_SESSION['name'];
            if ($row_role = mysqli_fetch_array($result_role)) { //if there is a result of role
                $role = $row_role['role']; //store the value from the database to the set variable
                array_push($arr, array('return' => "Welcome $user", //put the variable inside the array
                                        'role' => $role));
                return json_encode($arr); //return the variable for ajax to call
            }
        } else if ($hashedPasscheck == false) { //if the password is not verified
            array_push($arr, array('return' => "failed")); //store this message inside the array
            return json_encode($arr); //call it in ajax
        }           
    }

    if ($row = mysqli_fetch_array($result_email) == false) { // if email entered is not retrieved from dataabase
        array_push($arr, array('return' => "Incorrect"));
            return json_encode($arr);
    }
}
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $result = login($email, $password, $link);
    echo $result;


 


?>