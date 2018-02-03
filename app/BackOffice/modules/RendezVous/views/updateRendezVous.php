<div class="col-xs-12 col-md-12 col-lg-12 writeZone pageForm">

	<h2>Modifier un rendez-vous</h2>

	<form action="" method="post">
	  <p>
	    <?= $form ?>
	 	<input type="hidden" name="idClient_Rdv" value="<?= $rdv['idClient_Rdv']; ?>">

	    <input  type="submit" class="btn btn-primary btn-envoyer"  value="Modifier" />
	  </p>
	</form>
</div>	