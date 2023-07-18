<?php
require_once("Employe.php");
class Gestionnaire extends Employe
{

    protected $bonusannuel;

    public function __construct($nom, $prenom, $age, $date_entree, $salaire_de_base, $bonusannuel)
    {
        parent::__construct($nom, $prenom, $age, $date_entree, $salaire_de_base);
        $this->bonusannuel = $bonusannuel;
    }

    function Calc_Salaire_Mensuel()
    {
        return $this->salaire_de_base + $this->bonusannuel / 12;
    }

    public function getBonusAnnuel()
    {
        return $this->bonusannuel;
    }

    public function setBonusAnnuel($bonusannuel)
    {
        // Check if the string is empty
        if (empty($bonusannuel)) {
            throw new Exception("Bonus Annuel cannot be empty.");
        }
        // Check if the string contains only alphabetic characters
        if (!ctype_alpha($bonusannuel)) {
            throw new Exception("Bonus Annuel can only contain alphabetic characters.");
        }
        $this->bonusannuel = $bonusannuel;
    }
}
