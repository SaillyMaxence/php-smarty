$("[name=vote]").click(function(){ //quand on clique sur un element avec le l'attribut name = vote
	event.preventDefault(); //pour pas actualiser la page 
	
	//on récupére l'élément cliquer
	elementVote = $(this);
	//on récupère le data-id de l'élément cliquer
	id = elementVote.attr('data-id');
	//si l'id de l'élément cliquer n'est pas vide pour si le user n'est pas connecter
	if(id != "") 
	{
		//on fais une requete ajax vers vote.php
		$.ajax({url: "vote.php", 
			type: "GET", //en GET
			data: "id="+id, //en data on envoie l'id du message
		success: function(result){ //si la réponse est renvoyer avec success
			if(result != "deja") //si la réponse n'est pas "deja"
			{
				$("#"+id).html(result); //on affiche la réponse qui est le nombre de vote dans l'élément avec l'id de la zone vote
				elementVote.attr('disabled','true'); //on disabled le button 
			}
			else if(result == "deja") //par contre si c'est deja
			{
				$("#notif").removeClass(); //on supprime la class du message alert qui est caher
				$("#notif").html("vous avez deja voter!"); //on insert un message d'alert
				$("#notif").addClass("alert alert-danger"); //pour l'afficher on lui donne class alert sans le cacher
				$("#notif").fadeOut(8000); //un petit fadeOut pour faire bien
				elementVote.attr('disabled','true'); //on disabled le button 
			}
		}});
	}
	else //si le use n'est pas connecter
		window.location.href = 'login.php'; //on redirige vers la connexion 
});