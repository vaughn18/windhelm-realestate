<?php
include_once "config.php";

function register($email, $con_firstName, $con_lastName, $password, $link)
{
    $sql_email = "SELECT * FROM users WHERE email = '$email'"; //sql to check if the email posted exists in database
    $result_email = mysqli_query($link, $sql_email) or die(mysqli_error($link));

    if (mysqli_num_rows($result_email) > 0) { //checks if email already exists
        return "email taken";
    } else if ($email == '' || $con_firstName == '' || $con_lastName == '') { //checks if forms are empty
        return "forms are empty"; //Below sets these people to become admins straight away
    } else if ($email == 'vaughn_mainacc@yahoo.com' && $con_firstName == 'Vaughn' && $con_lastName == 'Gigataras' || $email == 'gerardbilat@yahoo.com' && $con_firstName == 'Gerard'  && $con_lastName == 'Garcia') {
                //inserts the the values received through POST
                $query = "INSERT INTO users (user_id, email, user_password, f_name, l_name, role) VALUES (NULL, '$email', '$password', '$con_firstName', '$con_lastName', '9')"; //SQL for INSERT
                mysqli_query($link, $query);
                return "registration successful";

    } else {
        //inserts the the values received through POST
        $query = "INSERT INTO users (user_id, email, user_password, f_name, l_name, role) VALUES (NULL, '$email', '$password', '$con_firstName', '$con_lastName', '0')"; //SQL for INSERT
        mysqli_query($link, $query);
        return "registration successful";
    }
}

//Set all variables from the FORM submitted
$email = mysqli_real_escape_string($link, $_POST['email']);
$firstName = mysqli_real_escape_string($link, $_POST['firstName']);
$lastName = mysqli_real_escape_string($link, $_POST['lastName']);
$con_firstName = ucfirst(strtolower($firstName)); // converting the string to all lower case but the first letter to be upper
$con_lastName = ucfirst(strtolower($lastName)); // converting the string to all lower case but the first letter to be upper
$password = mysqli_real_escape_string($link, $_POST['password']);
$password = password_hash($password, PASSWORD_BCRYPT); //Hashing the Password

//echo the function for ajax to call
$result = register($email, $con_firstName, $con_lastName, $password, $link);
echo $result;
