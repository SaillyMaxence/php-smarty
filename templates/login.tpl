{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=foo}

<html>

<body>

<form class="form-inline" method="POST" action="includes/action.php" id="fromulaireLogin">
  <div class="form-group">
    <label for="email">Login:</label>
    <input type="text" name="login" class="form-control" id="login">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="pwd" class="form-control" id="pwd">
  </div>
  <button type="submit" class="btn btn-default">Connexion</button>
  <div id="notif" class="alert alert-danger hide" role="alert">
  </div>
</form>

{literal}
<script>
$("#fromulaireLogin").submit(function(event){ //qaund on appuie sur le button submit 
	$("#notif").removeClass(); //on supprime la class de l'élément alert
	
	if(!$("#login").val()) //si valeur du login est vide
	{
		$("#notif").html("erreur"); //on affiche le message d'erreur
		$("#notif").addClass("alert alert-danger"); //on affiche le alert sans le cacher en changent la class
		return false; //on sort
	}
	
	$("#notif").html("bien remplie "); //si login n'est oas vide
	$("#notif").addClass("alert alert-success"); //on affiche le alert avec success
	$("#notif").fadeOut(500); //un petit fadeOut pour faire bien
	return true //on sort
});
</script>
{/literal}

{include file="footer.tpl"}
