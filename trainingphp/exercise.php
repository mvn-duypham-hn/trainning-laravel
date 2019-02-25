<?php
require ("Supervisor.php");
require ("Boss.php");
require ("UglyBoss.php");
require ("EasyBoss.php");
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
