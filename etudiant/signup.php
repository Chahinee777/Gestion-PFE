<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('includes/dbconnection.php'); // Include your database connection file
// Include PHPMailer autoload file
require 'vendor/autoload.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cin = $_POST['cin'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'yessinemelliti930@gmail.com'; // Replace with your SMTP email address
        $mail->Password   = 'iusb dwef vuhj nayw'; // Replace with your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587; // SMTP port, adjust if necessary

        // Recipient and email content
        $mail->setFrom('yessinemelliti930@gmail.com', 'Gestion(PFE) ISET Rades');
        $mail->addAddress($email); // Send confirmation email to user
        $mail->Subject = 'Inscription Confirmation';
        $mail->Body    = 'Dear user, your inscription with the following details is confirmed:'
                        . "\nCIN: " . $cin
                        . "\nEmail: " . $email
                        . "\nPassword: " . $_POST['password'];

        // Send email
        $mail->send();
        echo 'Inscription confirmation email sent successfully.';

        // Insert user data into database
        $sql = "INSERT INTO tbletudiant (CIN, CourrielEtudiant, MotDePasse) VALUES (?, ?, ?)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(1, $cin);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $password);
        $stmt->execute();
        echo 'User data inserted into database successfully.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Gestion(PFE) ISET Radès || Etudiant Login Page</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="css/style.css">
 
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="images/logo.svg"> 
              </div>
              <h4>Salut! Commençons</h4>
              <h6 class="font-weight-light">Connecter pour continuer.</h6>
              <form class="pt-3" id="login" method="post" name="login">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" placeholder="entrer votre cin" required="true" name="cin"> 
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" placeholder="entrer votre email" required="true" name="email"> 
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" placeholder="choisir un motdepasse" name="password" required="true">
                </div>
                
                <div class="mt-3">
                  <button class="btn btn-success btn-block loginbtn" name="login" type="submit">SignUp</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  
                </div>
                <div class="mb-2">
                  <a href="../index.php" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="icon-social-home mr-2"></i>Retourner Acceuil</a>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
</body>
</html>
