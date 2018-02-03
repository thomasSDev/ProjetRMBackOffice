<?php if($urlUri == "/"){ ?>
				<li class="bActive"> <a class="btn" href="/"><i class="fa fa-home"></i> Accueil</a></li>
			<?php }
			elseif($urlUri != "/") { ?>
				<li> <a class="btn bDefault" href="/"><i class="fa fa-home"></i> Accueil</a></li>
			<?php }
			if($urlUri == "/calendrier.html"){ ?>
				<li class="bActive"><a class="btn" href="/calendrier.html"><i class="fa fa-calendar" aria-hidden="true"></i> Calendrier</a></li>
			<?php }
			elseif($urlUri != "/calendrier.html") { ?>
				<li><a class="btn bDefault" href="/calendrier.html"><i class="fa fa-calendar" aria-hidden="true"></i> Calendrier</a></li>
			<?php }
			if($urlUri == "/listeclients.html"){ ?>
				<li class="bActive"><a class="btn" href="/clients-liste.html"><i class="fa fa-list-alt" aria-hidden="true"></i> Liste des clients</a></li>
			<?php }
			elseif($urlUri != "/listeclients.html") { ?>
				<li><a class="btn bDefault" href="/clients-liste.html"><i class="fa fa-list-alt" aria-hidden="true"></i> Liste des clients</a></li>
	        <?php }
	        if($urlUri == "/messages-liste.html"){ ?>
				<li class="bActive"><a class="btn" href="/messages-liste.html"><i class="fa fa-envelope-o" aria-hidden="true"></i> Historique des messages</a></li>
			<?php }
	        elseif($urlUri != "/messages-liste.html") { ?>
				<li><a class="btn bDefault" href="/messages-liste.html"><i class="fa fa-envelope-o" aria-hidden="true"></i> Historique des messages</a>

				</li>
	        <?php }
	        if($urlUri == "/user-liste.html"){ ?>
				<li class="bActive"><a class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i> Comptes
					<span class="caret"></span></a>
					<ul class="dropdown-menu col-xs-12 col-md-12 col-lg-12" aria-labelledby="dropdownMenu1">
						<li class="col-xs-12 col-md-12 col-lg-12"><a class="btn btn-after-drop bDefault" href="/user-liste.html">Modifier / ajouter</a></li>
						<li class="col-xs-12 col-md-12 col-lg-12"><a class="btn btn-after-drop bDefault" href="/user-destroy.html">Déconnexion</a></li>
					</ul>
				</li>
			<?php }
	        elseif($urlUri != "/user-liste.html.html") { ?>
				<li class="bActive"><a class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i> Comptes
					<span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li><a class="btn btn-after-drop bDefault" href="/user-liste.html">Modifier / ajouter</a></li>
						<li><a class="btn btn-after-drop bDefault" href="/user-destroy.html">Déconnexion</a></li>
					</ul>
				</li>
	        <?php } 



