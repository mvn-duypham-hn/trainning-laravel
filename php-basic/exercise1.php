<?php

const STR1 = "after";
const STR2 = "before";
const DEFAULT_STR_LENGTH = 50;
const VALID_STRING = "File %s chua chuoi hop le";
const INVALID_STRING = "File %s chua chuoi khong hop le";
const FILE_PATH_1 = "text/file1.txt";
const FILE_PATH_2 = "text/file2.txt";

/**
 * check valid string
 * 
 * @param   string
 * @return  bool
 */
function checkValidString(string $str)
{
    if ($str === ""
        || (strlen($str) >= DEFAULT_STR_LENGTH && strpos($str, STR1) === false)
        || (strpos($str, STR1) === false && strpos($str, STR2) !== false)
    ) {
        return true;
    }

    return false;
}

/**
 * read file from path
 * 
 * @param   string //file path
 * @return  string //contents file
 */
function readFileFromPath(string $filePath)
{
    $contents = "";

    if (!file_exists($filePath)) {
        echo "File not found!!!";
        return $contents;
    }

    $handle = fopen($filePath, "r");
    if (!$handle) {
        echo "Cannot open file!!!";
        return $contents;
    }

    $contents = fread($handle, filesize($filePath));
    if (!$contents) {
        echo "Cannot read file!!!";
        return $contents;
    }
    fclose($handle);

    return $contents;
}

$content1 = readFileFromPath(FILE_PATH_1);
$content2 = readFileFromPath(FILE_PATH_2);

echo checkValidString($content1) ? sprintf(VALID_STRING, FILE_PATH_1) : sprintf(INVALID_STRING, FILE_PATH_1);
echo "\n<br/>\n";
echo checkValidString($content2) ? sprintf(VALID_STRING, FILE_PATH_2) : sprintf(INVALID_STRING, FILE_PATH_2);
