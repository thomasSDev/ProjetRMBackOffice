<?php
namespace app\BackOffice\modules\Message;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\Client;
use \entity\Message;
use \formBuilder\MessageFormBuilder;
use \formBuilder\ClientFormBuilder;
use \fram\FormHandler;
 
class MessageController extends BackController
{
  public function executeDeleteMessage(HTTPRequest $request)
  {
    $messageId = $request->getData('id');
 
    $this->managers->getManagerOf('Message')->delete($messageId);

 
    $this->app->users()->setFlash('<div class="alert alert-danger" role="alert">le message a bien été supprimée !</div>');
 
    $this->app->httpResponse()->redirect('/');
  }
 
  public function executeListeMessages(HTTPRequest $request)
  {
    //liste des messages
    $this->page->addVar('title', 'Gestion des messages');
 
    $manager = $this->managers->getManagerOf('Message');
 
    /*$messages = $manager->getList();*/

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
    

    $messages = $manager->getList(($currentPage-1)*$elementsPerPage, $elementsPerPage);
    //liste des clients par message
    $i = 0;
    foreach($messages as $message)
    {
      $client = $this->managers->getManagerOf('Client')->getUnique($message['idClient']);
      $messages[$i]->client = $client;
      $i++;
    }
    $this->page->addVar('listeMessages', $messages);
    $this->page->addVar('nombreMessages', $totalElements);
    $this->page->addVar('nbPages', $nbPages);
    $this->page->addVar('currentPage', $currentPage);



  }

  public function executeDetailsMessage(HTTPRequest $request)
  {
    $message = $this->managers->getManagerOf('Message')->getUnique($request->getData('id'));
 
    if (empty($message))
    {
      $this->app->httpResponse()->redirect404();
    }
    $this->page->addVar('message', $message);

    $client = $this->managers->getManagerOf('Client')->getUnique($message['idClient']);
    $this->page->addVar('client', $client);

    if($message['demandeTraitee'] == 1)
            {
              $traite = '<span style=color:green>Message traité</span>';
              $boutonTraite = 'Définir le message comme non traité';
            }
            else
            {
              $traite = '<span style=color:red>Message non traité</span>';
              $boutonTraite = 'Définir le message comme traité';
            }
    $this->page->addVar('traite', $traite);
    $this->page->addVar('boutonTraite', $boutonTraite);        

  }

  
  public function executeUpdateMessage(HTTPRequest $request)
  {
    
 
    $message = $request->getData('id');
 
    $this->managers->getManagerOf('Message')->demandeTraitee($message);
    $this->app->users()->setFlash('<div class="alert alert-success" role="alert">le message est considéré comme traité !</div>');
    $this->app->httpResponse()->redirect('/');

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
 
      $this->app->httpResponse()->redirect('/');
    }
 
    $this->page->addVar('form', $form->createView());
  }
}
