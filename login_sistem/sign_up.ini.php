<?php

include_once "sign_up_class.php";
include_once "sign_up_controler_class.php";





$systemErrors = [];
if (isset($_POST["sign_up"])) {


    $u_name = (string) $_POST['u'];
    $u_name = trim($u_name);
    if (empty($u_name)) {
        $systemErrors['username'] = "Field username is required!";
    }

    $email = (string) $_POST['e'];
    $email = trim($email);
    if (empty($email)) {
        $systemErrors['email'] = "Field email is required!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $systemErrors['email'] = "Invalid email address";
    }

    $checkUser = new Signup();
    if ($checkUser->checkUser($u_name, $email) == false) {
        $systemErrors['username'] = "User already exists";
    }

    $pass = $_POST['p'];
    if (empty($pass)) {
        $systemErrors['password'] = "Field password is required!";
    } else if (strlen($pass) < 7) {
        $systemErrors['password'] = "The password must be more than 7 characters!";
    }
    // RETYPE PASSWORD
    $r_pass = (string) $_POST['rp'];
    if (empty($r_pass)) {
        $systemErrors['r_password'] = "Field retype-password is  required!";
    }
    if ($pass !== $r_pass) {
        $systemErrors['r_password'] = "Passwords do not match!";
    }



    if (empty($systemErrors)) {
        // Instance SignupControler class
        $signup = new SignupControler($u_name, $email, $pass, $r_pass);
        $signup->signupUser();
        header("location:../index.php?signup=successful");
    }
}


include_once __DIR__ .  "./../includes/sign_up_form.php";
