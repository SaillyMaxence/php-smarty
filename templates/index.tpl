{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=foo}

<!DOCTYPE html>
<html lang="fr">


<body id="page-top" class="index">

{if isset($id)}
	{$emailTxt}
{/if}

<div id="notif" class="" role="alert"></div>

    <!-- About Section -->
    <section>
        <div class="container">
            <div class="row">		
                <form action="message.php" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-10"> 
                        <div class="form-group"> 
						<!-- TexteArea et téléchagement --> 
						{if $select}   
							{while $data=$prep->fetch()}
								<textarea id='message' name='message' class='form-control' placeholder='Message'>{$data['contenu']}</textarea>
								<input type='hidden' name='id' value="{$data['id']}">
							{/while}
						{else}
							<textarea id='message' name='message' class='form-control' placeholder='Message'></textarea>
						{/if}
                        </div>
                    </div>
                    <div class="col-sm-2">
						{if !$select}
							<button type='submit' class='btn btn-success btn-lg'>Envoyer</button>
						{else}
							<button type='submit' class='btn btn-success btn-lg'>Modifier</button>
						{/if}
                    </div>
										<div>
					 <input type="file" name="avatar" id="avatar"/>
					</div>                        
                </form>
            </div>

			<!-- Affichage des messages -->
            <div class="row">
				{while $data=$stmt->fetch()}
						<blockquote><p>{$data['contenu']}</p>
						
						<footer>{$data['date']}</footer>

						<br><a href='index.php?action=modif&id={$data['id']}' class='btn btn-secondary'>Modifier </a>

						<a href='message.php?action=supp&id={$data['id']}' class='btn btn-secondary'>Supprimer </a>

						{if $data['img'] != null}
						<img width="150px" src='./img/{$data['img']}'/>
						{/if}
						{if isset($id)}
							<a href='#' name='vote' data-id='{$data['id']}' class='btn btn-secondary'>vote </a>
						{/if}
						</blockquote>
				{/while}
                </div>
            </div>
        </div>
    </section>

<!-- Include du js et du footer -->

{literal}
<script src='./includes/vote.js'></script>
{/literal}

{include file="footer.tpl"}

