<?php
define('DACCESS', 1);
require_once('framework.php');
$app = new Application();
$app->route();
$app->dispatch();
$app->render();
?>