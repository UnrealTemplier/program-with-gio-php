<?php

namespace App\Classes;

class Home
{
    public function index(): string
    {
        return <<<HTML
<form method="post" action="/upload" enctype="multipart/form-data">
Receipt: <input type="file" name="receipt"><br/>
<button type="submit">Upload</button>
</form>
HTML;
    }

    public function upload()
    {
        $fileData = $_FILES['receipt'];
        $filePath = STORAGE_PATH . '/' . $fileData['name'];
        move_uploaded_file($fileData['tmp_name'], $filePath);

        print_array(pathinfo($filePath));
    }
}