<?php
namespace app\BackOffice\modules\Dashboard;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\Client;
use \entity\Message;
use \entity\RendezVous;
use \formBuilder\MessageFormBuilder;
use \formBuilder\RendezVousFormBuilder;
use \formBuilder\ClientFormBuilder;
use \fram\FormHandler;
 
class DashboardController extends BackController
{
 
  public function executeDashboard(HTTPRequest $request)
  {
    //liste des messages non traités
    $this->page->addVar('title', 'Liste des demandes en attente');
 
    $manager = $this->managers->getManagerOf('Message');

    $messages = $manager->getDemandeNonTraitee();

    //liste des clients par message non traité
    $i = 0;
    //var_dump($messages);
    foreach($messages as $message)
    {
      $client = $this->managers->getManagerOf('Client')->getUnique($message['idClient']);
      $messages[$i]->client = $client;
      $i++;
      
      
    }

    $this->page->addVar('listeDemandesNonTraitees', $messages);

    $this->page->addVar('nombreDemandes', $manager->countNonTraitee());

    //count messages par type de demande
    
    $this->page->addVar('nombreDemandesDevis', $manager->countDevis());
    $this->page->addVar('nombreDemandesDepannage', $manager->countDepannage());
    $this->page->addVar('nombreDemandesRamonnage', $manager->countRamonnage());
    $this->page->addVar('nombreDemandesInstallation', $manager->countInstallation());
    $this->page->addVar('scriptData', $scriptData = Array(
                                                    'Devis' => $manager->countDevis(),
                                                    'Depannage' => $manager->countDepannage(),
                                                    'Installation' => $manager->countRamonnage(),
                                                    'Ramonage' => $manager->countInstallation()
                                                    )
                        );
    
    $this->page->addVar('title', 'Liste des prochains rendez-vous');

    $manager = $this->managers->getManagerOf('RendezVous');

    //Liste des dates de rendez-vous
    $this->page->addVar('listeDatesRendezVous', $manager->getListDate());
    
    //Liste des prochains rendez-vous 
    $elementsPerPage = $this->app->config()->get('nombre_elements_extrait');

    $rendezVousProchains = $manager->getListProchain(0, $elementsPerPage);

    $i = 0;

    foreach($rendezVousProchains as $rdvProchain)
    {

      $client = $this->managers->getManagerOf('Client')->getUnique($rdvProchain['idClient_Rdv']);
      $rendezVousProchains[$i]->client = $client;
      $i++;
      
      
    }

   
    $this->page->addVar('listeProchainsRDV', $rendezVousProchains);


    $this->page->addVar('nombreProchainsRDV', $manager->countProchainsRDV());

  }


}
