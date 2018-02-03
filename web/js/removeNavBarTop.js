removeNavBarTop
var RemoveNavBarTop = {

	init : function(){
		this.downBar();
		$(function(){
		   $('#upNavBarTop').click(function(){
		      $('#navBarTop').toggle(), // AFFICHE ET CACHE A CHAQUE CLIQUE SUR LE BOUTTON
		      $('#upNavBarTop').toggle(),
		      $('#downNavBarTop').toggle()
		   });
		});	
	},
	downBar : function(){
		$('#downNavBarTop').click(function(){
		      $('#navBarTop').toggle(), // AFFICHE ET CACHE A CHAQUE CLIQUE SUR LE BOUTTON
		      $('#downNavBarTop').toggle(),
		      $('#upNavBarTop').toggle()
		});
	}	
	
}