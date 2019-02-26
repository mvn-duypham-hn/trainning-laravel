<?php
require_once ("Active.php");

class EasyBoss extends Supervisor implements Boss
{

    protected $slogan;
    use Active;

    public function getSlogan()
    {
        return $this->slogan;
    }

    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;
    }

    public function checkValidSlogan()
    {
        $slogan = $this->slogan;
        $a = "after";
        $b = "before";
        if (strpos($slogan, $a) 
            || strpos($slogan, $b)
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function saySloganOutLoud()
    {
        echo $this->getSlogan();
    }
}
