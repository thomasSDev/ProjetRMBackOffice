var Burger = {
	burger: false,
	burgerList : false,
	init : function(){
		this.endBurger();
		$(function(){
		   $('.burgerButton').click(function(){
		      $('.burgerListMini').toggle(), // AFFICHE ET CACHE A CHAQUE CLIQUE SUR LE BOUTTON
		      $('.burgerButtonEnd').toggle(),
		      $('.burgerButton').toggle()
		   });
		});	
	},
	endBurger : function(){
		$('.burgerButtonEnd').click(function(){
		      $('.burgerButton').toggle(), // AFFICHE ET CACHE A CHAQUE CLIQUE SUR LE BOUTTON
		      $('.burgerListMini').toggle(),
		      $('.burgerButtonEnd').toggle()
		});
	}	
	
	
}