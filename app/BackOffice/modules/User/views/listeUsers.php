<div id="adminUser" class="col-xs-12 col-md-12 col-lg-12 writeZone">

	<div id="tableUserAdmin">
		<h2>Liste des comptes actuellement disponibles</h2>
		<p style="text-align: center">Il y a actuellement <?= $nombreUsers ?> comptes. En voici la liste :</p>

		<table class="table table-hover">
			<thead class="thead-color">
		  		<tr>
		  			<td>Pseudo</td><td>Mail</td><td>Modifier</td><td>Supprimer</td>
		  		</tr>
		  	</thead>	
		<?php foreach ($listeUsers as $user)
		{
		  echo '<tr><td>', 
			  $user['pseudo'], 
			  '</td><td>', 
			  $user['mail'], 
			  '</td><td>', 
			  '
			  <a class="lien-on-btn" href="user-update-',$user['id'],'.html">
			  <button class="btn btn-primary btnIcone" data-toggle="tooltip" title="Modifier le compte">Modifier le compte</a>
			  </td><td>
			  <button class="btn btn-primary btnIcone" data-toggle="tooltip" title="Supprimer le compte" onclick="myFunction()">Supprimer le compte</button>',


				

				'<script>function myFunction(id){
			    if(confirm("Voulez vous vraiment supprimer ce compte ?")){
			            window.location="user-delete-',$user['id'],'.html"
			    }
			    else{
			            alert("Le compte n\'a pas été supprimé.")
			    }
				}</script></td></tr>', "\n";


		}?>
		</table>
	</div>

	<div>
		<a  type="submit" class="btn btn-primary btn-envoyer" href="/user-save.html">Ajouter un compte administrateur</a>
	</div>
</div>	