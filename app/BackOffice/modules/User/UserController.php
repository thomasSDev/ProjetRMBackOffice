<?php
namespace app\BackOffice\modules\User;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\User;
use \formBuilder\UserFormBuilder;
use \fram\FormHandler;
 
class UserController extends BackController
{

  public function executeSessionDestroy()
  {
    session_destroy();
  }
  public function executeInsert(HTTPRequest $request)
  {

    $this->processForm($request);

    $this->page->addVar('title', 'Ajout d\'un compte');

  }
  public function executeListeUsers(HTTPRequest $request)
  {
    //liste des comptes admin
    $this->page->addVar('title', 'Gestion des comptes administrateur');
 
    $manager = $this->managers->getManagerOf('User');
 
    $this->page->addVar('listeUsers', $manager->getList());
    $this->page->addVar('nombreUsers', $manager->count());

  }

  public function executeDeleteUser(HTTPRequest $request)
  {
    $this->managers->getManagerOf('User')->deleteUser($request->getData('id'));
  
    $this->app->users()->setFlash('<div class="alert alert-success" role="alert">Le compte a bien été supprimé !</div>');
 
    $this->app->httpResponse()->redirect('/user-liste.html');
  }
  public function executeUpdateUser(HTTPRequest $request)
  {
    $user = $this->managers->getManagerOf('User')->getUnique($request->getData('id'));
    $this->processForm($request);
    $this->page->addVar('user', $user);
    $this->page->addVar('title', 'Modification du compte');
  }
 
  public function processForm(HTTPRequest $request)
  {
    
    if ($request->method() == 'POST')
    {
        $passe = $request->postData('passe');
        $user = new User([
        'mail' => $request->postData('mail'),
        'pseudo' => $request->postData('pseudo'),
        'passe' => hash('sha256', $passe),
        ]);
  
    
        if ($request->getExists('id'))
        {
          $user->setId($request->getData('id'));
        }

    }
    else
    {
      // L'identifiant du compte est transmis si on veut le modifier
      if ($request->getExists('id'))
      {
        $user = $this->managers->getManagerOf('User')->getUnique($request->getData('id'));
      }
      else
      {
        $user = new User;
        
      }
    }
    
    $formBuilder = new UserFormBuilder($user);
    $formBuilder->build();
  
    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('User'), $request);

    
    $passe = $request->postData('passe');
    $passeConfirm = $request->postData('passeConfirm');
    

      
    if(($request->postData('passe')) == ($request->postData('passeConfirm')))
    {
      $longueur = strlen($passe);
      if($longueur >= 8)
      {
        if($user->isNew())
        {
            $mail = $this->managers->getManagerOf('User')->getMail($request->postData('mail'));

            if($mail != null)
            {
              $this->app->users()->setFlash('<div class="alert alert-danger" role="alert">Cette adresse e-mail existe déjà, veuillez entrer une adresse valide.</div> ');
              $this->app->httpResponse()->redirect('/user-liste.html');
            }

            else
            {
              if ($formHandler->process())
              {
                $this->app->users()->setFlash($user->isNew() ? '<div class="alert alert-success" role="alert">Le compte a bien été ajoutée !</div>' : '<div class="alert alert-success" role="alert">Les données du compte ont bien été modifiées !</div>');
           
                $this->app->httpResponse()->redirect('/user-liste.html');
              }
         
              $this->page->addVar('form', $form->createView());
            }
            
        }
        if ($formHandler->process())
        {
          
            $this->app->users()->setFlash($user->isNew() ? '<div class="alert alert-success" role="alert">Le compte a bien été ajoutée !</div>' : '<div class="alert alert-success" role="alert">Le mot de passe a bien été modifiée !</div>');
       
            $this->app->httpResponse()->redirect('/user-liste.html');
          
          
        }
     
        $this->page->addVar('form', $form->createView());
      }
    
      else
        {
          $this->app->users()->setFlash('<div class="alert alert-danger" role="alert">Entrez un mot de passe de 8 caractères minimum.</div> ');
        }
    }
    else
    {
      $this->app->users()->setFlash('<div class="alert alert-danger" role="alert">Confirmez votre mot de passe.</div> ');
  
    }
    
    
  }
}
