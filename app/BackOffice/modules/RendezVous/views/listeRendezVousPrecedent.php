<div id="rendezVousPrecedent" class="col-xs-12 col-md-12 col-lg-12 writeZone">
	<div id="tableRdvTotal">
		
	<div id="tableRdvPrecedents">
		<h2><a href="/rdv-precedents.html">Rendez vous précédents</a></h2>
		<p style="text-align: center">Liste des rendez-vous précédents</p>
		 
		<table class="table table-hover">
			<thead class="thead-color"> 
		  		<tr>
		  			<td>Nom</td><td>Prénom</td><td>Adresse</td><td>Téléphone</td><td>Mail</td><td>Type d'intervention</td><td>Commentaire</td><td class="dateHeure">Date rendez-vous</td>
		  		</tr>
		  	</thead>
		<?php foreach ($listeRendezVousPrecedents as $rendezVousPrecedents)
		{

		  echo 
		  
		  	'<tr>

		  		<td>', 
				  '<a href="rdv-',$rendezVousPrecedents['id'],'.html">',$rendezVousPrecedents->client['nom'], '</a>',
				  '</td>
			  	<td>', 
			  		'<a href="rdv-',$rendezVousPrecedents['id'],'.html">',$rendezVousPrecedents->client['prenom'], '</a>', 
			  	'</td>
			  	<td>', 
			  		'<a href="rdv-',$rendezVousPrecedents['id'],'.html">',$rendezVousPrecedents->client['adresse'], ' ', $rendezVousPrecedents->client['cp'], ' ', $rendezVousPrecedents->client['ville'], '</a>', 
			  	'</td>
			  	<td>', 
			  		'<a href="rdv-',$rendezVousPrecedents['id'],'.html">',$rendezVousPrecedents->client['tel'], '</a>', 
			  	'</td>
			  	<td>', 
			  		'<a href="rdv-',$rendezVousPrecedents['id'],'.html">',$rendezVousPrecedents->client['mail'], '</a>', 
			  	'</td>
			  	<td>', 
				  '<a href="rdv-',$rendezVousPrecedents['id'],'.html">', $rendezVousPrecedents['typeIntervention'], '</a>',
				  '</td>
			  	<td>', 
			  		'<a href="rdv-',$rendezVousPrecedents['id'],'.html">', $rendezVousPrecedents['commentaire'], '</a>', 
			  	'</td>
			  	<td>', 
			  		'<a href="rdv-',$rendezVousPrecedents['id'],'.html">', $rendezVousPrecedents['dateHeure']->format('d/m/Y à H\hi'), 
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
			    		echo " <a href=\"rdv-precedents-".$i.".html\"><button class=\"btn btn-primary\" data-toggle=\"tooltip\" title=\"Pagination\">$i</button></a> ";
			    	}
				      
			} ?>
		</div>	
	</div>

</div>	