<?php
include_once __DIR__ .  "/../database/db.php";

class Signup extends Database
{
    protected function setUser($u_name, $pass, $email)
    {
        $stmt = $this->connect()->prepare("INSERT INTO users (username, user_email, user_password) VALUES (?, ?, ?);");
        // Hashing passwor
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        if (!$stmt->execute(array($u_name, $email, $passHash))) {
            $stmt = null;
            header("location:signup_form.php?error=stmtFaild");
            exit();
        }
        $stmt = null;
    }

    public function checkUser($u_name, $email)
    {
        $stmt = $this->connect()->prepare("SELECT username FROM users WHERE username = ? OR user_email = ?");
        if (!$stmt->execute(array($u_name, $email))) {
            $stmt = null;
            header("location:signup_form.php?error=stmtFaild");
            exit();
        }
        $resultCheck = "";
        if ($stmt->rowCount() > 0) {
            return   $resultCheck = false;
        } else {
            return  $resultCheck = true;
        }
        $resultCheck;
    }
}
