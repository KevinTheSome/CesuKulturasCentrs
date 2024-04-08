<?php

$config = require "./config.php";
require "./Models/Kolektivi.model.php";
$KolektiviModel = new KolektiviModel($config);

$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST["editId"]))
    {
        $editId = $_POST["editId"];
        $title = trim($_POST["name"]);
        $description = trim($_POST["description"]);

        if(strlen($title) > 255 || strlen($title) < 1) {
            $errors[] = "Vārds ir jābūt starp 1-255 simbolus";
        }
    
        if(strlen($description) > 255 || strlen($description) < 1) {
            $errors[] = "Apraksts ir jābūt starp 1-255 simbolus";
        }

        if(empty($errors)){
            $KolektiviModel->editKolektiv($editId , $title , $description);
            header("Location: /pasakumi");
        }
    }

}

$page_title = "pasakumi";
require "./views/pasakumi/edit.php";
