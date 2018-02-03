$( document ).ready(function() {


	var burger = Object.create(Burger);
	burger.init();

	var removeNavBarTop = Object.create(RemoveNavBarTop);
	removeNavBarTop.init();

	var donutTypeDemande = Object.create(DonutTypeDemande);
	donutTypeDemande.init();

	var graphActivite = Object.create(GraphActivite);
	graphActivite.init();
	
});