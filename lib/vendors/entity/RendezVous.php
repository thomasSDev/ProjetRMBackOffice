<?php
namespace entity;

use \fram\Entity;

class RendezVous extends Entity
{
  protected $id,
            $dateHeure,
            $typeIntervention,
            $commentaire,
            $idClient_Rdv,
            $interventionEffectuee,
            $dateAjout,
            $dateModif,
            $dateOfWeek;
            

  const IDCLIENT_INVALIDE = 1;

  public function isValid()
  {
    return !(empty($this->idClient_Rdv));
  }
  // SETTERS //

  public function setDateHeure($dateHeure)
  {
    $this->dateHeure = $dateHeure;
  }
  public function setDateAjout(\DateTime $dateAjout)
  {
    $this->dateAjout = $dateAjout;
  }
  public function setDateModif(\DateTime $dateModif)
  {
    $this->dateModif = $dateModif;
  }

  public function setTypeIntervention($typeIntervention)
  {
    $this->typeIntervention = $typeIntervention;
  }

  public function setCommentaire($commentaire)
  {
    $this->commentaire = $commentaire;
  }

  public function setIdClient_Rdv($idClient_Rdv)
  {
    if (!is_string($idClient_Rdv) || empty($idClient_Rdv))
    {
      $this->erreurs[] = self::IDCLIENT_INVALIDE;
    }

    $this->idClient_Rdv = $idClient_Rdv;
  }    

  public function setInterventionEffectuee($interventionEffectuee)
  {
    $this->interventionEffectuee = $interventionEffectuee;
  }  

  public function setdateOfWeek($dateOfWeek)
  {
    $this->dateOfWeek = $dateOfWeek;
  }


  // GETTERS //
  public function id()
  {
    return $this->id;
  }

  public function dateHeure()
  {
    return $this->dateHeure;
  }
  public function dateAjout()
  {
    return $this->dateAjout;
  }
  public function dateModif()
  {
    return $this->dateModif;
  }

  public function typeIntervention()
  {
    return $this->typeIntervention;
  }

  public function commentaire()
  {
    return $this->commentaire;
  }

  public function idClient_Rdv()
  {
    return $this->idClient_Rdv;
  }

  public function interventionEffectuee()
  {
    return $this->interventionEffectuee;
  }
   public function dateOfWeek()
  {
    return $this->dateOfWeek;
  }

}