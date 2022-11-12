<?php
include_once "login_class.php";
class LoginControler extends Login
{
    public $u_name;
    public $pass;

    public function __construct($u_name, $pass)
    {
        $this->u_name = $u_name;
        $this->pass = $pass;
    }

    public function loginUser()
    {
        // if ($this->emptyInput() == false) {
        //     header("location:../includes/login-sistem/login_form.php?error=emptyInput");
        //     exit();
        // }
        return $this->getUser($this->u_name, $this->pass);
    }


    // private function emptyInput()
    // {
    //     $result = "";
    //     if (empty($this->u_name) || empty($this->pass)) {
    //         $result = false;
    //     } else {
    //         $result = true;
    //     }
    //     return $result;
    // }
}
