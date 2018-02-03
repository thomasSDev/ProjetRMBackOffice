var GraphActivite = {
    init : function(){
        Morris.Bar({
            element: 'graphActivite',
            data: [
                { 'Nombre de rendez-vous' : 'Jan.', value : scriptDataMois.janvierCount },
                { 'Nombre de rendez-vous' : 'Fév.', value : scriptDataMois.fevrierCount },
                { 'Nombre de rendez-vous' : 'Mar.', value : scriptDataMois.marsCount },
                { 'Nombre de rendez-vous' : 'Avr.', value : scriptDataMois.avrilCount  },
                { 'Nombre de rendez-vous' : 'Mai', value : scriptDataMois.maiCount  },
                { 'Nombre de rendez-vous' : 'Jui.', value : scriptDataMois.juinCount  },
                { 'Nombre de rendez-vous' : 'Juil.', value : scriptDataMois.juilletCount  },
                { 'Nombre de rendez-vous' : 'Août', value : scriptDataMois.aoutCount  },
                { 'Nombre de rendez-vous' : 'Sept.', value : scriptDataMois.septembreCount  },
                { 'Nombre de rendez-vous' : 'Oct.', value : scriptDataMois.octobreCount  },
                { 'Nombre de rendez-vous' : 'Nov.', value : scriptDataMois.novembreCount  },
                { 'Nombre de rendez-vous' : 'Déc.', value : scriptDataMois.decembreCount  }
            ],
            xkey: 'Nombre de rendez-vous',
            ykeys: ['value'],
            labels: ['Nombre de rendez-vous']
        });
    } 
}
        
