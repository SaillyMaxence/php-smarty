<?php

require 'smarty/libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->debugging = true;
$smarty->cache_lifetime = 120;

include("includes/connexion.inc.php");

include("./includes/verification.inc.php");
$smarty->assign("emailTxt", $emailTxt, true);

if(isset($_GET['id']))
{
    $select = true;
    var_dump($select);
	$query="SELECT * FROM messages where id=:id"; 
	$prep=$pdo->prepare($query);
	$prep->bindValue(':id', $_GET['id']);
    $prep->execute();
    $smarty->assign("prep", $prep, true);
}
else
    $select = false;

$query="SELECT * FROM messages";
$stmt=$pdo->query($query);
$smarty->assign("stmt", $stmt, true);

$smarty->assign("select", $select, true);
$smarty->assign("id", $id, true);
$smarty->display('index.tpl');