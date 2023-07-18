<?php 
 require_once ('Employe.php');
 class CadreSuperieur extends Employe{
 
    protected $salaireannuel;

    public function __construct($nom, $identifiant, $salaire_de_base, $salaireannuel){
        parent::__construct($nom, $identifiant, $salaire_de_base);
        $this->salaireannuel = $salaireannuel;
    }

    function Calc_Salaire_Mensuel(){
        // calcul du salaire mensuel pour diviser le salaire annuel par douze.
        return $this->salaireannuel / 12;
    }

    public function getSalaireAnnuel(){
        return $this->salaireannuel;
    }

    public function setSalaireAnnuel($salaireannuel){
        // Check if the string is empty
        if (empty($salaireannuel)) {
            throw new Exception("Salaire Annuel cannot be empty.");
        }
        // Check if the string contains only alphabetic characters
        if (!ctype_alpha($salaireannuel)) {
            throw new Exception("Salaire Annuel can only contain alphabetic characters.");
        }
        $this->salaireannuel = $salaireannuel;
    }
 }