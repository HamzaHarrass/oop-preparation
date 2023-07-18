<?php
   
   require_once("../config/connection.php");
    require_once("../class/EmployeRegulier.php");

    if(isset($_POST["create_btn"]))       create();
    if(isset($_POST["update_btn"]))       update();
    if(isset($_POST["delete_btn"]))       delete();
    
    function create(){
        if(!isset($_POST['nom']) || !isset($_POST['identifiant']) || !isset($_POST['salaire']) || !isset($_POST['NombreHeuresTravaillées']) || !isset($_POST['TauxHoraire'])){
            echo "Error: one or more fields are not set";
            return;
        }
        $nom = $_POST['nom'];
        $identifiant = $_POST['identifiant'];
        $salaire_de_base = $_POST['salaire'];
        $NombreHeuresTravaillées = $_POST['NombreHeuresTravaillées'];
        $TauxHoraire = $_POST['TauxHoraire'];
        EmployeRegulier::CreateEmploye($NombreHeuresTravaillées, $TauxHoraire,$nom, $identifiant, $salaire_de_base);
    }

    function update(){
        if(!isset($_POST['id'])||!isset($_POST['nom']) || !isset($_POST['identifiant']) || !isset($_POST['salaire']) || !isset($_POST['NombreHeuresTravaillées']) || !isset($_POST['TauxHoraire'])){
            echo "Error: one or more fields are not set";
            return;
        }
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $identifiant = $_POST['identifiant'];
        $salaire_de_base = $_POST['salaire'];
        $NombreHeuresTravaillées = $_POST['NombreHeuresTravaillées'];
        $TauxHoraire = $_POST['TauxHoraire'];
        EmployeRegulier::UpdateEmploye($id,$NombreHeuresTravaillées, $TauxHoraire,$nom, $identifiant, $salaire_de_base);
    }

    function delete(){
        if(!isset($_POST['id'])){
            echo "Error: one or more fields are not set";
            return;
        }
        $id = $_POST['id'];
        EmployeRegulier::DeleteEmploye($id);
    }



