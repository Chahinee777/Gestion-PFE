<?php
session_start();
include('includes/dbconnection.php');
require 'vendor/autoload.php'; // Include PHPExcel library

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Fetch data from the database
$sql = "SELECT * FROM tblfiche";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

// Create a new Spreadsheet instance
$spreadsheet = new Spreadsheet();

// Set spreadsheet properties
$spreadsheet->getProperties()
    ->setCreator("Your Name")
    ->setTitle("Fiches PFE");

// Add a new worksheet
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Fiches PFE');

// Add column headers
$sheet->setCellValue('A1', 'ID')
      ->setCellValue('B1', 'Nom d\'étudiant 1')
      ->setCellValue('C1', 'Nom d\'étudiant 2')
      ->setCellValue('D1', 'Email d\'étudiant 1')
      ->setCellValue('E1', 'Email d\'étudiant 2')
      ->setCellValue('F1', 'Sujet')
      ->setCellValue('G1', 'Encadreur ISET')
      ->setCellValue('H1', 'Nom d\'entreprise')
      ->setCellValue('I1', 'Encadreur entreprise')
      ->setCellValue('J1', 'Date de création');

// Populate data from database
$row = 2;
foreach ($results as $result) {
    $sheet->setCellValue('A' . $row, $result['ID'])
          ->setCellValue('B' . $row, $result['etudiant1'])
          ->setCellValue('C' . $row, $result['etudiant2'])
          ->setCellValue('D' . $row, $result['email_etudiant1'])
          ->setCellValue('E' . $row, $result['email_etudiant2'])
          ->setCellValue('F' . $row, $result['sujet'])
          ->setCellValue('G' . $row, $result['encadreur_iset'])
          ->setCellValue('H' . $row, $result['nom_entreprise'])
          ->setCellValue('I' . $row, $result['encadreur_entreprise'])
          ->setCellValue('J' . $row, $result['date_creation']);
          $row++;
      }
      
      // Set column auto size
      foreach (range('A', 'J') as $column) {
          $sheet->getColumnDimension($column)->setAutoSize(true);
      }
      
      // Create a new Excel writer object
      $writer = new Xlsx($spreadsheet);
      
      // Set headers for download
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="fiches_pfe.xlsx"');
      header('Cache-Control: max-age=0');
      
      // Write the Excel file to the browser
      $writer->save('php://output');
      
      // Exit script
      exit;
      
