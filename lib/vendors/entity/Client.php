<?php
namespace entity;

use \fram\Entity;

class Client extends Entity
{
  protected $id,
            $nom,
            $prenom,
            $adresse,
            $cp,
            $ville,
            $tel,
            $mail,
            $dateModif,
            $dateAjout;




public function isValid()
  {
    return !(empty($this->nom) || empty($this->prenom) || empty($this->tel) || empty($this->mail) || empty($this->adresse) || empty($this->cp) || empty($this->ville));
  }
  // SETTERS //

  public function setNom($nom)
  {

    $this->nom = $nom;
  }

  public function setId($id)
  {

    $this->id = $id;
  }

  public function setPrenom($prenom)
  {

    $this->prenom = $prenom;
  }

  public function setAdresse($adresse)
  {

    $this->adresse = $adresse;
  }

  public function setCp($cp)
  {

    $this->cp = $cp;
  }    

  public function setVille($ville)
  {

    $this->ville = $ville;
  }

public function setTel($tel)
  {

    $this->tel = $tel;
  }  

  public function setMail($mail)
  {

    $this->mail = $mail;
  }

  public function setDateAjout(\DateTime $dateAjout)
  {
    $this->dateAjout = $dateAjout;
  }

  public function setDateModif(\DateTime $dateModif)
  {
    $this->dateModif = $dateModif;
  }

  // GETTERS //
  
  public function id()
  {
    return $this->id;
  }

  public function nom()
  {
    return $this->nom;
  }

  public function prenom()
  {
    return $this->prenom;
  }

  public function adresse()
  {
    return $this->adresse;
  }

  public function cp()
  {
    return $this->cp;
  }

  public function ville()
  {
    return $this->ville;
  }

  public function tel()
  {
    return $this->tel;
  }

  public function mail()
  {
    return $this->mail;
  }

  public function dateAjout()
  {
    return $this->dateAjout;
  }

  public function dateModif()
  {
    return $this->dateModif;
  }

}