

<div id="detailRendezVous" class="writeZone">
	<div class="entete col-xs-12 col-md-10 col-lg-8 col-lg-push-2">
		<h5>Détails rendez-vous n° <?= $rendezVous['id'] ?></h5>	
	</div>
	<div id="rendezVousShow"  class="col-xs-12 col-md-10 col-lg-8 col-lg-push-2 ShowFields">

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
				<span class="intituleRendezVous">Date du rendez-vous : </span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champRendezVous"><?= $rendezVous['dateHeure'] ?></span>
			</div>
		</div><br/>

		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-3 col-lg-3 col-lg-push-2 champDetails">
				<span class="intituleRendezVous">Type d'intervention : </span>
			</div>		
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-push-3 champDetails champDetailsResult">
				<span class="champRendezVous"><?= $rendezVous['typeIntervention'] ?></span>
			</div>
		</div><br/>

		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-4 col-md-8 col-lg-8 col-lg-push-2 champDetails">
				<span class="intituleRendezVous">Commentaire :</span><br/>
			</div>		
			<div class="col-xs-6 col-md-8 col-lg-8 col-lg-push-2 champDetails champDetailsResult">
				<span class="champRendezVous"><?= $rendezVous['commentaire'] ?></span>
			</div>
		</div><br/>
				<br/>
					
				<br/>
			<br/>
				<br/>
			<br/>
				<br/><br/>
				<br/>
				<br/><br/>
			<br/>

		<div class="boutonFinPage col-xs-12 col-md-10 col-lg-8  col-lg-push-2">
			<a href="/rdv-update-<?= 
				  $rendezVous['id']?>.html">
			 	<button class="btn btn-primary" data-toggle="tooltip" title="Modifier le rendez-vous">Modifier</button>
			</a>
			<a href="/rdv-delete-<?= 
				  $rendezVous['id']?>.html">
			 	<button class="btn btn-primary" data-toggle="tooltip" title="Supprimer le rendez-vous">Supprimer</button>
			</a>
			<a href="/client-<?= 
				  $rendezVous['idClient_Rdv']?>.html">
			 	<button class="btn btn-primary" data-toggle="tooltip" title="Fiche client">Fiche client</button>
			</a>
		</div>
	</div> 
</div>	