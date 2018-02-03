<?php
namespace app\WebService;
 
use \fram\Application;
 
class WebServiceApplication extends Application
{
  public function __construct()
  {
    parent::__construct();
 
    $this->name = 'WebService';
  }
 
  public function run()
  {
    $controller = $this->getController();
    $controller->execute();
 
    $this->httpResponse->setPage($controller->page());
    $this->httpResponse->send();
  }
}