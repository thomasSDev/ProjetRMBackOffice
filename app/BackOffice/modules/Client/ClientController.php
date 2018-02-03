<?php
namespace app\BackOffice\modules\Client;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\Client;
use \entity\Message;
use \formBuilder\MessageFormBuilder;
use \formBuilder\ClientFormBuilder;
use \fram\FormHandler;
 
class ClientController extends BackController
{
  public function executeDeleteClient(HTTPRequest $request)
  {
    $clientId = $request->getData('id');
 
    $this->managers->getManagerOf('Client')->delete($clientId);
    $this->managers->getManagerOf('Message')->deleteFromClient($clientId);
 
    $this->app->users()->setFlash('<div class="alert alert-danger" role="alert">le client a bien été supprimée !</div>');
 
    $this->app->httpResponse()->redirect('/clients-liste.html');
  }
 
  public function executeIndex(HTTPRequest $request)
  {
    //liste des client
    $this->page->addVar('title', 'Liste des demandes en attente');
 
    $manager = $this->managers->getManagerOf('Message');

    $messages = $manager->getDemandeNonTraitee();
    $i = 0;
    
    foreach($messages as $message)
    {
      $client = $this->managers->getManagerOf('Client')->getUnique($message['idClient']);
      $messages[$i]['client'] = $client;
      $i++;
    }

    $this->page->addVar('listeDemandesNonTraitees', $messages);

    $this->page->addVar('nombreDemandes', $manager->countNonTraitee());

  }
  public function executeListeClients(HTTPRequest $request)
  {
    //liste des client
    $this->page->addVar('title', 'Gestion des client');
 
    $manager = $this->managers->getManagerOf('Client');
    
    //pagination
    
    $elementsPerPage = $this->app->config()->get('nombre_elements');
    $totalElements = $manager->count();
    $nbPages = ceil($totalElements/$elementsPerPage);

    if($request->getData('page') > 0 && $request->getData('page') <= $nbPages)
    {
      $currentPage = $request->getData('page');
    }
    else
    {
      $currentPage = 1;
    }


    $this->page->addVar('listeClient', $manager->getList(($currentPage-1)*$elementsPerPage, $elementsPerPage));
    $this->page->addVar('nombreClient', $totalElements);
    $this->page->addVar('nbPages', $nbPages);
    $this->page->addVar('currentPage', $currentPage);

    if($request->postData('term'))
    {
      $this->page->addVar('listeRechercheClient', $manager->rechercheClient());
    }
    
    $getRecherche = $request->getData('recherche');
    $arrayClients = $manager->getListParNom($getRecherche);
    $this->page->addVar('getRecherche', $getRecherche);
    $this->page->addVar('arrayClients', $arrayClients);

  }
  
  public function executeDetailsClient(HTTPRequest $request)
  {
    $client = $this->managers->getManagerOf('Client')->getUnique($request->getData('id'));
 
    if (empty($client))
    {
      $this->app->httpResponse()->redirect404();
    }
    $this->page->addVar('client', $client);    
    
    $this->page->addVar('messages', $this->managers->getManagerOf('Message')->getListOf($client->id()));

    $this->page->addVar('rendezVous', $this->managers->getManagerOf('RendezVous')->getListOf($client->id()));
  }

  public function executeInsertClient(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Ajout d\'un client');
  }

  
  public function executeUpdateClient(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Modification d\'un client');
  }

  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $client = new Client([
        'nom' => $request->postData('nom'),
        'prenom' => $request->postData('prenom'),
        'adresse' => $request->postData('adresse'),
        'cp' => $request->postData('cp'),
        'ville' => $request->postData('ville'),
        'tel' => $request->postData('tel'),
        'mail' => $request->postData('mail')
      ]);
 
      if ($request->getExists('id'))
      {
        $client->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant du client est transmis si on veut le modifier
      if ($request->getExists('id'))
      {
        $client = $this->managers->getManagerOf('Client')->getUnique($request->getData('id'));
      }
      else
      {
        $client = new Client;
      }
    }
  
    $formBuilder = new ClientFormBuilder($client);
    $formBuilder->build();
  
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Client'), $request);
 
    if ($formHandler->process())
    {
      $this->app->users()->setFlash($client->isNew() ? '<div class="alert alert-success" role="alert">Le Client a bien été ajoutée !</div>' : '<div class="alert alert-success" role="alert">Le client a bien été modifiée !</div>');
 
      $this->app->httpResponse()->redirect('/clients-liste.html');
    }
 
    $this->page->addVar('form', $form->createView());
  }
}
