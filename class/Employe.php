<?php
abstract class Employe
{
  protected $nom;
  protected $identifiant;
  protected $salaire_de_base;

  public function __construct($nom, $identifiant, $salaire_de_base)
  {
    $this->nom = $nom;
    $this->identifiant = $identifiant;
    $this->salaire_de_base = $salaire_de_base;
  }

  public function getNom()
  {
    return $this->nom;
  }

  public function getIdentifiant()
  {
    return $this->identifiant;
  }

  public function getSalaireDeBase()
  {
    return $this->salaire_de_base;
  }

  public function setNom($nom)
  {
      // Check if the string is empty
    if (empty($nom)) {
      throw new Exception("Nom cannot be empty.");
    }

      // Check if the string contains only alphabetic characters
    if (!ctype_alpha($nom)) {
      throw new Exception("Nom can only contain alphabetic characters.");
    }
    $this->nom = $nom;
  }

  public function setIdentifiant($identifiant)
  {
    if (empty($identifiant)) {
      throw new Exception("Identifiant cannot be empty.");
    }

    if (!ctype_alnum($identifiant)) {
      throw new Exception("Identifiant can only contain alphanumeric characters.");
    }

    $this->identifiant = $identifiant;
  }

  public function setSalaireDeBase($salaire_de_base)
  {
    if (empty($salaire_de_base)) {
      throw new Exception("Salaire de base cannot be empty.");
    }

    if (!is_numeric($salaire_de_base)) {
      throw new Exception("Salaire de base can only contain numeric characters.");
    }

    $this->salaire_de_base = $salaire_de_base;
  }

  abstract public function Calc_Salaire_Mensuel();

  
}
