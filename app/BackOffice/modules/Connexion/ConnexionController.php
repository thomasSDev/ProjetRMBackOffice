<?php
namespace app\BackOffice\modules\Connexion;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\User;
use \model\UserManager;
use \model\UserManagerPDO;
 
class ConnexionController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Connexion');
 

   
    if (($request->postExists('pseudo')) && ($request->postExists('password')) && ($request->postExists('mail')))
    {
      $mail = $request->postData('mail');
      $login = $request->postData('pseudo');
      $password = hash('sha256', $request->postData('password'));
   
      if($login && $password && $mail)
      {
        $manager = $this->managers->getManagerOf('User');
        $user = $manager->getUser($request->postData('mail'));


        if($user != null){
          if ($login == $user->pseudo() && ($password == $user->passe()) && ($mail == $user->mail()))
          {
            $this->app->users()->setFlash('<div class="alert alert-success" role="alert">Vous êtes connecté. Bienvenue '.$user->pseudo().'</div>');
            $this->app->users()->setAuthenticated(true);
            $this->app->httpResponse()->redirect('/');
          }
          else
          {
            $this->app->users()->setFlash('<div class="alert alert-danger" role="alert">Le pseudo ou le mot de passe est incorrect.</div>');
          }

        }
        else
          {
            $this->app->users()->setFlash('<div class="alert alert-danger" role="alert">Le pseudo ou le mot de passe est incorrect.</div>');
          }
        
      }
      else
      {
        $this->app->users()->setFlash('<div class="alert alert-danger" role="alert">Les champs ne sont pas renseignés.</div>');
      }
      
    }
  }
}