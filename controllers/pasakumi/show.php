<?php

$config = require "./config.php";
require "./Models/Kolektivi.model.php";
$KolektiviModel = new KolektiviModel($config);


$page_title = "pasakumi";
require "./views/pasakumi/show.php";
