<?php
    require_once("Employe.php");
    
  class EmployeRegulier extends Employe{
    public $NombreHeuresTravaillées;
    public $TauxHoraire;


    function Calc_Salaire_Mensuel(){
        return $this->NombreHeuresTravaillées * $this->TauxHoraire;
    }
 }