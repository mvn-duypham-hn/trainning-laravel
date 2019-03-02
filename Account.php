<?php
class Account
{
    
    public $email;

    public $password;

    public function Check()
    {
        if (
            (strcmp(($this->email),"trungnh@gmail.com") === 0) 
            && (strcmp(($this->password),"trungnh123") === 0)) {
            return true;
        } else {
            return false;
        }
    }
}

