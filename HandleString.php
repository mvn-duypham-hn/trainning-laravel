<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HandleString
 *
 * @author MyPC
 */
class HandleString
{
    //put your code here
    public $check1;
    public $check2;
    public function readFile($file)
    {
        $myfile = fopen($file, "r") or die("Unable to open file!");
        $str = "";
        while(!feof($myfile))
        {
            $str .= fgetc($myfile);
        }
        fclose($file);
        return $str;
    }
    public function checkValidString($str)
    {
        if((empty($str))||((strlen($str)>50)&&(strpos($str, "after") === false))||((!empty($str))&&(strpos($str, "after") === false)&&(!(strpos($str, "before") === false)))){
            return true;
        }else{ 
            return false;
        }
    }
}
$object1 = new HandleString();
$str1 = $object1->readFile("file1.txt");
$str2 = $object1->readFile("file2.txt");
$object1->check1 = $object1->checkValidString($str1);
$object1->check2 = $object1->checkValidString($str2);
echo "bien 1 ".$object1->check1.'<br>';
echo "bien 2 ".$object1->check2;