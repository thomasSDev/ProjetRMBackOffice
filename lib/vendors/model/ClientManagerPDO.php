<?php
namespace model;
 
use \entity\Client;
 
class ClientManagerPDO extends ClientManager
{
  protected function add(Client $client)
  {
    $request = $this->dao->prepare('INSERT INTO client SET nom = :nom, prenom = :prenom, adresse = :adresse, cp = :cp, ville = :ville, tel = :tel, mail = :mail, dateAjout = NOW(), dateModif = NOW()');
 
    $request->bindValue(':nom', $client->nom());
    $request->bindValue(':prenom', $client->prenom());
    $request->bindValue(':adresse', $client->adresse());
    $request->bindValue(':cp', $client->cp());
    $request->bindValue(':ville', $client->ville());
    $request->bindValue(':tel', $client->tel());
    $request->bindValue(':mail', $client->mail()); 
    $request->execute();
  }
 
  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) AS nbElementsRequest FROM client')->fetchColumn();
  }
 
  public function delete($id)
  {
    $this->dao->exec('DELETE FROM client WHERE id = '.(int) $id);
  }
 
  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, nom, prenom, adresse, cp, ville, tel, mail, dateAjout, dateModif FROM client ORDER BY nom';
 
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $request = $this->dao->query($sql);
    $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Client');
 
    $listeClient = $request->fetchAll();
 
    foreach ($listeClient as $client)
    {
      $client->setDateAjout(new \DateTime($client->dateAjout()));
      $client->setDateModif(new \DateTime($client->dateModif()));
    }
 
    $request->closeCursor();
 
    return $listeClient;
  }
  
  public function getListParNom($nom)
  {
    $sql = "SELECT id, nom, prenom, adresse, cp, ville, tel, mail, dateAjout, dateModif FROM client WHERE nom LIKE '%$nom%'";
 
    $request = $this->dao->query($sql);
    $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Client');
 
    $listeClient = $request->fetchAll();
 
    foreach ($listeClient as $client)
    {
      $client->setDateAjout(new \DateTime($client->dateAjout()));
      $client->setDateModif(new \DateTime($client->dateModif()));
    }
 
    $request->closeCursor();
 
    return $listeClient;
  }
  
  public function getUnique($id)
  {
    $request = $this->dao->prepare('SELECT id, nom, prenom, adresse, cp, ville, tel, mail, dateAjout, dateModif FROM client WHERE id = :id');
    $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);

    $request->execute();
 
    $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Client');
 
    if ($client = $request->fetch())
    {
      $client->setDateAjout(new \DateTime($client->dateAjout()));
      $client->setDateModif(new \DateTime($client->dateModif()));
 
      return $client;
    }
 
    return null;
  }

  public function getByMail($mail)
  {
    $request = $this->dao->prepare('SELECT id, nom, prenom, adresse, cp, ville, tel, mail, dateAjout, dateModif FROM client WHERE mail = :mail');
    $request->bindValue(':mail', $mail, \PDO::PARAM_INT);

    $request->execute();
 
    $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Client');
 
    if ($client = $request->fetch())
    {
      $client->setDateAjout(new \DateTime($client->dateAjout()));
      $client->setDateModif(new \DateTime($client->dateModif()));
 
      return $client;
    }
 
    return null;
  }

  protected function modify(Client $client)
  {
    $request = $this->dao->prepare('UPDATE client SET id = :id, nom = :nom, prenom = :prenom, adresse = :adresse, cp = :cp, ville = :ville, tel = :tel, mail = :mail, dateModif = NOW() WHERE id = :id');
 
    $request->bindValue(':nom', $client->nom());
    $request->bindValue(':prenom', $client->prenom());
    $request->bindValue(':adresse', $client->adresse());
    $request->bindValue(':cp', $client->cp());
    $request->bindValue(':ville', $client->ville());
    $request->bindValue(':tel', $client->tel());
    $request->bindValue(':mail', $client->mail()); 
    $request->bindValue(':id', $client->id(), \PDO::PARAM_INT);
    
    $request->execute();
  }
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
  public function rechercheClient($term, $donnee, $array){
    $request = 'SELECT * FROM client WHERE nom LIKE :term';
    $request->execute(array('term' => '%'.$term.'%'));
    /*$request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Client');*/

    $array = array(); // on créé le tableau

    while($donnee = $requete->fetch()) // on effectue une boucle pour obtenir les données
    {
        array_push($array, $donnee['nom'], $donne['prenom'], $donnee['id']); // et on ajoute celles-ci à notre tableau
    }
  }
}