<?php

require_once "model/links.model.php";
require_once "model/model.class.php";
require_once "controller/main.controller.php";

$mvc = new MainController();
$mvc -> mainPage();

?>