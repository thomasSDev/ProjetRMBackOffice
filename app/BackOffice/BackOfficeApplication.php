<?php
namespace app\BackOffice;
 
use \fram\Application;
 
class BackOfficeApplication extends Application
{
  public function __construct()
  {
    parent::__construct();
 
    $this->name = 'BackOffice';
  }
 
  public function run()
  {
    if ($this->users->isAuthenticated())
    {
      $controller = $this->getController();
    }
    else
    {
      $controller = new modules\Connexion\ConnexionController($this, 'Connexion', 'index');
    }
 
    $controller->execute();
    $this->httpResponse->setPage($controller->page());

    $this->httpResponse->send();
  }
}