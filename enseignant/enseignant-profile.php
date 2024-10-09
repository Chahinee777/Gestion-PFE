<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsstuid']==0)) {
  header('location:logout.php');
} else {
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Gestion(PFE) ISET Radés || Voir le profil de l'enseignant</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Voir le profil de l'enseignant </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Tableau de bord</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Voir le profil de l'enseignant</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table border="1" class="table table-bordered mg-b-0">
                    <?php
$sid=$_SESSION['sturecmsstuid'];
$sql="SELECT NomDeLEnseignant, CourrielDeLEnseignant, ClasseDeLEnseignant, Sexe, DateDeNaissance, IDEnseignant, NuméroDeContact, NuméroAlternatif, Adresse, NomDUtilisateur, MotDePasse, Image, DateDAdmission, tblclass.ClassName, tblclass.Section from tblenseignant join tblclass on tblclass.ID=tblenseignant.ClasseDeLEnseignant where tblenseignant.ID=:sid";
$query = $dbh->prepare($sql);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0) {
    foreach($results as $row) { ?>
        <tr align="center" class="table-warning">
            <td colspan="4" style="font-size:20px;color:blue">Détails de l'enseignant</td>
        </tr>
        <tr class="table-info">
            <th>Nom de l'enseignant</th>
            <td><?php echo $row->NomDeLEnseignant;?></td>
            <th>Courriel de l'enseignant</th>
            <td><?php echo $row->CourrielDeLEnseignant;?></td>
        </tr>
        <tr class="table-warning">
            <th>Classe de l'enseignant</th>
            <td><?php echo $row->NomClasse;?> <?php echo $row->Section;?></td>
            <th>Genre</th>
            <td><?php echo $row->Sexe;?></td>
        </tr>
        <tr class="table-danger">
            <th>Date de naissance</th>
            <td><?php echo $row->DateDeNaissance;?></td>
            <th>Identifiant de l'enseignant</th>
            <td><?php echo $row->IDEnseignant;?></td>
        </tr>
        <tr class="table-success">
            <th>Numéro de contact</th>
            <td><?php echo $row->NumeroDeContact;?></td>
            <th>Numéro alternatif</th>
            <td><?php echo $row->NumeroAlternatif;?></td>
        </tr>
        <tr class="table-primary">
            <th>Adresse</th>
            <td><?php echo $row->Adresse;?></td>
            <th>Nom d'utilisateur</th>
            <td><?php echo $row->NomDUtilisateur;?></td>
        </tr>
        <tr class="table-info">
            <th>Photo de profil</th>
            <td><img src="../admin/images/<?php echo $row->Image;?>"></td>
            <th>Date d'admission</th>
            <td><?php echo $row->DateDAdmission;?></td>
        </tr>
        <?php $cnt=$cnt+1;
    }
}
?>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
<?php }  ?>
