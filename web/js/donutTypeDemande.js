var DonutTypeDemande = {
    init : function(){
        Morris.Donut({
            element: 'donutsTypeDemande',
            data: [
                { 'label' : 'Dépannage', value : scriptData.Depannage },
                { 'label' : 'Devis', value : scriptData.Devis },
                { 'label' : 'Installation', value : scriptData.Installation },
                { 'label' : 'Ramonage', value : scriptData.Ramonage }
            ]
        });    
    } 
}
        
