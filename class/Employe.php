<?php
abstract class Employe
{
  public $nom;
  public $identifiant;
  public $salaire_de_base;

  abstract public function Calc_Salaire_Mensuel();
}
