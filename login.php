<?php

require 'smarty/libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->debugging = true;
$smarty->cache_lifetime = 120;
include("./includes/connexion.inc.php");
include("./includes/verification.inc.php");

$smarty->display('login.tpl');