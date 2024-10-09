<?php
session_start();
include('includes/dbconnection.php');
require_once __DIR__ . '/pdf/autoload.php'; // Include mPDF library

// Fetch data from the database
$sql = "SELECT * FROM tblfiche";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

// Create a new mPDF instance
$mpdf = new \Mpdf\Mpdf();

// Start HTML content for the PDF
$html = '<h1>Liste des Fiches PFE</h1>';
$html .= '<table border="1">';
$html .= '<thead><tr><th>N°</th><th>Nom d\'étudiant 1</th><th>Nom d\'étudiant 2</th><th>Email d\'étudiant 1</th><th>Email d\'étudiant 2</th><th>Sujet</th><th>Encadreur ISET</th><th>Nom d\'entreprise</th><th>Encadreur entreprise</th><th>Date de création</th></tr></thead>';
$html .= '<tbody>';

// Loop through each row of data and add it to the HTML content
foreach ($results as $row) {
    $html .= '<tr>';
    $html .= '<td>' . htmlentities($row['ID']) . '</td>';
    $html .= '<td>' . htmlentities($row['etudiant1']) . '</td>';
    $html .= '<td>' . htmlentities($row['etudiant2']) . '</td>';
    $html .= '<td>' . htmlentities($row['email_etudiant1']) . '</td>';
    $html .= '<td>' . htmlentities($row['email_etudiant2']) . '</td>';
    $html .= '<td>' . htmlentities($row['sujet']) . '</td>';
    $html .= '<td>' . htmlentities($row['encadreur_iset']) . '</td>';
    $html .= '<td>' . htmlentities($row['nom_entreprise']) . '</td>';
    $html .= '<td>' . htmlentities($row['encadreur_entreprise']) . '</td>';
    $html .= '<td>' . htmlentities($row['date_creation']) . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody></table>';

// Add HTML content to mPDF
$mpdf->WriteHTML($html);

// Output the PDF
$mpdf->Output('fiches_pfe.pdf', 'D'); // D for download, you can change it to I for inline display

// Exit script
