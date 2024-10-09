<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_GET['sturecmsstuid']) && isset($_GET['action'])) {
    $id = intval($_GET['sturecmsstuid']);
    $status = ($_GET['action'] == 'valider') ? 'Validé' : 'Refusé';
    $sql = "UPDATE tblfiche SET Etat=:status WHERE ID=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    header('Location: fichepfe.php'); // Redirect back to fichepfe.php
    exit();
}
?>
