<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function checkValid($str)
{
    if((empty($str))||((strlen($str)>50)&&(strpos($str, "after") === false))||((!empty($str))&&(strpos($str, "after") === false)&&(!(strpos($str, "before") === false)))){
        return true;
    }else{ 
        return false;
    }
}
function readFile2($file)
{
    $myfile = fopen($file, "r") or die("Unable to open file!");
    $str = "";
    while(!feof($myfile))
    {
        $str .= fgetc($myfile);
    }
    return $str;
}
$str1 = readFile2("file1.txt");
if(checkValid($str1)){
    echo "file1 hop le<br>";
}else{
    echo "file1 khong hop le<br>";
}
$str2 = readFile2("file2.txt");
if(checkValid($str2)){
    echo "file2 hop le";
}else{
    echo "file2 khong hop le";
}