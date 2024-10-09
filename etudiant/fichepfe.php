<?php
session_start();
include('includes/dbconnection.php');

// Code for insertion
if (isset($_POST['submit'])) {
    $etudiant1 = $_POST['etudiant1'];
    $etudiant2 = $_POST['etudiant2'];
    $email_etudiant1 = $_POST['email_etudiant1'];
    $email_etudiant2 = $_POST['email_etudiant2'];
    $sujet = $_POST['sujet'];
    $encadreur_iset = $_POST['encadreur_iset'];
    $nom_entreprise = $_POST['nom_entreprise'];
    $encadreur_entreprise = $_POST['encadreur_entreprise'];

    // Check if the email of the second student already exists in tblfiche
    $check_query = "SELECT * FROM tblfiche WHERE email_etudiant2 = :email_etudiant2";
    $stmt_check = $dbh->prepare($check_query);
    $stmt_check->bindParam(':email_etudiant2', $email_etudiant2, PDO::PARAM_STR);
    $stmt_check->execute();
    $count = $stmt_check->rowCount();
    
    if ($count > 0) {
        echo "<script>alert('Vous ne pouvez pas ajouter un nouveau formulaire car votre email est déjà utilisé par votre binome.');</script>";
        echo "<script>window.location.href ='fichepfe.php'</script>";
    } else {
        $query = "INSERT INTO tblfiche (etudiant1, etudiant2, email_etudiant1, email_etudiant2, sujet, encadreur_iset, nom_entreprise, encadreur_entreprise) VALUES (:etudiant1, :etudiant2, :email_etudiant1, :email_etudiant2, :sujet, :encadreur_iset, :nom_entreprise, :encadreur_entreprise)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':etudiant1', $etudiant1, PDO::PARAM_STR);
        $stmt->bindParam(':etudiant2', $etudiant2, PDO::PARAM_STR);
        $stmt->bindParam(':email_etudiant1', $email_etudiant1, PDO::PARAM_STR);
        $stmt->bindParam(':email_etudiant2', $email_etudiant2, PDO::PARAM_STR);
        $stmt->bindParam(':sujet', $sujet, PDO::PARAM_STR);
        $stmt->bindParam(':encadreur_iset', $encadreur_iset, PDO::PARAM_STR);
        $stmt->bindParam(':nom_entreprise', $nom_entreprise, PDO::PARAM_STR);
        $stmt->bindParam(':encadreur_entreprise', $encadreur_entreprise, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script>alert('Rapport ajouté avec succès.');</script>";
            echo "<script>window.location.href ='fichepfe.php'</script>";
        } else {
            echo "<script>alert('Erreur lors de l\'ajout du fichePFE. Veuillez réessayer.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gestion(PFE) ISET Radès|| Les Fiches PFE</title>
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
        <?php include_once('includes/header.php'); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include_once('includes/sidebar.php'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> FichePFE </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> FichePFE</li>
                                <li class="breadcrumb-item"><a href="etat.php">Voir Fiche PFE Etat</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="text-align: center;">Formulaire de Fiche PFE 23/24</h4>
                                    <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="etudiant1">Etudiant 1:</label>
                                            <input type="text" class="form-control" id="etudiant1" name="etudiant1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="etudiant2">Etudiant 2:</label>
                                            <input type="text" class="form-control" id="etudiant2" name="etudiant2" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email_etudiant1">Email Etudiant 1:</label>
                                            <input type="email" class="form-control" id="email_etudiant1" name="email_etudiant1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email_etudiant2">Email Etudiant 2:</label>
                                            <input type="email" class="form-control" id="email_etudiant2" name="email_etudiant2" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sujet">Sujet:</label>
                                            <textarea class="form-control" id="sujet" name="sujet" rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="encadreur_iset">Encadreur ISET:</label>
                                            <input type="text" class="form-control" id="encadreur_iset" name="encadreur_iset" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nom_entreprise">Nom Entreprise:</label>
                                            <input type="text" class="form-control" id="nom_entreprise" name="nom_entreprise" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="encadreur_entreprise">Encadreur Entreprise:</label>
                                            <input type="text" class="form-control" id="encadreur_entreprise" name="encadreur_entreprise" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2" name="submit">Soumettre</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include_once('includes/footer.php'); ?>
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
