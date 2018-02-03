<div id="detailClient" class="writeZone">

	<div class="entete col-xs-12 col-md-10 col-lg-8 col-lg-push-2">
		<h5>Détails Client n°<?=$client['id']?></h5>	
	</div>
	<div id="clientShow" class="col-xs-12 col-md-10 col-lg-8 col-lg-push-2 ShowFields">	
		<div class="col-xs-12 col-md-12 col-lg-12 totalChampDetails">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Prénom</span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult ">
				<span class="champClient"><?= $client['prenom'] ?></span>
			</div>
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12 totalChampDetails">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Nom</span>
			</div>
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champClient"><?= $client['nom'] ?></span>
			</div>
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12 totalChampDetails">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Adresse</span>
			</div>
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champClient"><?= $client['adresse'] ?></span>
			</div>
		</div><br/>	
		<div class="col-xs-12 col-md-12 col-lg-12 totalChampDetails">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Code postal</span>
			</div>
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champClient"><?= $client['cp'] ?></span>
			</div>
		</div><br/>	
		<div class="col-xs-12 col-md-12 col-lg-12 totalChampDetails">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Ville</span>
			</div>
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champClient"><?= $client['ville'] ?></span>
			</div>
		</div><br/>	
		<div class="col-xs-12 col-md-12 col-lg-12 totalChampDetails">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Téléphone</span>
			</div>
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champClient"><?= $client['tel'] ?></span>
			</div>
		</div><br/>	
		<div class="col-xs-12 col-md-12 col-lg-12 totalChampDetails">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Mail</span>
			</div>
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champClient"><?= $client['mail'] ?></span>
			</div>
		</div><br/>
		<div class="boutonFinPage col-xs-12 col-md-10 col-lg-8  col-lg-push-2">
			<span class="btnIcone">
				
			 		<button class="btn btn-primary" data-toggle="tooltip" onclick="confirmDeleteClient()" title="Supprimer le client">Supprimer</button>
			 	<a href="/rdv-insert-par-client-<?= 
					  $client['id']?>.html">
				 	<button class="btn btn-primary" data-toggle="tooltip" title="Ajouter un rendez-vous">ajouter un rendez-vous</button></a>
				<a href="/client-update-<?= 
				  $client['id']?>.html">
		 			<button class="btn btn-primary" data-toggle="tooltip" title="Modifier le client">Modifier</button></a>	 	
			</span>
		</div>
	</div> 

	<div id="messageShowClient" class="col-xs-12 col-md-10 col-lg-8  col-lg-push-2">
		<h4 class='historique'>Historique des messages</h4>

		<?php if(!$messages){
			echo '<p class="noMessage"> Aucun message disponible pour ce client</p>';
		} 
		else{
			foreach ($messages as $message) : ?>
				<fieldset>

					<legend>
						<strong><a href="/message-<?= 
					  $message['id']?>.html"><?= $message['typeDemande'] ?></a></strong> 
						le <?= $message['dateDemande'] ?>
						<strong><a href="/message-<?= 
					  $message['id']?>.html">	<i class="fa fa-search" aria-hidden="true"></i></a></strong>
					</legend>
					<p><?= $message['message'] ?></p>
					
				</fieldset>

			<?php endforeach ?>
		<?php } ?>
	</div>

	<div id="rendezVousShowClient" class="col-xs-12 col-md-10 col-lg-8  col-lg-push-2">
		<h4 class='historique'>Historique des rendez-vous plannifiés</h4>
		<?php if(!$rendezVous){
			echo '<p class="noMessage"> Aucun rendez-vous n\'est défini pour ce client</p>';
		} 
		else{
			foreach ($rendezVous as $rdv) : ?>
				<fieldset>
					<legend>
						<strong><a href="/rdv-<?= 
					  $rdv['id']?>.html"><?= $rdv['typeIntervention'] ?></a></strong> 
						le <?= $rdv['dateHeure'] ?>
						<strong><a href="/rdv-<?= 
					  $rdv['id']?>.html">	<i class="fa fa-search" aria-hidden="true"></i></a></strong>
					</legend>
					<p><?= $rdv['commentaire'] ?></p>
				</fieldset>

			<?php endforeach ?>
		<?php } ?>

	</div>

	

</div>

			<script>function confirmDeleteClient(id){
			    if(confirm("Voulez vous vraiment supprimer ce client ?")){
			            window.location="/client-delete-<?= $client['id']?>.html"
			    }
			    else{
			            alert("Le client n\'a pas été supprimé.")
			    }
			}</script>