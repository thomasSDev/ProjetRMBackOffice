<?php
namespace entity;
 
use \fram\Entity;
 
class Message extends Entity
{
  protected $id,
            $typeIntervention,
            $typeDemande,
            $dateDemande,
            $message,
            $disponibilite,
            $demandeTraitee,
            $dateAjout,
            $dateModif,
            $idClient;
 
  const IDCLIENT_INVALIDE = 1;
 
  public function isValid()
  {
    return !(empty($this->idClient));
  }
 
  public function setTypeIntervention($typeIntervention)
  {
 
    $this->typeIntervention = $typeIntervention;
  }
 
  public function setTypeDemande($typeDemande)
  {
 
    $this->typeDemande = $typeDemande;
  }
 
  public function setDateDemande(\DateTime $dateDemande)
  {
    $this->dateDemande = $dateDemande;
  }

  public function setMessage($message)
  {
    $this->message = $message;
  }

  public function setdisponibilite($disponibilite)
  {
    $this->disponibilite = $disponibilite;
  }

  public function setDemandeTraitee($demandeTraitee)
  {
    $this->demandeTraitee = $demandeTraitee;
  }
  public function setDateAjout(\DateTime $dateAjout)
  {
    $this->dateAjout = $dateAjout;
  }

  public function setDateModif(\DateTime $dateModif)
  {
    $this->dateModif = $dateModif;
  }

  public function setIdClient($idClient)
  {
    if (!is_string($typeDemande) || empty($typeDemande))
    {
      $this->erreurs[] = self::IDCLIENT_INVALIDE;
    }
    $this->idClient = (int) $idClient;
  }

  public function id()
  {
    return $this->id;
  }

  public function typeIntervention()
  {
    return $this->typeIntervention;
  }

  public function typeDemande()
  {
    return $this->typeDemande;
  }
 
  public function dateDemande()
  {
    return $this->dateDemande;
  }

  public function message()
  {
    return $this->message;
  }
 
  public function disponibilite()
  {
    return $this->disponibilite;
  }

  public function demandeTraitee()
  {
    return $this->demandeTraitee;
  }

  public function dateAjout()
  {
    return $this->dateAjout;
  }

  public function dateModif()
  {
    return $this->dateModif;
  }

   public function idClient()
  {
    return $this->idClient;
  }
 
}