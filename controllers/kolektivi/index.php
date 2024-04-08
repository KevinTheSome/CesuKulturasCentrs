<?php

$config = require "./config.php";
require "./Models/Kolektivi.model.php";
$KolektiviModel = new KolektiviModel($config);


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $errors = [];
    if (isset($_POST["name"]) && isset($_POST["description"])) 
    {
        $name = trim($_POST["name"]);
        $description = trim($_POST["description"]);

        if(strlen($name) > 255 || strlen($name) < 1) {
            $errors[] = "Vārds ir jābūt starp 1-255 simbolus";
        }
    
        if(strlen($description) > 255 || strlen($description) < 1) {
            $errors[] = "Apraksts ir jābūt starp 1-255 simbolus";
        }
    
        if(empty($errors)){
            $KolektiviModel->addKolektivi($name, $description);
            header("Location: /kolektivi");
        }
    }

    if(isset($_POST["deleteId"]))
    {
        $deleteID = $_POST["deleteId"];
        if($deleteID <= 1) {
            $errors[] = "izdzēšanas id jābūt pozitīvam ciparam";
        }

        if(empty($errors)){
            $KolektiviModel->delKolektiv($deleteID);
            header("Location: /kolektivi");
        }
    }
    
}



$page_title = "kolektivi";
require "./views/kolektivi/index.php";
