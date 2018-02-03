<?php
namespace model;
 
use \fram\Manager;
use \entity\Message;
 
abstract class MessageManager extends Manager
{
  /**
   * Méthode permettant d'ajouter un message.
   * @param $message Le message à ajouter
   * @return void
   */
  abstract protected function add(Message $message);
 
  /**
   * Méthode permettant de supprimer un message.
   * @param $id L'identifiant du message à supprimer
   * @return void
   */
  abstract public function delete($id);
 
  /**
   * Méthode permettant de supprimer tous les messages liés à un client
   * @param $client L'identifiant de le client dont les messages doivent être supprimés
   * @return void
   */
  abstract public function deleteFromClient($client);
 
  /**
   * Méthode permettant d'enregistrer un message.
   * @param $message Le message à enregistrer
   * @return void
   */
  public function save(Message $message)
  {
    if ($message->isValid())
    {
      $message->isNew() ? $this->add($message) : $this->modify($message);
    }
    else
    {
      throw new \RuntimeException('Le message doit être validé pour être enregistré');
    }
  }
 
  /**
   * Méthode permettant de récupérer une liste de messages.
   * @param $client le client sur laquelle on veut récupérer les messages
   * @return array
   */
  abstract public function getListOf($client);
   
  
    
  /**
   * Méthode permettant de modifier un message.
   * @param $message Le message à modifier
   * @return void
   */
  abstract protected function modify(Message $message);
 
   /**
   * Méthode permettant d'obtenir un message spécifique.
   * @param $id L'identifiant du message
   * @return Message
   */
  abstract public function getUnique($id);
  /**
   * Méthode permettant de signaler un message.
   * @param $message le message à signaler
   * @return Message
   */
  abstract public function demandeTraitee($id);

    /**
   * Méthode permettant d'obtenir la liste des demandes non traitées.
   * @param $debut int le premièr message à sélectionner
   * @param $limite int Le nombre de messages à sélectionner
   * @return array la liste des messages. Chaque entrée est une instance de messages.
   */
  abstract public function getDemandeNonTraitee($debut = -1, $limite = -1);

    /**
  * Méthode permettant d'obtenir le nombre des demandes traitées.
   * @return array la liste des messages. Chaque entrée est une instance de messages.
   */
  abstract public function countNonTraitee();

  /**
  * Méthode permettant d'obtenir la liste des demandes non traitées.
   * @param $debut int le premièr message à sélectionner
   * @param $limite int Le nombre de messages à sélectionner
   * @return array la liste des messages. Chaque entrée est une instance de messages.
   */
  abstract public function getList($debut = -1, $limite = -1);
  /**
  * Méthode permettant d'obtenir le nombre des demandes traitées.
   * @return array la liste des messages. Chaque entrée est une instance de messages.
   */
  abstract public function count();

  /**
  * Méthode permettant d'obtenir le nombre des demandes traitées filtrées par type de demandes.
   * @return array la liste des messages. Chaque entrée est une instance de messages.
   */
  abstract public function countParTypeDemande($typeDemande);  

  abstract public function countDevis();

  abstract public function countDepannage();

  abstract public function countRamonnage();

  abstract public function countInstallation();

  abstract public function getListTotalMessages();


  /**
   * Méthode permettant d'ajouter un message.
   * @param $message Le message à ajouter
   * @return void
   */
  abstract protected function insert(Message $message);

}