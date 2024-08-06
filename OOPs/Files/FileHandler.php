<?php

class FileHandler
{
    private $filePath;
    private $fileHandle;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function openFile($mode)
    {
        $this->fileHandle = fopen($this->filePath, $mode);
    }

    public function readFile()
    {
        return fread($this->fileHandle, filesize($this->filePath));
    }

    public function writeFile($content)
    {
        fwrite($this->fileHandle, $content);
    }

    public function closeFile()
    {
        fclose($this->fileHandle);
    }
}

// Example
$fileHandler = new FileHandler('example.txt');
$fileHandler->openFile('w');
$fileHandler->writeFile('Hello, World!');
$fileHandler->closeFile();

$fileHandler->openFile('r');
echo $fileHandler->readFile(); // Output: Hello, World!
$fileHandler->closeFile();