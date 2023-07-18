<?php
    require_once(__DIR__."/../config/connection.php");
    require_once("Employe.php");
    
  class EmployeRegulier extends Employe{

    protected $NombreHeuresTravaillées;
    protected $TauxHoraire;

    public function __construct($nom, $identifiant, $salaire_de_base, $NombreHeuresTravaillées, $TauxHoraire){
        parent::__construct($nom, $identifiant, $salaire_de_base);
        $this->NombreHeuresTravaillées = $NombreHeuresTravaillées;
        $this->TauxHoraire = $TauxHoraire;
    }

    function Calc_Salaire_Mensuel(){
        return $this->NombreHeuresTravaillées * $this->TauxHoraire;
    }

    public function getNombreHeuresTravaillées(){
        return $this->NombreHeuresTravaillées;
    }

    public function setNombreHeuresTravaillées($NombreHeuresTravaillées){
        // Check if the string is empty
        if (empty($NombreHeuresTravaillées)) {
            throw new Exception("Nombre Heures Travaillées cannot be empty.");
        }
        // Check if the string contains only alphabetic characters
        if (!ctype_alpha($NombreHeuresTravaillées)) {
            throw new Exception("Nombre Heures Travaillées can only contain alphabetic characters.");
        }
        $this->NombreHeuresTravaillées = $NombreHeuresTravaillées;
    }

    public function getTauxHoraire(){
        //check if the string is empty
        if (empty($TauxHoraire)) {
            throw new Exception("Taux Horaire cannot be empty.");
        }
        //check if the string contains only alphabetic characters
        if (!ctype_alpha($TauxHoraire)) {
            throw new Exception("Taux Horaire can only contain alphabetic characters.");
        }

        return $this->TauxHoraire;
    } 

    static function CreateEmploye( $NombreHeuresTravaillées, $TauxHoraire,$nom, $identifiant, $salaire_de_base)
    {
        try{
            global $conn;
            $sql = "INSERT INTO employeregulier (nom, indenfait, salaire, NombreHeuresTravaille, TauxHoraire) VALUES ('$nom', '$identifiant', '$salaire_de_base', '$NombreHeuresTravaillées', '$TauxHoraire')";
            $conn->exec($sql);
            echo "Records inserted successfully.";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }  
      }
      
      static function UpdateEmploye($id,$NombreHeuresTravaillées, $TauxHoraire,$nom, $identifiant, $salaire_de_base)
 {
     try{
         global $conn;
         $sql = "UPDATE employeregulier SET nom='$nom', indenfait='$identifiant', salaire='$salaire_de_base', NombreHeuresTravaille='$NombreHeuresTravaillées', TauxHoraire='$TauxHoraire' WHERE id=$id";
         $conn->exec($sql);
         echo "Records updated successfully.";
     } catch(PDOException $e){
         die("ERROR: Could not able to execute $sql. " . $e->getMessage());
     }  
   }

static function DeleteEmploye($id){
    try{
        global $conn;
        $sql = "DELETE FROM employeregulier WHERE id=$id";
        $conn->exec($sql);
        echo "Records deleted successfully.";
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}

 }

