<?php
if(isset($_COOKIE['nom'])) //si le coockie nom est existant
{
    $connecte = false; //connecter = false par defaut
    $query="SELECT * FROM user WHERE sid=:sid"; //on va chercher le user avec le SID
    $prep=$pdo->prepare($query);
    $prep->bindValue(':sid', $_COOKIE['nom']);
    $prep->execute();
    $data=$prep->fetch();
    if($data['sid'] == $_COOKIE['nom']) //on vérifie si les 2 SID sont les même
    {
        $connecte = true; //connecter = true
        $email_utilisateur = $data['email'];
		/*
		/**
			ici très importtant!!!!! on récupée l'id du user utiliser plus tard
		/*
		*/
		$id = $data['id'];  
    }
    
    if(isset($email_utilisateur)) //si l'email n'est pas vide
        $emailTxt = "vous êtes bien connecté avec l'email : ".$email_utilisateur; //affiche l'email du user pour vérifier qu'il est bien connecter
}