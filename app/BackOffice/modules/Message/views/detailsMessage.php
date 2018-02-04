<?php 

?>

<div id="detailRendezVous" class="writeZone">
	<div class="entete col-xs-12 col-md-10 col-lg-8 col-lg-push-2">
		<h5>Détails message n° <?= $message['id'] ?></h5>	
	</div>	
	<div id="messageShow"  class="col-xs-12 col-md-10 col-lg-8 col-lg-push-2 ShowFields">
		<h4><?= $traite ?></h4>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Prénom : </span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champClient"><?= $client['prenom'] ?></span>
			</div>
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Nom : </span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champClient"><?= $client['nom'] ?></span>
			</div>
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Adresse : </span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champClient"><?= $client['adresse'] ?></span>
			</div>
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Code postal : </span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champClient"><?= $client['cp'] ?></span>
			</div>
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Ville : </span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champClient"><?= $client['ville'] ?></span>
			</div>
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Téléphone : </span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champClient"><?= $client['tel'] ?></span>
			</div>
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleClient">Mail : </span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champClient"><?= $client['mail'] ?></span>
			</div>
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleRendezVous">Date du message : </span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champRendezVous"><?= $message['dateDemande'] ?></span>
			</div>
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleRendezVous">Type de demande : </span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champRendezVous"><?= $message['typeDemande'] ?></span>
			</div>
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleRendezVous">Type d'intervention : </span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champRendezVous"><?= $message['typeIntervention'] ?></span>
			</div>
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleRendezVous">Disponibilité: </span>
			</div>
			<?php if($message['disponibilite'] != null)	
			{ ?>
				<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champRendezVous"><?= $message['disponibilite'] ?></span>
				</div>
			<?php } ?>	
			
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-8 col-lg-push-2 champDetails">
				<span class="intituleRendezVous">Message :</span><br/>
			</div>		
			<div class="col-xs-12 col-md-12 col-lg-8 col-lg-push-2 champDetails champDetailsResult">
				<span class="champRendezVous"><?= $message['message'] ?></span>
			</div>
		</div><br/>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleRendezVous">Demande traitée :</span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champRendezVous"><?php if($message['demandeTraitee'] == false){ ?> Non <?php } else{ ?> Oui <?php } ?></span>
			</div>
		</div>	

		<div class="boutonFinPage col-xs-12 col-md-10 col-lg-8  col-lg-push-2">
			<a href=<?= $updateMessageStatus ?>>
			 	<button class="btn btn-primary" data-toggle="tooltip" title="Changer le status du message"><?= $boutonTraite ?></button></a>
			 	
			<a href="/client-<?= 
				  $message['idClient']?>.html">
			 	<button class="btn btn-primary" data-toggle="tooltip" title="Fiche client">Fiche client</button></a>

			<a href="/rdv-insert-par-client-<?= 
				  $message['idClient']?>.html">
			 	<button class="btn btn-primary" data-toggle="tooltip" title="Plannifier un rendez-vous">Définir un rendez-vous</button></a> 	
		</div>

	</div> 
</div>	
<?php
