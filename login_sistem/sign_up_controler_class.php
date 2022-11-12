<?php

include_once "sign_up_class.php";

class SignupControler extends Signup
{
    private $u_name;
    private $email;
    private $pass;
    private $r_pass;

    public function __construct($u_name, $email, $pass, $r_pass)
    {
        $this->u_name = $u_name;
        $this->email = $email;
        $this->pass = $pass;
        $this->r_pass = $r_pass;
    }


    public function signupUser()
    {
        $this->setUser($this->u_name, $this->pass, $this->email);
    }
}
