<?php
session_start();
include_once __DIR__ .  "/../database/db.php";
class Login extends Database
{
    public function getUser($u_name, $pass)

    {
        $stmt = $this->connect()->prepare("SELECT * FROM users where username = ? OR user_email = ? ;");
        $stmt->execute([$u_name, $u_name]);
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 0) {
            $this->stmt = null;
            false;
        } else {
            $hash = $user[0]["user_password"];
            $checkPass = password_verify($pass, $hash);
        }
        if ($checkPass == false) {
            $stmt = null;
            false;
        } elseif ($checkPass == true) {

            $_SESSION["user_id"] = $user[0]["user_id"];
            $_SESSION["username"] = $user[0]["username"];
            return true;
        }


        $checkPass = password_verify($pass, $user[0]["user_password"]);
        if ($checkPass !== true) {
            return false;
        }
    }
}



// return $stmt = $this->connect()->prepare("SELECT * FROM users where username = ? OR user_email = ? ;");

        // if (!$stmt->execute([$u_name, $u_name])) {
        //     $stmt = null;
        //     header("location:login_form.php?error=stmtFaild");
        //     exit();
        // }

    
    // $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $checkPass = password_verify($pass, $user[0]["user_password"]);

    // if ($checkPass == false) {
    //     $stmt = null;
    //     header("location:login_form.php?error=wrongPass");
    //     exit();
    // }

    // $_SESSION["user_id"] = $user[0]["user_id"];
    // $_SESSION["username"] = $user[0]["username"];
    // $stmt = null;
