<?php
require_once("Employe.php");
class Gestionnaire extends Employe
{

    public $bonusannuel;

    function Calc_Salaire_Mensuel()
    {
        return $this->salaire_de_base  + ($this->bonusannuel/12) ;
    }
}
