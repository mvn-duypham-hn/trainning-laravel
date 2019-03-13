<?php
class Account
{

    public $email;
    public $password;
    public $cfpassword;
    public $id;

    public function ConfirmPassword($str1,$str2)
    {
        if ($str1 === $str2) {
            return true;
        } else {
            return false;
        }
    }

    public function Result()
    {
        if ($this->ConfirmPassword($this->password, $this->cfpassword) === true) {
            return true;
        } else {
            return false;
        }
    }

    public function CheckPassword($str)
    {
        if ((strlen($str) >= 6)
            && (strlen($str) <= 50)) {
            return true;
        } else {
            return false;
        }
    }

    public function is_email($str)
    {
        return (! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }

    public function Check()
    {
        if (($this->is_email($this->email)) === TRUE
            && (strlen($this->email) <= 255)
            && $this->CheckPassword($this->password) === TRUE
        ) {
            return true;
        } else {
            return false;
        }
    }
}
?>