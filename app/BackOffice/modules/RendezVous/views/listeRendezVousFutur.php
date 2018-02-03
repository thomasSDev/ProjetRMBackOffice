<div id="rendezVousFutur" class="col-xs-12 col-md-12 col-lg-12 writeZone">
	<div id="tableRdvTotal">
		

	
	<div id="tableRdvProchains">
		<h2>Rendez vous à venir</h2>
		<p style="text-align: center">Liste des rendez-vous à venir</p>
		 
		<table class="table table-hover">
			<thead class="thead-color"> 
		  		<tr>
		  			<td>Nom</td><td>Prénom</td><td>Adresse</td><td>Téléphone</td><td>Mail</td><td>Type d'intervention</td><td>Commentaire</td><td class="dateHeure">Date rendez-vous</td>
		  		</tr>
		  	</thead>
		<?php foreach ($listeRendezVousProchains as $rendezVousProchains)
		{

		  echo 
		  
		  	'<tr>

		  		<td>', 
				  '<a href="rdv-',$rendezVousProchains['id'],'.html">',$rendezVousProchains->client['nom'], '</a>',
				  '</td>
			  	<td>', 
			  		'<a href="rdv-',$rendezVousProchains['id'],'.html">',$rendezVousProchains->client['prenom'], '</a>', 
			  	'</td>
			  	<td>', 
			  		'<a href="rdv-',$rendezVousProchains['id'],'.html">',$rendezVousProchains->client['adresse'], ' ', $rendezVousProchains->client['cp'], ' ', $rendezVousProchains->client['ville'], '</a>', 
			  	'</td>
			  	<td>', 
			  		'<a href="rdv-',$rendezVousProchains['id'],'.html">',$rendezVousProchains->client['tel'], '</a>', 
			  	'</td>
			  	<td>', 
			  		'<a href="rdv-',$rendezVousProchains['id'],'.html">',$rendezVousProchains->client['mail'], '</a>', 
			  	'</td>
		  		<td>', 
				  '<a href="rdv-',$rendezVousProchains['id'],'.html">', $rendezVousProchains['typeIntervention'], '</a>',
				  '</td>
			  	<td>', 
			  		'<a href="rdv-',$rendezVousProchains['id'],'.html">', $rendezVousProchains['commentaire'], '</a>', 
			  	'</td>
			  	<td>', 
			  		'<a href="rdv-',$rendezVousProchains['id'],'.html">', $rendezVousProchains['dateHeure']->format('d/m/Y à H\hi'), 
			  	'</td>', 	

			'</tr>',  "\n";

		}?>
		</table>
		<div class="col-xs-12 col-md-6 col-lg-2 col-md-push-6 col-lg-push-10 numPage">
			<?php for($i=1; $i<=$nbPages; $i++)
				    {
				    	if($i == $currentPage)
			    	{
			    		echo " <button class=\"btn btn-primary\" data-toggle=\"tooltip\" title=\"Pagination\">$i</button>";
			    	}
			    	else
			    	{
			    		echo " <a href=\"rdv-futur-".$i.".html\"><button class=\"btn btn-primary\" data-toggle=\"tooltip\" title=\"Pagination\">$i</button></a> ";
			    	}
				      
			} ?>
		</div>	

	</div>

</div>	