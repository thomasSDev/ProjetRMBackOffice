<div id="admin" class="col-xs-12 col-md-12 col-lg-12 writeZone">
	<div id="tableClient" class="col-xs-12 col-md-12 col-lg-12">
		
		<h2 class="col-xs-6 col-md-6 col-lg-6"><?= $title ?></h2>
		<form class="col-xs-6 col-md-6 col-lg-2 col-lg-push-4">
			<input id="recherche" type="search" placeholder="Recherche par nom..." name="recherche" autocomplete="off" onkeydown="validSearchHandler(event)"/>
		</form>
    		

		<br/><br/><p style="text-align: center">Il y a actuellement <?= $nombreClient ?> clients. En voici la liste triée par nom:</p>
		 
		<?php if($getRecherche)
		{ ?>
			<table class="table table-hover">
				<thead class="thead-color"> 
			  		<tr>
			  			<td>Nom</td><td>Prénom</td><td>Adresse</td><td>Téléphone</td><td>Mail</td>
			  		</tr>
			  	</thead>
				<?php foreach ($arrayClients as $arrClient)
				{
					

				  echo 
				  
				  	'<tr>

				  		<td>', 
						  '<a href="client-',$arrClient['id'],'.html">', $arrClient['nom'], '</a>',
						  '</td>
					  	<td>', 
					  		'<a href="client-',$arrClient['id'],'.html">', $arrClient['prenom'], '</a>', 
					  	'</td>
					  	<td>', 
					  		'<a href="client-',$arrClient['id'],'.html">', $arrClient['adresse'] . ' ' . $arrClient['cp'] . ' ' . $arrClient['ville'], '</a>', 
					  	'</td>
					  	<td>',
					  		'<a href="client-',$arrClient['id'],'.html">', $arrClient['tel'], '</a>', 
					  	'</td>
					  	<td>',
					  		'<a href="client-',$arrClient['id'],'.html">', $arrClient['mail'], '</a>', 
					  	'</td>', 	

					'</tr>',  "\n";


				}?>
			
			</table>
		<?php }
		else
		{ ?>
			<table class="table table-hover">
				<thead class="thead-color"> 
			  		<tr>
			  			<td>Nom</td><td>Prénom</td><td>Adresse</td><td>Téléphone</td><td>Mail</td>
			  		</tr>
			  	</thead>
				<?php foreach ($listeClient as $client)
				{
					

				  echo 
				  
				  	'<tr>

				  		<td>', 
						  '<a href="client-',$client['id'],'.html">', $client['nom'], '</a>',
						  '</td>
					  	<td>', 
					  		'<a href="client-',$client['id'],'.html">', $client['prenom'], '</a>', 
					  	'</td>
					  	<td>', 
					  		'<a href="client-',$client['id'],'.html">', $client['adresse'] . ' ' . $client['cp'] . ' ' . $client['ville'], '</a>', 
					  	'</td>
					  	<td>',
					  		'<a href="client-',$client['id'],'.html">', $client['tel'], '</a>', 
					  	'</td>
					  	<td>',
					  		'<a href="client-',$client['id'],'.html">', $client['mail'], '</a>', 
					  	'</td>', 	

					'</tr>',  "\n";


				}?>
			
			</table>
		<?php } ?>
		
	</div>
	<div class="col-xs-12 col-md-12 col-lg-12">
		
		<div class="col-xs-3 col-md-3 col-lg-3">	
			<a href="client-insert.html"><button class="btn btn-primary" data-toggle="tooltip" title="Ajouter un client">Ajouter un client</button></a>
		</div>

		<div class="col-xs-2 col-md-2 col-lg-2 col-lg-push-7 numPage">
			<?php for($i=1; $i<=$nbPages; $i++)
				    {
				    	if($i == $currentPage)
			    	{
			    		echo " <button class=\"btn btn-primary\" data-toggle=\"tooltip\" title=\"Pagination\">$i</button>";
			    	}
			    	else
			    	{
			    		echo " <a href=\"clients-liste-".$i.".html\"><button class=\"btn btn-primary\" data-toggle=\"tooltip\" title=\"Pagination\">$i</button></a> ";
			    	}
				      
			} ?>
		</div>	
	</div>
	
</div>	
