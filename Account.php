<?php
class Account
{
    
    public $email;

    public $password;

    public function CheckPassword($str)
    {
        if ((strlen($str) >= 6) 
            && (strlen($str) <= 50)) {
            return true;
        } else {
        return false;
        }
    }

    public function emailcheck($str1,$str2)
    {
        $str3 = substr($str1,0 ,-10);
        if ($str2 === (($str3).'123')) {
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
           && $this->emailcheck($this->email,$this->password) === TRUE
       ) {
            return true;   
       } else {
           return false;
       }
    }
}

