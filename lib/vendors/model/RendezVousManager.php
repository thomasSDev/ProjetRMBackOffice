<?php
namespace model;
 
use \fram\Manager;
use \entity\RendezVous;
 
abstract class RendezVousManager extends Manager
{
  /**
   * Méthode permettant d'ajouter un rendezVous.
   * @param $rendezVous le rendezVous à ajouter
   * @return void
   */
  abstract protected function add(RendezVous $rendezVous);
 
  /**
   * Méthode permettant d'enregistrer un rendezVous.
   * @param $rendezVous rendezVous le rendezVous à enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
   */
  public function save(RendezVous $rendezVous)
  {
    if ($rendezVous->isValid())
    {
      $rendezVous->isNew() ? $this->add($rendezVous) : $this->modify($rendezVous);
    }
    else
    {
      throw new \RuntimeException('le rendezVous doit être validé pour être enregistré');
    }
  }
 
  /**
   * Méthode renvoyant le nombre de rendezVous total.
   * @return int
   */
  abstract public function count();
  

  abstract public function countProchainsRDV();

  abstract public function countPrecedentRDV();
  /**
   * Méthode permettant de supprimer un rendezVous.
   * @param $id int L'identifiant du rendezVous à supprimer
   * @return void
   */
  abstract public function delete($id);
 
  /**
   * Méthode retournant une liste de rendezVous demandée.
   * @param $debut int le premier rendezVous à sélectionner
   * @param $limite int Le nombre de rendezVous à sélectionner
   * @return array la liste des rendezVous. Chaque entrée est une instance de rendezVous.
   */
  abstract public function getList($debut = -1, $limite = -1);
  /**
   * Méthode retournant une liste de rendezVous demandée ordonnées par date dans le sens du planning.
   * @param $debut int le premier rendezVous à sélectionner
   * @param $limite int Le nombre de rendezVous à sélectionner
   * @return array la liste des rendezVous. Chaque entrée est une instance de rendezVous.
   */
  abstract public function getListCalendrier($debut = -1, $limite = -1);
  /**
   * Méthode retournant un rendezVous précis.
   * @param $id int L'identifiant du rendezVous à récupérer
   * @return rendezVous le rendezVous demandé
   */
  abstract public function getUnique($id);
 
  /**
   * Méthode permettant de modifier un rendezVous.
   * @param $rendezVous le rendezVous à modifier
   * @return void
   */
  abstract protected function modify(RendezVous $rendezVous);


  abstract public function getListOf($client);
  
  abstract public function getListProchain($debut = -1, $limite = -1);

  abstract public function getListPrecedent($debut = -1, $limite = -1);

  /**
  * Méthode retournant la liste total des dates rendezVous.
  * @return rendezVous la liste des dates des rendez-vous
  */
  abstract public function getListDate();


  /*abstract public function getListPlanning();*/

  
}