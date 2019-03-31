<?php
include("connexion.inc.php");

$login = $_POST['login']; //on récupere le login en POST
$pwd = $_POST['pwd']; //on récupere le mot de passe en POST

$query="SELECT * FROM user WHERE login=:login AND pwd=:pwd"; //ici on va chercher le user avec le mot de passe et login
$prep=$pdo->prepare($query); //une requete prépare pour la sécuriter injectipon sql
$prep->bindValue(':login', $_POST['login']);
$prep->bindValue(':pwd', $_POST['pwd']);
$prep->execute();
$data=$prep->fetch(); //on décrtique la donnée
    if($data['pwd'] !== $_POST['pwd']) //on vérifie si le mot de passe est bon! 
        header("Location:../login.php?message=non connecté"); //s'il est pas bon on return en GET un message non connecter a la page login
    else //si le mot de passe est bon
    {
        $SID = md5($_POST['login']+time()); //on crée un SID en MD5 + time
        setcookie("nom",$SID, time()+60, "/"); //on crée le COOKIE SID de 1 min
        $query="UPDATE user SET sid=:sid WHERE login=:login AND pwd=:pwd"; //on update en BDD le SID
        $prep=$pdo->prepare($query); //on l'envoie avec un prépare
        $prep->bindValue(':sid', $SID);
        $prep->bindValue(':login', $_POST['login']);
        $prep->bindValue(':pwd', $_POST['pwd']);
        $prep->execute();
        header("Location:../index.php"); //on rdirige vers index.php ou l'on pourra voter si on est connecter
    }

