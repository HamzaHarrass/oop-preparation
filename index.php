<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
<thead>
    <tr>
        <th>id</th>
        <th>nom</th>
        <th>identifiant</th>
        <th>salaire</th>
        <th>NombreHeuresTravaillées</th>
        <th>TauxHoraire</th>
        <th colspan="2">Action</th>
    </tr>
</thead>
<tbody>
    <?php
    // require_once(".config/");
    require_once("./class/EmployeRegulier.php");
    $sql = "SELECT * FROM employeregulier";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $employes = $stmt->fetchAll();
    foreach($employes as $employe){
        echo "<tr>";
        echo "<td>".$employe['id']."</td>";
        echo "<td id='nom-".$employe['id']."'>".$employe['nom']."</td>";
        echo "<td id='indenfait-".$employe['id']."'>".$employe['indenfait']."</td>";
        echo "<td id='salaire-".$employe['id']."'>".$employe['salaire']."</td>";
        echo "<td id='NombreHeuresTravaille-".$employe['id']."'>".$employe['NombreHeuresTravaille']."</td>";
        echo "<td id='TauxHoraire-".$employe['id']."'>".$employe['TauxHoraire']."</td>";
        echo "<td><button class='btn btn-primary'  name='editbtn' onclick='ShowEmploye(".$employe['id'].")'>Edit</button></td>";
        echo"<form action='service/E_Regulierservice.php' method='post'>";
        echo "<input type='hidden' name='id' value='".$employe['id']."'>";
        echo "<td><button type='submit' class='btn btn-danger' name='delete_btn'>Delete</button></td>";
        echo "</form>";
        echo "</tr>";
    }
    ?>
</table>




<form id="form" action="service/E_Regulierservice.php" method="post">
            <div>
                <input type="text" name="id" id="id" value="" >
            </div>
          <div class="form-group ">
            <label for="title" class="col-form-label">nom</label>
            <input type="text" class="form-control" name="nom" id="nom">
          </div>
            <div class="form-group">
                <label for="author" class="col-form-label">identifiant:</label>
                <input type="text" class="form-control" name="identifiant" id="indenfait">
        </div>
            <div class="form-group">
                <label for="content" class="col-form-label">salaire de base:</label>
                <textarea class="form-control" name="salaire" id="salaire"></textarea>
            </div>
            <div class="form-group">
                <label for="content" class="col-form-label">NombreHeuresTravaillées:</label>
                <textarea class="form-control" name="NombreHeuresTravaillées" id="NombreHeuresTravaille"></textarea>
            </div>
            <div class="form-group">
                <label for="content" class="col-form-label">TauxHoraire:</label>
                <textarea class="form-control" name="TauxHoraire" id="TauxHoraire"></textarea>
            </div>
             <div class="modal-footer">
            <button type="submit" name="create_btn"class="btn btn-primary" id="save_user">Save </button>
            <button type="submit" name="update_btn" class="btn btn-primary" id="update_user">Update </button>
            </div>
        </div>
        </form>
</body>

<script>
    function ShowEmploye(id){
        let nom = document.getElementById("nom-"+id).innerHTML;
        let indenfait = document.getElementById("indenfait-"+id).innerHTML;
        let salaire = document.getElementById("salaire-"+id).innerHTML;
        let NombreHeuresTravaille = document.getElementById("NombreHeuresTravaille-"+id).innerHTML;
        let TauxHoraire = document.getElementById("TauxHoraire-"+id).innerHTML;

        console.log(nom,indenfait,salaire,NombreHeuresTravaille,TauxHoraire);

        document.getElementById("id").value = id;
        document.getElementById("nom").value = nom;
        document.getElementById("indenfait").value = indenfait;
        document.getElementById("salaire").value = salaire;
        document.getElementById("NombreHeuresTravaille").value = NombreHeuresTravaille;
        document.getElementById("TauxHoraire").value = TauxHoraire;
    }
</script>
</html>