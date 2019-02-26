<?php
class HandleString 
{
    public $check1;
    public $check2;

    function readFile($fp)
    {
        
        $file = @fopen($fp, "r");
        if (!$file) {
            echo "Mở file không thành công";
        } else {
            while (!feof($file)) {
                $file1 = fread($file, filesize($fp));
            }
        }
        fclose($file);
        return $file1;
    }

    function checkValidString($string)
    {
        $a = "after";
        $b = "before";
        if (is_null($string) ||
            (strlen($string) >= 50 && !strpos($string, $a)) ||
            (strlen($string) >= 50 && !strpos($string, $a) && strpos($string, $b))
        ) {
            return true;
        } else {
            return false;
        }
    }
}

$object1 = new HandleString(); 
$object1->check1 = $object1->checkValidString($object->readFile("file1.txt"));
$object1->check2 = $object1->checkValidString($object->readFile("file2.txt"));

if (true === $object1->check1) {
    echo "chuoi file1.txt hop le"; 
} else {
    echo "chuoi file1.txt khong hop le";
}
echo "<br>";
if (true === $object1->check2) {
    echo "chuoi file2.txt hop le"; 
} else {
    echo "chuoi file2.txt khong hop le";
}