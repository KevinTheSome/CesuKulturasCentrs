<?php

$config = require "./config.php";
require "./Models/Kolektivi.model.php";
$KolektiviModel = new KolektiviModel($config);


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $errors = [];
    if(isset($_POST["deleteId"]))
    {
        $deleteID = $_POST["deleteId"];
        if($deleteID <= 1) {
            $errors[] = "izdzēšanas id jābūt pozitīvam ciparam";
        }

        if(empty($errors)){
            $KolektiviModel->delKolektiv($deleteID);
            header("Location: /pasakumi");
        }
    }
    
}

