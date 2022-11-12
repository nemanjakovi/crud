<?php
include_once "login_class.php";
include_once "login_controler_class.php";

if (isset($_POST["login"])) {


    // Validating Username
    $u_name = (string) $_POST['u'];
    $u_name = trim($u_name);
    $findUserAndPass = new Login();
    if (empty($u_name)) {
        $systemErrors['username'] = "Field username is required!";
    }
    // Validating Password
    $pass = (string) $_POST["p"];
    if (empty($pass)) {
        $systemErrors['password'] = "Field password is required!";
    }
    $login = new Login();
    if (empty($systemErrors) && $login->getUser($u_name, $pass) !== true) {

        $systemErrors['username'] = "Wrong email-username or password!";
    }


    if (empty($systemErrors)) {

        $login = new LoginControler($u_name, $pass);
        $login->loginUser();
        header("location:../index.php?login=successful");
    }
}


include_once __DIR__ .  "./../includes/login_form.php";
