<?php
namespace model;
 
use \fram\Manager;
use \entity\Client;
 
abstract class ClientManager extends Manager
{
  /**
   * Méthode permettant d'ajouter une client.
   * @param $client le client à ajouter
   * @return void
   */
  abstract protected function add(Client $client);
 
  /**
   * Méthode permettant d'enregistrer une client.
   * @param $client client le client à enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
   */
  public function save(Client $client)
  {
    if ($client->isValid())
    {
      $client->isNew() ? $this->add($client) : $this->modify($client);
    }
    else
    {
      throw new \RuntimeException('le client doit être validée pour être enregistrée');
    }
  }
 
  /**
   * Méthode renvoyant le nombre de client total.
   * @return int
   */
  abstract public function count();
 
  /**
   * Méthode permettant de supprimer une client.
   * @param $id int L'identifiant du client à supprimer
   * @return void
   */
  abstract public function delete($id);
 
  /**
   * Méthode retournant une liste de client demandée.
   * @param $debut int le première client à sélectionner
   * @param $limite int Le nombre de client à sélectionner
   * @return array la liste des clients. Chaque entrée est une instance de client.
   */
  abstract public function getList($debut = -1, $limite = -1);

  /**
   * Méthode retournant une liste de client filtrée par nom.
   * @param $nom le nom correspondant aux nom de la table
   * @return array la liste des clients. Chaque entrée est une instance de client.
   */
  abstract public function getListParNom($nom);
  /**
   * Méthode retournant un client précis.
   * @param $id int L'identifiant du client à récupérer
   * @return client le client demandé
   */
  abstract public function getUnique($id);
  
  /**
   * Méthode retournant un client précis.
   * @param $mail L'identifiant du client à récupérer
   * @return client le client demandé
   */
  abstract public function getByMail($mail);
  /**
   * Méthode permettant de modifier une client.
   * @param $client le client à modifier
   * @return void
   */
  abstract protected function modify(Client $client);

  /**
   * Méthode retournant un client précis par champ de recherche.
   * @param $term terme contenu dans le nom du client à récupérer
   * @return client le client demandé
   */

  abstract public function rechercheClient($term, $donnee, $array);

}