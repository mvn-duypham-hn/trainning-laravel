<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Supervisor
 *
 * @author MyPC
 */
abstract class Supervisor
{
    //put your code here
    protected $slogan;
    public function setSlogan($slg)
    {
        $this->slogan = $slg;
    }
    public function getSlogan()
    {
        return $this->slogan;
    }
    abstract public function saySloganOutLoud();
}
interface Boss
{
    public function checkValidSlogan();
}
class EasyBoss extends Supervisor implements Boss
{
    use active;
    public function saySloganOutLoud()
    {
        echo $this->getSlogan();
    }

    public function checkValidSlogan()
    {
        if((!(strpos($this->getSlogan(), "after") === false))||(!(strpos($this->getSlogan(), "before") === false))){
            return true;
        }else{
            return false;
        } 
            
    }

}
class UglyBoss extends Supervisor implements Boss
{
    use active;
    public function saySloganOutLoud()
    {
        echo $this->getSlogan();
    }

    public function checkValidSlogan()
    {
        if((!(strpos($this->getSlogan(), "after") === false))&&(!(strpos($this->getSlogan(), "before") === false))){
            return true;
        }else{
            return false;
        }
    }

}

$easyBoss = new EasyBoss();
$uglyBoss = new UglyBoss();

$easyBoss->setSlogan('Do NOT push anything to master branch before reviewed by supervisor(s)');

$uglyBoss->setSlogan('Do NOT push anything to master branch before reviewed by supervisor(s). Only they can do it after check it all!');

$easyBoss->saySloganOutLoud(); 
echo "<br>";
$uglyBoss->saySloganOutLoud(); 

echo "<br>";

var_dump($easyBoss->checkValidSlogan()); // true
echo "<br>";
var_dump($uglyBoss->checkValidSlogan()); // true