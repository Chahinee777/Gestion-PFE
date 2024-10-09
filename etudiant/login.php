<?php
// Start session
session_start();

// Include database connection
include('includes/dbconnection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cin = $_POST['cin'];
    $password = $_POST['password'];

    // Prepare SQL statement to fetch user details
    $stmt = $dbh->prepare("SELECT * FROM tbletudiant WHERE CIN = :cin");
    $stmt->bindValue(':cin', $cin, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists
    if ($user) {
        // Verify password
        if (password_verify($password, $user['MotDePasse'])) {
            // Password is correct, set session variables and redirect to dashboard or any other page
            $_SESSION['sturecmsstuid'] = true;
            $_SESSION['cin'] = $user['CIN'];
            $_SESSION['nom'] = $user['NomEtudiant'];
            // Redirect to dashboard or any other page
            header("Location: dashboard.php");
            exit();
        } else {
            // Password is incorrect
            echo "Incorrect password. Please try again.";
        }
    } else {
        // User does not exist
        echo "User with provided CIN does not exist.";
    }

    // Close statement and database connection
    $stmt = null; // Close the statement
    $dbh = null; // Close the database connection
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
                <form class="pt-3" id="loginForm" method="post" action="login.php">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" placeholder="Enter your CIN" required="true" name="cin"> 
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" placeholder="Enter your password" name="password" required="true">
                </div>
                  <div class="mt-3">
                    <button class="btn btn-success btn-block loginbtn" name="login" type="submit">Login</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" id="remember" class="form-check-input" name="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> /> Rester Connecté </label>
                    </div>
                    <a href="forgot-password.php" class="auth-link text-black">Mot de passe oublié?</a><br>
                    <a href="signup.php" class="auth-link text-black">Crée un Compte</a>
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


