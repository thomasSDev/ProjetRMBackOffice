<div id="listeMessages" class="col-xs-12 col-md-12 col-lg-12 writeZone">
	<div id="historiqueMessages">
		<h2>Historique des messages reçus</h2>
		<p style="text-align: center">Il y a <?= $nombreMessages ?> messages. En voici la liste :</p>

		<table class="table table-hover">
			<thead class="thead-color"> 
		  		<tr>
		  			<td><i class="fa fa-address-card-o" aria-hidden="true"></i> Coordonnées clients</td><td>type demande</td><td>type intervention</td><td class="dateDemande">Date demande</td><td><i class="fa fa-file-text" aria-hidden="true"></i> Lire le message</td><td>Traité : OUI / NON</td>
		  		</tr>
		  	</thead>


		<?php foreach ($listeMessages as $message)
		{
			if($message['demandeTraitee'] == 1)
			  		{
			  			$traite = '<span style=color:green>Message traité</span>';
			  		}
			  		else
			  		{
			  			$traite = '<span style=color:red>Message non traité</span>';
			  		}
		  echo 
		  
		  	'<tr>

		  		<td>', 
				  '<a href="message-',$message['id'],'.html">', $message->client->nom(), ' ',$message->client->prenom(), '<br/>', ' ', $message->client->adresse(), ' ', $message->client->cp(), ' ', $message->client->ville(),  '</a>',
				  '</td>
			  	<td class="typeDemande"> ', 
			  		'<a href="message-',$message['id'],'.html">', $message['typeDemande'], '</a>',
			  	'</td>
			  	<td class="typeDemande"> ', 
			  		'<a href="message-',$message['id'],'.html">', $message['typeIntervention'], '</a>',
			  	'</td>
			  	<td class="dateDemande"> ', 
			  		'<a href="message-',$message['id'],'.html">', $message['dateDemande']->format('d/m/Y à H\hi'), '</a>',
			  	'</td>
			  	<td class="lireMessage"> ', 
			  		'<a href="message-',$message['id'],'.html">', '<button class="btn btn-info"><i class="fa fa-file-text" aria-hidden="true"></i></button>', '</a>',
			  		 
			  	'</td>
			  	<td class="messageTraiteTab">',
			  		$traite,
			  	'</td>',

			'</tr>',  "\n";

		}?>
		</table>
		<div class="col-xs-12 col-md-6 col-lg-2 col-md-push-6 col-lg-push-10 btn-pagination">
		
		<?php for($i=1; $i<=$nbPages; $i++)
		    {
		    	if($i == $currentPage)
		    	{
		    		echo " <button class=\"btn btn-primary\" data-toggle=\"tooltip\" title=\"Pagination\">$i</button>";
		    	}
		    	else
		    	{
		    		echo " <a href=\"messages-liste-".$i.".html\"><button class=\"btn btn-primary\" data-toggle=\"tooltip\" title=\"Pagination\">$i</button></a> ";
		    	}
		      
		    } ?>
		</div>
	</div>

</div>	