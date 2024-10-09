<?php
session_start();
include('includes/dbconnection.php');
/*if (strlen($_SESSION['sturecmsaid']) == 0) {
    header('location:logout.php');
} else {
    // Code for deletion
    if (isset($_GET['delid'])) {
        $rid = intval($_GET['delid']);
        $sql = "DELETE FROM tblfiche WHERE ID=:rid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':rid', $rid, PDO::PARAM_STR);
        $query->execute();
        echo "<script>alert('Data Deleted');</script>";
        echo "<script>window.location.href = 'fichepfe.php'</script>";
    }
    <?php } ?>*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>

    <title>Gestion(PFE) ISET Radès || Fiches PFE</title>
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
                    <h3 class="page-title">Les Fiches PFE</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Tableau de bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Les Fiches PFE</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="text-align: center;">Les Fiches PFE</h4>

                                <div class="table-responsive border rounded p-1">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="font-weight-bold">N°</th>
                                            <th class="font-weight-bold">Nom d'étudiant 1</th>
                                            <th class="font-weight-bold">Nom d'étudiant 2</th>
                                            <th class="font-weight-bold">Email d'étudiant 1</th>
                                            <th class="font-weight-bold">Email d'étudiant 2</th>
                                            <th class="font-weight-bold">Sujet</th>
                                            <th class="font-weight-bold">Encadreur ISET</th>
                                            <th class="font-weight-bold">Nom d'entreprise</th>
                                            <th class="font-weight-bold">Encadreur entreprise</th>
                                            <th class="font-weight-bold">Date de création</th>
                                            <th class="font-weight-bold">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (isset($_GET['pageno'])) {
                                            $pageno = $_GET['pageno'];
                                        } else {
                                            $pageno = 1;
                                        }
                                        // Pagination formula
                                        $no_of_records_per_page = 15;
                                        $offset = ($pageno - 1) * $no_of_records_per_page;
                                        $ret = "SELECT ID FROM tblfiche";
                                        $query1 = $dbh->prepare($ret);
                                        $query1->execute();
                                        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                                        $total_rows = $query1->rowCount();
                                        $total_pages = ceil($total_rows / $no_of_records_per_page);
                                        $sql = "SELECT * from tblfiche LIMIT $offset, $no_of_records_per_page";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) { ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($row->etudiant1); ?></td>
                                                    <td><?php echo htmlentities($row->etudiant2); ?></td>
                                                    <td><?php echo htmlentities($row->email_etudiant1); ?></td>
                                                    <td><?php echo htmlentities($row->email_etudiant2); ?></td>
                                                    <td><?php echo htmlentities($row->sujet); ?></td>
                                                    <td><?php echo htmlentities($row->encadreur_iset); ?></td>
                                                    <td><?php echo htmlentities($row->nom_entreprise); ?></td>
                                                    <td><?php echo htmlentities($row->encadreur_entreprise); ?></td>
                                                    <td><?php echo htmlentities($row->date_creation); ?></td>
                                                    <td>
                                                        <div><a href="pdf.php?editid=<?php echo htmlentities($row->ID); ?>"><i class="icon-eye"></i></a>
                                                            ||<a href="supprimer.php?delid=<?php echo ($row->ID); ?>" onclick="return confirm('Voulez-vous vraiment supprimer ?');"> <i class="icon-trash"></i></a>
                                                            ||<a href="validation.php?sturecmsstuid=<?php echo $row->ID; ?>&action=valider" onclick="return confirm('Voulez-vous vraiment accépter ?');"> <i class="icon-check"></i></a>
                                                            ||<a href="validation.php?sturecmsstuid=<?php echo $row->ID; ?>&action=refuser" onclick="return confirm('Voulez-vous vraiment refuser ?');"> <i class="icon-ban"></i></a>
                                                        </div>
                                                    </td>
                                                </tr><?php $cnt = $cnt + 1;
                                            }
                                        } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div align="left">
                                    <ul class="pagination">
                                        <li><a href="?pageno=1"><strong>Première</strong></a></li>
                                        <li class="<?php if ($pageno <= 1) {
                                            echo 'disabled';
                                        } ?>">
                                            <a href="<?php if ($pageno <= 1) {
                                                echo '#';
                                            } else {
                                                echo "?pageno=" . ($pageno - 1);
                                            } ?>"><strong style="padding-left: 10px">Précédent</strong></a>
                                        </li>
                                        <li class="<?php if ($pageno >= $total_pages) {
                                            echo 'disabled';
                                        } ?>">
                                            <a href="<?php if ($pageno >= $total_pages) {
                                                echo '#';
                                            } else {
                                                echo "?pageno=" . ($pageno + 1);
                                            } ?>"><strong style="padding-left: 10px">Suivant</strong></a>
                                        </li>
                                        <li><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Dernière</strong></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
    <div class="col-md-12 d-flex justify-content-center">
        <a href="excel.php" class="btn btn-success">Télécharger Excel</a>
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
<!-- Plugin js for this page-->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/select2/select2.min.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<script src="js/select2.js"></script>
<!-- End custom js for this page-->
</body>
</html>

