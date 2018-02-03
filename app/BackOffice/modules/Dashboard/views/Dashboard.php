<div id="dashboard" class="col-xs-12 col-md-12 col-lg-12 writeZone">
	<div id="rdvAttenteDashboard" class="col-xs-12 col-md-12 col-lg-12">
		<h2>Liste des messages en attente de traitement</h2>
		<?php if($nombreDemandes == 0){ ?>
			<p style="text-align: center">Vous n'avez aucun message</p>
		<?php }  
		else if($nombreDemandes == 1){?>
			<p style="text-align: center">Il y a actuellement <?= $nombreDemandes ?> demande de rendez-vous en attente. En voici la liste :</p>
		<?php }
		else{ ?>	
		<p style="text-align: center">Il y a actuellement <?= $nombreDemandes ?> demandes de rendez-vous en attente. En voici la liste :</p>
		<?php } ?>
		<table class="table table-hover">
			<thead class="thead-color"> 
		  		<tr>
		  			<td><i class="fa fa-address-card-o" aria-hidden="true"></i> Coordonnées clients</td><td>type demande</td><td>type intervention</td><td class="dateDemande">Date demande</td><td><i class="fa fa-file-text" aria-hidden="true"></i> Lire le message</td>
		  		</tr>
		  	</thead>


			<?php foreach ($listeDemandesNonTraitees as $message)
			{

			  echo 
			  
			  	'<tr>

			  		<td>', 
					  $message->client->nom(), ' ',$message->client->prenom(), '<br/>', ' ', $message->client->adresse(), ' ', $message->client->cp(), ' ', $message->client->ville(),
					  '</td>
				  	<td class="typeDemande"> ', 
				  		$message['typeDemande'], 
				  	'</td>
				  	<td class="typeDemande"> ', 
				  		$message['typeIntervention'], 
				  	'</td>
				  	<td class="dateDemande"> ', 
				  		$message['dateDemande']->format('d/m/Y à H\hi'), 
				  	'</td>
				  	<td class="lireMessage"> ', 
				  		'<a href="message-',$message['id'],'.html">', '<button class="btn btn-info"><i class="fa fa-file-text" aria-hidden="true"></i></button>', '</a>',
				  		 
				  	'</td>
				</tr>',  "\n";

			}?>
		</table>
	</div>

	<div id="boxDonutsTypeDemande" class="col-xs-12 col-md-12 col-lg-7">
		<h2>Demandes les plus fréquentes</h2>
		<div id="donutsTypeDemande" class="col-xs-12 col-md-12 col-lg-12">
			
	    </div>
	</div>
	


	<div id="prochainsRDVDashboard" class="col-xs-12 col-md-12 col-lg-4 col-lg-push-1">
		<h2><a href="/rdv-futur.html">Liste des prochains rendez-vous</a></h2>
		<p style="text-align: center">Il y a actuellement <?= $nombreProchainsRDV ?> rendez-vous programmé(s). En voici la liste :</p>

		<table class="table table-hover">
			<thead class="thead-color"> 
		  		<tr>
		  			<td>Client</td><td>Type d'intervention</td><td class="dateHeure">Date rendez-vous</td>
		  		</tr>
		  	</thead>
		<?php foreach ($listeProchainsRDV as $rendezVousProchains)
		{

		  echo 
		  
		  	'<tr>

		  		<td>', 
				  '<a href="rdv-',$rendezVousProchains['id'],'.html">',$rendezVousProchains->client['prenom'], ' ', $rendezVousProchains->client['nom'], '</a>',
				  '</td>
		  		<td>', 
				  '<a href="rdv-',$rendezVousProchains['id'],'.html">', $rendezVousProchains['typeIntervention'], '</a>',
				  '</td>
			  	<td>', 
			  		'<a href="rdv-',$rendezVousProchains['id'],'.html">', $rendezVousProchains['dateHeure']->format('d/m/Y à H\hi'), 
			  	'</td>', 	

			'</tr>',  "\n";

		}?>
		</table>
		<a href="/rdv-futur.html">
			 	<button class="btn btn-primary" data-toggle="tooltip" title="Voir tous les rendez-vous programmés">Accéder aux prochains rendez-vous</button></a>
	</div>
    <?php include_once("charts/dataChartActivity.php"); ?>
    <div id="boxGraphActivite" class="col-xs-12 col-md-12 col-lg-12">
    	<h2>Nombre d'interventions par mois sur l'exercice</h2>
	    <div id="graphActivite" class="col-xs-12 col-md-12 col-lg-12">
	        

	    </div>
	</div>   
	
	<script type="text/javascript">
	  var scriptData = <?php echo json_encode($scriptData ); ?>;
	</script>
	
    <script type="text/javascript">
		Morris.Bar({
			element: 'graphActivite',
			data: [
				{ 'Nombre de rendez-vous' : 'Jan.', value : <?= $janvierCount ?> },
				{ 'Nombre de rendez-vous' : 'Fév.', value : <?= $fevrierCount ?> },
				{ 'Nombre de rendez-vous' : 'Mar.', value : <?= $marsCount ?> },
				{ 'Nombre de rendez-vous' : 'Avr.', value : <?= $avrilCount ?>  },
				{ 'Nombre de rendez-vous' : 'Mai', value : <?= $maiCount ?>  },
				{ 'Nombre de rendez-vous' : 'Jui.', value : <?= $juinCount ?>  },
				{ 'Nombre de rendez-vous' : 'Juil.', value : <?= $juilletCount ?>  },
				{ 'Nombre de rendez-vous' : 'Août', value : <?= $aoutCount ?>  },
				{ 'Nombre de rendez-vous' : 'Sept.', value : <?= $septembreCount ?>  },
				{ 'Nombre de rendez-vous' : 'Oct.', value : <?= $octobreCount ?>  },
				{ 'Nombre de rendez-vous' : 'Nov.', value : <?= $novembreCount ?>  },
				{ 'Nombre de rendez-vous' : 'Déc.', value : <?= $decembreCount ?>  },
			],
			xkey: 'Nombre de rendez-vous',
			ykeys: ['value'],
			labels: ['Nombre de rendez-vous']
		})
	</script>

</div>	