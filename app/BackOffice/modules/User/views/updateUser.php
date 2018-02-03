<div class="col-xs-12 col-md-12 col-lg-12 col-lg-push-4 writeZone pageForm">
	<h2><?= $title ?></h2>

	<form action="" method="post">
	  <label>pseudo</label><br>
	  <input type="text" name="pseudo" value="<?= $user['pseudo'] ?>"/><br/><br />
	  <label>mail</label><br>
	  <input type="email" name="mail" value="<?= $user['mail'] ?>"/><br /><br />
	  <label>Mot de passe</label><br>
	  <input type="password" name="passe" /><br /><br />
	  <label>Confirmez votre mot de passe</label><br>
	  <input type="password" name="passeConfirm" /><br /><br />
	 
	  <input  type="submit" class="btn btn-primary btn-envoyer" value="Modifier" />
	</form>
</div>