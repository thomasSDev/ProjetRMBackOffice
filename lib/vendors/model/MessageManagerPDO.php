<?php
namespace model;
 
use \entity\Message;
 
class MessageManagerPDO extends MessageManager
{
  protected function add(Message $message)
  {
    $q = $this->dao->prepare('INSERT INTO message SET  typeIntervention = :typeIntervention, typeDemande = :typeDemande,  message = :message, disponibilite = :disponibilite, demandeTraitee = :demandeTraitee, idClient = :idClient,  dateDemande = NOW()');
 
    $q->bindValue(':typeIntervention', $message->typeIntervention(), \PDO::PARAM_INT);
    $q->bindValue(':typeDemande', $message->typeDemande());
    $q->bindValue(':message', $message->message());
    $q->bindValue(':disponibilite', $message->disponibilite());
    $q->bindValue(':demandeTraitee', $message->demandeTraitee());
    $q->bindValue(':idClient', $message->idClient());
 
    $q->execute();
 
    $message->setId($this->dao->lastInsertId());
  }

  public function getUnique($id)
  {
    $q = $this->dao->prepare('SELECT id, idClient, typeIntervention, typeDemande, message, disponibilite, demandeTraitee, dateDemande  FROM message WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);

    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Message');
    
    return $q->fetch();


  }

  public function getListOf($client)
  {
    if (!ctype_digit($client))
    {
      throw new \InvalidArgumentException('L\'identifiant du client passé doit être un nombre entier valide');
    }
 
    $q = $this->dao->prepare('SELECT id, idClient, typeIntervention, typeDemande, message, disponibilite, demandeTraitee, dateDemande, dateAjout, dateModif FROM message WHERE idClient = :idClient');
    $q->bindValue(':idClient', $client, \PDO::PARAM_INT);
    $q->execute();
 
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Message');
 
    $message = $q->fetchAll();
 
    /*foreach ($message as $message)
    {
      $message->setDateAjout(new \DateTime($message->dateAjout()));
      $message->setDateModif(new \DateTime($message->dateModif()));
      $message->setDateDemande(new \DateTime($message->dateDemande()));
    }*/
 
    return $message;
  }

  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, idClient, typeIntervention, typeDemande, message, disponibilite, demandeTraitee, dateDemande  FROM message ORDER BY dateDemande DESC';

    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Message');
 
    $listeMessage = $requete->fetchAll();

    foreach ($listeMessage as $message)
    {
      $message->setDateAjout(new \DateTime($message->dateAjout()));
      $message->setDateModif(new \DateTime($message->dateModif()));
      $message->setDateDemande(new \DateTime($message->dateDemande()));
    }

    $requete->closeCursor();

    
    return $listeMessage;
  }

  public function getListTotalMessages()
  {
    $sql = 'SELECT id, idClient, typeIntervention, typeDemande, message, disponibilite, demandeTraitee, dateDemande  FROM message';
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Message');
 
    $listeTotalMessages = $requete->fetchAll();

    foreach ($listeTotalMessages as $message)
    {
      $message->setDateAjout(new \DateTime($message->dateAjout()));
      $message->setDateModif(new \DateTime($message->dateModif()));
      $message->setDateDemande(new \DateTime($message->dateDemande()));
    }

    $requete->closeCursor();

    
    return $listeTotalMessages;
  }

  public function getDemandeNonTraitee($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, idClient, typeIntervention, typeDemande, message, disponibilite, demandeTraitee, dateDemande  FROM message WHERE demandeTraitee = 0';

    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Message');
 
    $listeDemandesNonTraitees = $requete->fetchAll();

    foreach ($listeDemandesNonTraitees as $message)
    {
      $message->setDateAjout(new \DateTime($message->dateAjout()));
      $message->setDateModif(new \DateTime($message->dateModif()));
      $message->setDateDemande(new \DateTime($message->dateDemande()));
    }

    $requete->closeCursor();

    
    return $listeDemandesNonTraitees;
  }

  public function demandeTraitee($id)
  {
    $q = $this->dao->prepare('UPDATE message SET demandeTraitee = 1 WHERE id ='.(int) $id);
 
    $q->execute();
  }

  public function demandeNonTraitee($id)
  {
    $q = $this->dao->prepare('UPDATE message SET demandeTraitee = 0 WHERE id ='.(int) $id);
 
    $q->execute();
  }
  
  protected function modify(Message $message)
  {
    $q = $this->dao->prepare('UPDATE message SET typeIntervention = :typeIntervention, typeDemande = :typeDemande,  message = :message, disponibilite = :disponibilite, demandeTraitee = :demandeTraitee, idClient = :client WHERE id = :id');
 
    $q->bindValue(':typeIntervention', $message->typeIntervention(), \PDO::PARAM_INT);
    $q->bindValue(':typeDemande', $message->typeDemande());
    $q->bindValue(':message', $message->message());
    $q->bindValue(':disponibilite', $message->disponibilite());
    $q->bindValue(':demandeTraitee', $message->demandeTraitee());
    $q->bindValue(':client', $message->client());
    $q->bindValue(':id', $message->id(), \PDO::PARAM_INT);
 
    $q->execute();
  }
 

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM message WHERE id ='.(int) $id);
  }
 
  public function deleteFromClient($client)
  {
    $this->dao->exec('DELETE FROM message WHERE idClient ='.(int) $client);
  }

  public function countNonTraitee()
  {
    return $this->dao->query('SELECT COUNT(*) FROM message WHERE demandeTraitee = 0')->fetchColumn();
  }

  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM message')->fetchColumn();
  }

  public function countParTypeDemande($typeDemande)
  {
    return $this->dao->query('SELECT COUNT(*) FROM message WHERE typeDemande ='.$typeDemande)->fetchColumn();
  }
  
  public function countDepannage()
  {
    return $this->dao->query('SELECT COUNT(*) FROM message WHERE typeDemande ="Depannage"')->fetchColumn();

  }

  public function countDevis()
  {
    return $this->dao->query('SELECT COUNT(*) FROM message WHERE typeDemande ="Devis"')->fetchColumn();

  }

  public function countRamonnage()
  {
    return $this->dao->query('SELECT COUNT(*) FROM message WHERE typeDemande ="Ramonnage"')->fetchColumn();

  }

  public function countInstallation()
  {
    return $this->dao->query('SELECT COUNT(*) FROM message WHERE typeDemande ="Installation"')->fetchColumn();

  }

  public function save(Message $message)
  {
    if ($message->isValid())
    {
      $message->isNew() ? $this->add($message) : $this->modify($message);
    }
    else
    {
      throw new \RuntimeException('le message doit être validée pour être enregistrée');
    }
  }

  public function insert(Message $message)
  {
    $q = $this->dao->prepare('INSERT INTO message SET  typeIntervention = :typeIntervention, typeDemande = :typeDemande,  message = :message, disponibilite = :disponibilite, demandeTraitee = :demandeTraitee, idClient = :idClient,  dateDemande = NOW()');
 
    $q->bindValue(':typeIntervention', $message->typeIntervention(), \PDO::PARAM_INT);
    $q->bindValue(':typeDemande', $message->typeDemande());
    $q->bindValue(':message', $message->message());
    $q->bindValue(':disponibilite', $message->disponibilite());
    $q->bindValue(':demandeTraitee', $message->demandeTraitee());
    $q->bindValue(':idClient', $message->idClient());
 
    $q->execute();
 
    $message->setId($this->dao->lastInsertId());
  }
 
}