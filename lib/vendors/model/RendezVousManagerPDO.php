<?php
namespace model;
 
use \entity\RendezVous;
use \utils\KeyValues;
 
class RendezVousManagerPDO extends RendezVousManager
{
  protected function add(RendezVous $rendezVous)
  {
    $request = $this->dao->prepare('INSERT INTO rdv SET  dateHeure = :dateHeure, typeIntervention = :typeIntervention, commentaire = :commentaire, idClient_Rdv = :idClient_Rdv');
 
    
    $request->bindValue(':dateHeure', $rendezVous->dateHeure());
    $request->bindValue(':commentaire', $rendezVous->commentaire());
    //$request->bindValue(':interventionEffectuee', $rendezVous->interventionEffectuee());
    $request->bindValue(':typeIntervention', $rendezVous->typeIntervention());
    $request->bindValue(':idClient_Rdv', $rendezVous->idClient_Rdv(), \PDO::PARAM_INT);

    $request->execute();


    $rendezVous->setId($this->dao->lastInsertId());
  }
 
  public function delete($id)
  {
    $this->dao->exec('DELETE FROM rdv WHERE id ='.(int) $id);
  }
 
 public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, dateHeure, typeIntervention, commentaire, interventionEffectuee, idClient_Rdv, dateAjout, dateModif  FROM rdv ORDER BY dateHeure DESC';
 
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\RendezVous');
 
    $listeRendezVous = $requete->fetchAll();
    
    foreach ($listeRendezVous as $rendezVous)
    {
      $rendezVous->setDateAjout(new \DateTime($rendezVous->dateAjout()));
      $rendezVous->setDateModif(new \DateTime($rendezVous->dateModif()));
      $rendezVous->setDateHeure(new \DateTime($rendezVous->dateHeure()));
    }

    $requete->closeCursor();
 
    return $listeRendezVous;
  }

  public function getListCalendrier($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, dateHeure, typeIntervention, commentaire, interventionEffectuee, idClient_Rdv, dateAjout, dateModif  FROM rdv ORDER BY dateHeure';
 
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\RendezVous');
 
    $listeRendezVous = $requete->fetchAll();
    
    foreach ($listeRendezVous as $rendezVous)
    {
      $rendezVous->setDateAjout(new \DateTime($rendezVous->dateAjout()));
      $rendezVous->setDateModif(new \DateTime($rendezVous->dateModif()));
      $rendezVous->setDateHeure(new \DateTime($rendezVous->dateHeure()));
    }

    $requete->closeCursor();
 
    return $listeRendezVous;
  }

  public function getListDate()
  {
    $sql = 'SELECT dateHeure  FROM rdv';
 
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\RendezVous');
 
    $listeDateRendezVous = $requete->fetchAll();
    
    foreach ($listeDateRendezVous as $dateRendezVous)
    {
      $dateRendezVous->setDateHeure(new \DateTime($dateRendezVous->dateHeure()));
    }

    $requete->closeCursor();
 
    return $listeDateRendezVous;
  }


  public function getListProchain($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, idClient_Rdv, dateHeure, typeIntervention, commentaire, interventionEffectuee, dateAjout, dateModif  FROM rdv WHERE dateHeure > CURDATE() ORDER BY dateHeure ';
 
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\RendezVous');
 
    $listeProchainsRDV = $requete->fetchAll();
  
    foreach ($listeProchainsRDV as $rendezVous)
    {
      $rendezVous->setDateAjout(new \DateTime($rendezVous->dateAjout()));
      $rendezVous->setDateModif(new \DateTime($rendezVous->dateModif()));
      $rendezVous->setDateHeure(new \DateTime($rendezVous->dateHeure()));
    }

    $requete->closeCursor();
 
    return $listeProchainsRDV;

  }

  public function getListPrecedent($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, dateHeure, typeIntervention, commentaire, interventionEffectuee, idClient_Rdv, dateAjout, dateModif  FROM rdv WHERE dateHeure < CURDATE() ORDER BY dateHeure DESC ';
 
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\RendezVous');
 
    $listeRendezVous = $requete->fetchAll();
    
    foreach ($listeRendezVous as $rendezVous)
    {
      $rendezVous->setDateAjout(new \DateTime($rendezVous->dateAjout()));
      $rendezVous->setDateModif(new \DateTime($rendezVous->dateModif()));
      $rendezVous->setDateHeure(new \DateTime($rendezVous->dateHeure()));
    }
    
    $requete->closeCursor();
 
    return $listeRendezVous;
  }

  /*public function getListPlanning()
  {
    $sql = 'select commentaire, dateAjout, dateHeure, dateModif, id, idClient_Rdv, interventionEffectuee, typeIntervention, dayofweek(dateHeure) as dofWeek from rdv where week(dateHeure) = week(now()) order by dateHeure ASC';
 
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\RendezVous');
 
    $listeRendezVous = $requete->fetchAll();

    $retourListe = array();



    foreach ($listeRendezVous as $rendezVous)
    {
      if(!containKey($retourListe, $rendezVous->dateOfWeek()-1)){
        array_push($retourListe, new KeyValues($rendezVous->dateOfWeek()-1));
      }
      getKeyValuesByKey($retourListe, $rendezVous->dateOfWeek()-1)->add($rendezVous);
    }

    $requete->closeCursor();
 
    return $retourListe;
  }

  protected function containKey($array, $k)
  {
    foreach ($array as $key) {
      if($key == $k){
        return true;
      }
    }
    return false;
  }

  protected function getKeyValuesByKey($array, $k){
    foreach ($array as $keyValues) {
      if($keyValues->getKey() == $k){
        return $keyValues;
      }
    }
    return null;
  }
*/
  public function getListOf($client)
  {
    if (!ctype_digit($client))
    {
      throw new \InvalidArgumentException('L\'identifiant du client passé doit être un nombre entier valide');
    }
 
    $request = $this->dao->prepare('SELECT id, dateHeure,typeIntervention, commentaire, interventionEffectuee,  dateAjout, dateModif, idClient_Rdv  FROM rdv WHERE idClient_Rdv = :idClient_Rdv');
    $request->bindValue(':idClient_Rdv', $client, \PDO::PARAM_INT);
    $request->execute();
 
    $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\RendezVous');
 
    $rendezVous = $request->fetchAll();
 
    return $rendezVous;
  }

  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM rdv')->fetchColumn();
  }
  public function countProchainsRDV()
  {
    return $this->dao->query('SELECT COUNT(*) FROM rdv WHERE dateHeure > CURDATE()')->fetchColumn();
  }
  public function countPrecedentRDV()
  {
    return $this->dao->query('SELECT COUNT(*) FROM rdv WHERE dateHeure < CURDATE()')->fetchColumn();
  }
  protected function modify(RendezVous $rendezVous)
  {
    $request = $this->dao->prepare('UPDATE rdv SET id = :id, dateHeure = :dateHeure, typeIntervention = :typeIntervention, commentaire = :commentaire, interventionEffectuee = :interventionEffectuee, idClient_Rdv = :idClient_Rdv WHERE id = :id');
 
    $request->bindValue(':dateHeure', $rendezVous->dateHeure(), \PDO::PARAM_INT);
    $request->bindValue(':typeIntervention', $rendezVous->typeIntervention());
    $request->bindValue(':commentaire', $rendezVous->commentaire());
    $request->bindValue(':interventionEffectuee', $rendezVous->interventionEffectuee());
    $request->bindValue(':idClient_Rdv', $rendezVous->idClient_Rdv());
    $request->bindValue(':id', $rendezVous->id(), \PDO::PARAM_INT);
 
    $request->execute();
  }
 
  public function get($id)
  {
    $request = $this->dao->prepare('SELECT id, dateHeure,typeIntervention, commentaire, interventionEffectuee,  dateAjout, dateModif, idClient_Rdv  FROM rdv WHERE id = :id');
    $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $request->execute();
 
    $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\RendezVous');
 
    return $request->fetch();
  }
    public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT id, dateHeure,typeIntervention, commentaire, interventionEffectuee,  dateAjout, dateModif, idClient_Rdv  FROM rdv WHERE id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
 
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\RendezVous');
 
    if ($rendezVous = $requete->fetch())
    {
      $rendezVous->setDateAjout(new \DateTime($rendezVous->dateAjout()));
 
      return $rendezVous;
    }
 
    return null;
  }
 
  public function interventionEffectuee($id)
  {
    $request = $this->dao->prepare('UPDATE rdv SET interventionEffectuee = 1 WHERE id ='.(int) $id);
 
    $request->execute();
  }
  
  public function getDemandeNonEffectuee($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, dateHeure,typeIntervention, commentaire, interventionEffectuee,  dateAjout, dateModif, idClient_Rdv  FROM rdv WHERE interventionEffectuee = 0';

    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\RendezVous');
 
    $listeInterventionEffectuee = $requete->fetchAll();

 
    $requete->closeCursor();
 
    return $listeInterventionEffectuee;
  }
  public function countNonEffectuees()
  {
    return $this->dao->query('SELECT COUNT(*) FROM rdv WHERE interventionEffectuee = 0')->fetchColumn();
  }

  public function save(RendezVous $rendezVous)
  {
    if ($rendezVous->isValid())
    {
      $rendezVous->isNew() ? $this->add($rendezVous) : $this->modify($rendezVous);
    }
    else
    {
      throw new \RuntimeException('le rendez-vous doit être validée pour être enregistrée');
    }
  }
 
}