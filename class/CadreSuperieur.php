<?php 
 require_once ('Employe.php');
 class CadreSuperieur extends Employe{
 
    public $salaireannuel;

    function Calc_Salaire_Mensuel(){
        // calcul du salaire mensuel pour diviser le salaire annuel par douze.
        return $this->salaireannuel / 12;
    }
 }