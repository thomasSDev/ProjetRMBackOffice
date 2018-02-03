<?php
namespace entity;

use \fram\Entity;

class User extends Entity
{
  protected $pseudo,
            $mail,
            $passe;


  const PSEUDO_INVALIDE = 1;
  const PASSE_INVALIDE = 2;
  
  public function isValid()
  {
    return !(empty($this->pseudo) || empty($this->passe));
  }

  // SETTERS //


  public function setMail($mail)
  {
    if (!is_string($mail) || empty($mail))
    {
      $this->erreurs[] = self::PSEUDO_INVALIDE;
    }

    $this->mail = $mail;
  }
  public function setPseudo($pseudo)
  {
    if (!is_string($pseudo) || empty($pseudo))
    {
      $this->erreurs[] = self::PSEUDO_INVALIDE;
    }

    $this->pseudo = $pseudo;
  }

  public function setPasse($passe)
  {
    if (!is_string($passe) || empty($passe))
    {
      $this->erreurs[] = self::PASSE_INVALIDE;
    }

    $this->passe = $passe;
  }

  // GETTERS //

  public function mail()
  {
    return $this->mail;
  }
  public function pseudo()
  {
    return $this->pseudo;
  }

  public function passe()
  {
    return $this->passe;
  }
}