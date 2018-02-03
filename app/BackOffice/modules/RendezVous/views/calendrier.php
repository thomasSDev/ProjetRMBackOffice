<div id="admin" class="col-xs-12 col-md-12 col-lg-12 writeZone">

		
	<?php    
		


	?>
	<div id="planning" class="col-xs-12 col-md-12 col-lg-12">
		<?php
		
		//planning semaine suivante ou précédente
		if($getNumSemaineSuivante || $getNumSemainePrecedente)
		{
			$jour = date('w');
			$lundi;
			$mardi;
	        $mercredi;
	        $jeudi;
	        $vendredi;
	        $samedi;
	        $dimanche;

	        
			switch ($jour) {
			    case 1:
			        $lundi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine, date("Y")));
			        $mardi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +1, date("Y")));
			        $mercredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +2, date("Y")));
			        $jeudi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +3, date("Y")));
			        $vendredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +4, date("Y")));
			        $samedi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +5, date("Y")));
			        $dimanche = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +6, date("Y")));
			        
			    break;
			    case 2:
			    	$lundi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -1, date("Y")));
			        $mardi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine, date("Y")));
			        $mercredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +1, date("Y")));
			        $jeudi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +2, date("Y")));
			        $vendredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +3, date("Y")));
			        $samedi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +4, date("Y")));
			        $dimanche = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +5, date("Y")));
			    break;
			    case 3:
			    	$lundi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -2, date("Y")));
			        $mardi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -1, date("Y")));
			        $mercredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine, date("Y")));
			        $jeudi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +1, date("Y")));
			        $vendredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +2, date("Y")));
			        $samedi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +3, date("Y")));
			        $dimanche = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +4, date("Y")));
			    break;
			    case 4:
			    	$lundi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -3, date("Y")));
			        $mardi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -2, date("Y")));
			        $mercredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -1, date("Y")));
			        $jeudi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine, date("Y")));
			        $vendredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +1, date("Y")));
			        $samedi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +2, date("Y")));
			        $dimanche = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +3, date("Y")));
			    break;
			    case 5:
			    	$lundi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -4, date("Y")));
			        $mardi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -3, date("Y")));
			        $mercredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -2, date("Y")));
			        $jeudi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -1, date("Y")));
			        $vendredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine, date("Y")));
			        $samedi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +1, date("Y")));
			        $dimanche = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +2, date("Y")));
			    break;
			    case 6:
			    	$lundi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -5, date("Y")));
			        $mardi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -4, date("Y")));
			        $mercredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -3, date("Y")));
			        $jeudi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -2, date("Y")));
			        $vendredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -1, date("Y")));
			        $samedi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine, date("Y")));
			        $dimanche = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine +1, date("Y")));
	        	break;
	        	case 0:
	        		$lundi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -6, date("Y")));
			        $mardi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -5, date("Y")));
			        $mercredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -4, date("Y")));
			        $jeudi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -3, date("Y")));
			        $vendredi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -2, date("Y")));
			        $samedi = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine -1, date("Y")));
			        $dimanche = date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine, date("Y")));
	        	break;
			}
		
		}
		
		else
		{
			$jour = date('w');
			$lundi;
			$mardi = date('d-m-Y', strtotime('next tuesday'));
	        $mercredi = date('d-m-Y', strtotime('next wednesday'));
	        $jeudi = date('d-m-Y', strtotime('next thursday'));
	        $vendredi = date('d-m-Y', strtotime('next friday'));
	        $samedi = date('d-m-Y', strtotime('next saturday'));
	        $dimanche = date('d-m-Y', strtotime('next sunday'));

	        
			switch ($jour) {
			    case 1:
			        $lundi = date('d-m-Y', strtotime('today'));
			        
			    break;
			    case 2:
			    	$lundi = date('d-m-Y', strtotime('last monday'));
			        $mardi = date('d-m-Y', strtotime('today'));
			    break;
			    case 3:
			    	$lundi = date('d-m-Y', strtotime('last monday'));
			    	$mardi = date('d-m-Y', strtotime('last tuesday'));
			        $mercredi = date('d-m-Y', strtotime('today'));
			    break;
			    case 4:
			    	$lundi = date('d-m-Y', strtotime('last monday'));
				    $mardi = date('d-m-Y', strtotime('last tuesday'));
				    $mercredi = date('d-m-Y', strtotime('last wednesday'));
			        $jeudi = date('d-m-Y', strtotime('today'));
			    break;
			    case 5:
			    	$lundi = date('d-m-Y', strtotime('last monday'));
			    	$mardi = date('d-m-Y', strtotime('last tuesday'));
				    $mercredi = date('d-m-Y', strtotime('last wednesday'));
				    $jeudi = date('d-m-Y', strtotime('last thursday'));
			        $vendredi = date('d-m-Y', strtotime('today'));
			    break;
			    case 6:
			    	$lundi = date('d-m-Y', strtotime('last monday'));
			    	$mardi = date('d-m-Y', strtotime('last tuesday'));
				    $mercredi = date('d-m-Y', strtotime('last wednesday'));
				    $jeudi = date('d-m-Y', strtotime('last thursday'));
				    $vendredi = date('d-m-Y', strtotime('last friday'));
			        $samedi = date('d-m-Y', strtotime('today'));
	        	break;
	        	case 0:
	        		$lundi = date('d-m-Y', strtotime('last monday'));
	        		$mardi = date('d-m-Y', strtotime('last tuesday'));
				    $mercredi = date('d-m-Y', strtotime('last wednesday'));
				    $jeudi = date('d-m-Y', strtotime('last thursday'));
				    $vendredi = date('d-m-Y', strtotime('last friday'));
			        $samedi = date('d-m-Y', strtotime('last saturday'));
			        $dimanche = date('d-m-Y', strtotime('today'));
	        	break;
			}
		}
		
		
		if($getNumSemaineSuivante)
			{ ?>
			<a href="http://backoffice.raphaelmaguer-plombierchauffagiste.fr/calendrier-<?= $semaineUrlDecremente; ?>.html"><button class="btn btn-primary btn-calendar" data-toggle="tooltip" title="semaine précédente">Précédent</button></a><a id="btn-suivant" href="http://backoffice.raphaelmaguer-plombierchauffagiste.fr/calendrier-<?= $semaineUrlIncremente; ?>.html"><button class="btn btn-primary btn-calendar" data-toggle="tooltip" title="semaine suivante">Suivant</button></a>
		<?php }
		else if($getNumSemainePrecedente)
		{ ?>
			<a href="http://backoffice.raphaelmaguer-plombierchauffagiste.fr/calendrier--<?= $semaineUrlDecremente; ?>.html"><button class="btn btn-primary btn-calendar" data-toggle="tooltip" title="semaine précédente">Précédent</button></a><a id="btn-suivant" href="http://backoffice.raphaelmaguer-plombierchauffagiste.fr/calendrier--<?= $semaineUrlIncremente; ?>.html"><button class="btn btn-primary btn-calendar" data-toggle="tooltip" title="semaine suivante">Suivant</button></a>
		<?php }
		else
		{ ?>
		<a href="http://backoffice.raphaelmaguer-plombierchauffagiste.fr/calendrier-<?= $semaineDiffNegatif; ?>.html"><button class="btn btn-primary btn-calendar" data-toggle="tooltip" title="semaine précédente">Précédent</button></a><a id="btn-suivant" href="http://backoffice.raphaelmaguer-plombierchauffagiste.fr/calendrier-<?= $semaineDiff; ?>.html"><button class="btn btn-primary btn-calendar" data-toggle="tooltip" title="semaine suivante">Suivant</button></a>
		<?php } ?>
		
		<h4>Semaine n° <?= $num_semaine ?> du Lundi <?= $lundi ?> au Dimanche <?= $dimanche ?></h4>

		<table class="col-xs-12 col-md-12 col-lg-12">
			<thead>
				<tr>
		  			<td class="tdEntetePlanning dateHeure col-xs-3 col-md-3 col-lg-3">Heure rendez-vous</td><td class='tdEntetePlanning col-xs-3 col-md-3 col-lg-3'>Coordonnées client</td><td class='tdEntetePlanning col-xs-3 col-md-3 col-lg-3'>Type d'intervention</td><td class='tdEntetePlanning col-xs-3 col-md-3 col-lg-3'>Commentaire
		  			</td>
			  	</tr>
			</thead>
			<tr class="blockJourPlanning">
				<td class="jourPlanning">Lundi <?= $lundi ?></td><td></td><td></td><td></td>
			</tr>
			<?php 
				foreach ($rendezVousListe as $rdvListe)
				{ ?> 
					<tr class="blockListJourPlanning"> 
					<?php if($rdvListe['dateHeure']->format('d-m-Y') == $lundi)	
					{
					  	echo 
					  
					  	'<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['dateHeure']->format('H\hi'), 
					  	'</td>', 
				  		'<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',$rdvListe->client['nom'],  ' ', $rdvListe->client['prenom'],  ' ', $rdvListe->client['adresse'], '<br/>',  $rdvListe->client['cp'],  ' ', $rdvListe->client['ville'],'</a>',
						'</td>
				  		<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',  $rdvListe['typeIntervention'], '</a>',
						'</td>
					  	<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['commentaire'], '</a>', 
					  	'</td>',
						  		

						'</tr>',  "\n";
					} ?>
					</tr>
				<?php } ?>
		

			<tr class="blockJourPlanning">
				<td class="jourPlanning">Mardi <?= $mardi ?></td><td></td><td></td><td></td>
			</tr>
			<?php foreach ($rendezVousListe as $rdvListe)
				{ ?> 
					<tr class="blockListJourPlanning"> 
					<?php if($rdvListe['dateHeure']->format('d-m-Y') == $mardi)
					{

					  	echo 

					  
					  	'<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['dateHeure']->format('H\hi'), 
					  	'</td>', 
				  		'<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',$rdvListe->client['nom'],  ' ', $rdvListe->client['prenom'],  ' ', $rdvListe->client['adresse'], '<br/>',  $rdvListe->client['cp'],  ' ', $rdvListe->client['ville'],'</a>',
						  '</td>
				  		<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',  $rdvListe['typeIntervention'], '</a>',
						  '</td>
					  	<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['commentaire'], '</a>', 
					  	'</td>',
						  		

						'</tr>',  "\n";
					} ?>
					</tr>
				<?php } ?>	

			<tr class="blockJourPlanning">
				<td class="jourPlanning">Mercredi <?= $mercredi ?></td><td></td><td></td><td></td>
			</tr>
			
				<?php foreach ($rendezVousListe as $rdvListe)
				{ ?> 
					<tr class="blockListJourPlanning"> 
					<?php if($rdvListe['dateHeure']->format('d-m-Y') == $mercredi)
					{
					  	echo 
					  
					  	'<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['dateHeure']->format('H\hi'), 
					  	'</td>', 
				  		'<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',$rdvListe->client['nom'],  ' ', $rdvListe->client['prenom'],  ' ', $rdvListe->client['adresse'], '<br/>',  $rdvListe->client['cp'],  ' ', $rdvListe->client['ville'],'</a>',
						  '</td>
				  		<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',  $rdvListe['typeIntervention'], '</a>',
						  '</td>
					  	<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['commentaire'], '</a>', 
					  	'</td>',
						  		

						'</tr>',  "\n";
					} ?>
					</tr> 
				<?php } ?>

				
			<tr class="blockJourPlanning">
				<td class="jourPlanning">Jeudi <?= $jeudi ?></td><td></td><td></td><td></td>
			</tr>

				<?php foreach ($rendezVousListe as $rdvListe)
				{ ?> 
					<tr class="blockListJourPlanning"> 
					<?php if($rdvListe['dateHeure']->format('d-m-Y') == $jeudi)
					{
					  	echo 
					  
					  	'<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['dateHeure']->format('H\hi'), 
					  	'</td>', 
				  		'<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',$rdvListe->client['nom'],  ' ', $rdvListe->client['prenom'],  ' ', $rdvListe->client['adresse'], '<br/>',  $rdvListe->client['cp'],  ' ', $rdvListe->client['ville'],'</a>',
						  '</td>
				  		<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',  $rdvListe['typeIntervention'], '</a>',
						  '</td>
					  	<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['commentaire'], '</a>', 
					  	'</td>',
						  		

						'</tr>',  "\n";
					} ?>
					</tr>

				<?php }?>
				
			</tr>	
			<tr class="blockJourPlanning">
				<td class="jourPlanning">Vendredi <?= $vendredi ?></td><td></td><td></td><td></td>
			</tr>

				<?php foreach ($rendezVousListe as $rdvListe)
				{ ?> 
					<tr class="blockListJourPlanning"> 
					<?php if($rdvListe['dateHeure']->format('d-m-Y') == $vendredi)
					{
					  	echo 
					  
					  	'<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['dateHeure']->format('H\hi'), 
					  	'</td>', 
				  		'<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',$rdvListe->client['nom'],  ' ', $rdvListe->client['prenom'],  ' ', $rdvListe->client['adresse'], '<br/>',  $rdvListe->client['cp'],  ' ', $rdvListe->client['ville'],'</a>',
						  '</td>
				  		<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',  $rdvListe['typeIntervention'], '</a>',
						  '</td>
					  	<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['commentaire'], '</a>', 
					  	'</td>',
						  		

						'</tr>',  "\n";
					} ?>
					</tr>
				<?php } ?>

			<tr class="blockJourPlanning">
				<td class="jourPlanning">Samedi <?= $samedi ?></td><td></td><td></td><td></td>
			</tr>

				<?php foreach ($rendezVousListe as $rdvListe)
				{ ?> 
					<tr class="blockListJourPlanning"> 
					<?php if($rdvListe['dateHeure']->format('d-m-Y') == $samedi)
					{
					  	echo 
					  
					  	'<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['dateHeure']->format('H\hi'), 
					  	'</td>', 
				  		'<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',$rdvListe->client['nom'],  ' ', $rdvListe->client['prenom'],  ' ', $rdvListe->client['adresse'], '<br/>',  $rdvListe->client['cp'],  ' ', $rdvListe->client['ville'],'</a>',
						  '</td>
				  		<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',  $rdvListe['typeIntervention'], '</a>',
						  '</td>
					  	<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['commentaire'], '</a>', 
					  	'</td>',
						  		

						'</tr>',  "\n";
					} ?>
					</tr>
				<?php } ?>

			<tr class="blockJourPlanning">
				<td class="jourPlanning">Dimanche <?= $dimanche ?></td><td></td><td></td><td></td>
			</tr>
				<?php foreach ($rendezVousListe as $rdvListe)
				{ ?> 
					<tr class="blockListJourPlanning"> 
					<?php if($rdvListe['dateHeure']->format('d-m-Y') == $dimanche)
					{
					  	echo 
					  
					  	'<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['dateHeure']->format('H\hi'), 
					  	'</td>', 
				  		'<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',$rdvListe->client['nom'],  ' ', $rdvListe->client['prenom'],  ' ', $rdvListe->client['adresse'], '<br/>',  $rdvListe->client['cp'],  ' ', $rdvListe->client['ville'],'</a>',
						  '</td>
				  		<td>', 
						  '<a href="rdv-',$rdvListe['id'],'.html">',  $rdvListe['typeIntervention'], '</a>',
						  '</td>
					  	<td>', 
					  		'<a href="rdv-',$rdvListe['id'],'.html">', $rdvListe['commentaire'], '</a>', 
					  	'</td>',
						  		

						'</tr>',  "\n";
					} ?>
				</tr>
				<?php } ?>

		</table>
		
	</div>

	<!-- <div class="DeuxTableaux" class="col-xs-12 col-md-12 col-lg-12">


		<div id="tableRdvPrecedents" class="col-xs-12 col-md-12 col-lg-6">
			<h2><a href="/rdv-precedents.html">Rendez vous passés</a></h2>
			<p style="text-align: center">Liste des rendez-vous passés</p>
			 
			<table class="table table-hover">
				<thead class="thead-color"> 
			  		<tr>
			  			<td class='col-xs-3 col-md-3 col-lg-3'>Coordonnées client</td><td class='col-xs-3 col-md-3 col-lg-3'>Type d'intervention</td><td class='col-xs-3 col-md-3 col-lg-3'>Commentaire</td><td class="dateHeure col-xs-3 col-md-3 col-lg-3">Date rendez-vous</td>
			  		</tr>
			  	</thead>
			<?php foreach ($listeRendezVousPrecedents as $rendezVousPrecedents)
			{

			  echo 
			  
			  	'<tr>

			  		<td>', 
					  '<a href="rdv-',$rendezVousPrecedents['id'],'.html">',$rendezVousPrecedents->client['prenom'], ' ', $rendezVousPrecedents->client['nom'], ' ', $rendezVousPrecedents->client['adresse'], '<br/>', $rendezVousPrecedents->client['cp'], ' ', $rendezVousPrecedents->client['ville'], '</a>',
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
			<a href="/rdv-precedents.html">
			 	<button class="btn btn-primary" data-toggle="tooltip" title="Voir tous anciens rendez-vous">Accéder aux précédents rendez-vous</button></a>
		</div>
		<div id="tableRdvProchains" class="col-xs-12 col-md-12 col-lg-6">
			<h2><a href="/rdv-futur.html">Rendez vous à venir</a></h2>
			<p style="text-align: center">Liste des rendez-vous à venir</p>
			 
			<table class="table table-hover">
				<thead class="thead-color"> 
			  		<tr>
			  			<td class='col-xs-3 col-md-3 col-lg-3'>Coordonnées client</td><td class='col-xs-3 col-md-3 col-lg-3'>Type d'intervention</td><td class='col-xs-3 col-md-3 col-lg-3'>Commentaire</td><td class="dateHeure col-xs-3 col-md-3 col-lg-3">Date rendez-vous</td>
			  		</tr>
			  	</thead>


			<?php if(!$listeRendezVousProchains)
			{
				echo "<p>Aucun rendez-vous n'est programmé</p>";
			}
			else
			{
				foreach ($listeRendezVousProchains as $rendezVousProchains)
				{

				  echo 
				  
				  	'<tr>

				  		<td>', 
						  '<a href="rdv-',$rendezVousProchains['id'],'.html">',$rendezVousProchains->client['nom'],  ' ', $rendezVousProchains->client['prenom'],  ' ', $rendezVousProchains->client['adresse'], '<br/>',  $rendezVousProchains->client['cp'],  ' ', $rendezVousProchains->client['ville'],'</a>',
						  '</td>
				  		<td>', 
						  '<a href="rdv-',$rendezVousProchains['id'],'.html">',  $rendezVousProchains['typeIntervention'], '</a>',
						  '</td>
					  	<td>', 
					  		'<a href="rdv-',$rendezVousProchains['id'],'.html">', $rendezVousProchains['commentaire'], '</a>', 
					  	'</td>
					  	<td>', 
					  		'<a href="rdv-',$rendezVousProchains['id'],'.html">', $rendezVousProchains['dateHeure']->format('d/m/Y à H\hi'), 
					  	'</td>', 	

					'</tr>',  "\n";

				}?>
			<?php } ?>	
			</table>
			<a href="/rdv-futur.html">
			 	<button class="btn btn-primary" data-toggle="tooltip" title="Voir tous les rendez-vous programmés">Accéder aux prochains rendez-vous</button></a>
		</div>

		
	</div> -->

	<div id="DeuxTableaux" class="row OnePart">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onePartRepere">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                   <div class="panel-heading">
                        <h3 class="panel-title text-center">
                            <a class="buttonPanelTitle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Rendez vous à venir   <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                        </h3>
                   </div>
                   <div id="collapseOne" class="panel-collapse collapse in body_compet">
                       <div id="collapseIntegration" class="panel-body body_compet_re">
                            <div class="row row_panel">
                            	<div id="tableRdvProchains" class="col-xs-12 col-md-12 col-lg-12">
			 
									<table class="table table-hover">
										<thead class="thead-color"> 
									  		<tr>
									  			<td class='col-xs-3 col-md-3 col-lg-3'>Coordonnées client</td><td class='col-xs-3 col-md-3 col-lg-3'>Type d'intervention</td><td class='col-xs-3 col-md-3 col-lg-3'>Commentaire</td><td class="dateHeure col-xs-3 col-md-3 col-lg-3">Date rendez-vous</td>
									  		</tr>
									  	</thead>


										<?php if(!$listeRendezVousProchains)
										{
											echo "<p>Aucun rendez-vous n'est programmé</p>";
										}
										else
										{
											foreach ($listeRendezVousProchains as $rendezVousProchains)
											{

											  echo 
											  
											  	'<tr>

											  		<td>', 
													  '<a href="rdv-',$rendezVousProchains['id'],'.html">',$rendezVousProchains->client['nom'],  ' ', $rendezVousProchains->client['prenom'],  ' ', $rendezVousProchains->client['adresse'], '<br/>',  $rendezVousProchains->client['cp'],  ' ', $rendezVousProchains->client['ville'],'</a>',
													  '</td>
											  		<td>', 
													  '<a href="rdv-',$rendezVousProchains['id'],'.html">',  $rendezVousProchains['typeIntervention'], '</a>',
													  '</td>
												  	<td>', 
												  		'<a href="rdv-',$rendezVousProchains['id'],'.html">', $rendezVousProchains['commentaire'], '</a>', 
												  	'</td>
												  	<td>', 
												  		'<a href="rdv-',$rendezVousProchains['id'],'.html">', $rendezVousProchains['dateHeure']->format('d/m/Y à H\hi'), 
												  	'</td>', 	

												'</tr>',  "\n";

											}?>
										<?php } ?>	
									</table>
									<a href="/rdv-futur.html">
									 	<button class="btn btn-primary" data-toggle="tooltip" title="Voir tous les rendez-vous programmés">Accéder aux prochains rendez-vous</button></a>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                   <div class="panel-heading">
                        <h3 class="panel-title text-center">
                            <a class="buttonPanelTitle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Rendez vous passés   <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                        </h3>
                   </div>
                   <div id="collapseTwo" class="panel-collapse collapse body_compet">
                       <div id="collapseDevClient" class="panel-body body_compet_re">
                            <div class="row row_panel">
                            	<div id="tableRdvPrecedents" class="col-xs-12 col-md-12 col-lg-12">
									<table class="table table-hover">
										<thead class="thead-color"> 
									  		<tr>
									  			<td class='col-xs-3 col-md-3 col-lg-3'>Coordonnées client</td><td class='col-xs-3 col-md-3 col-lg-3'>Type d'intervention</td><td class='col-xs-3 col-md-3 col-lg-3'>Commentaire</td><td class="dateHeure col-xs-3 col-md-3 col-lg-3">Date rendez-vous</td>
									  		</tr>
									  	</thead>
									<?php foreach ($listeRendezVousPrecedents as $rendezVousPrecedents)
									{

									  echo 
									  
									  	'<tr>

									  		<td>', 
											  '<a href="rdv-',$rendezVousPrecedents['id'],'.html">',$rendezVousPrecedents->client['prenom'], ' ', $rendezVousPrecedents->client['nom'], ' ', $rendezVousPrecedents->client['adresse'], '<br/>', $rendezVousPrecedents->client['cp'], ' ', $rendezVousPrecedents->client['ville'], '</a>',
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
									<a href="/rdv-precedents.html">
									 	<button class="btn btn-primary" data-toggle="tooltip" title="Voir tous anciens rendez-vous">Accéder aux précédents rendez-vous</button></a>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>	

</div>	