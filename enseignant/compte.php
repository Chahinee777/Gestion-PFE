<?php
include('includes/dbconnection.php');

if(isset($_POST['submit'])) {
    // Retrieve form data
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    // Include other form fields here...

    // Validate form data (you can add more validation)
    if(empty($stuname) || empty($stuemail)) {
        echo "<script>alert('Please fill all the fields')</script>";
    } else {
        // Hash the password
        $password = md5($_POST['password']);

        // Insert student data into the database
        $sql = "INSERT INTO tblenseignant (NomDeLEnseignant, CourrielDeLEnseignant, ..., MotDePasse) VALUES (:stuname, :stuemail, ..., :password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':stuname', $stuname, PDO::PARAM_STR);
        $query->bindParam(':stuemail', $stuemail, PDO::PARAM_STR);
        // Bind other form fields...
        $query->bindParam(':password', $password, PDO::PARAM_STR);

        if($query->execute()) {
            echo '<script>alert("Registration successful. You can now login.")</script>';
            echo "<script>window.location.href = 'login.php'</script>";
        } else {
            echo '<script>alert("Registration failed. Please try again.")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gestion(PFE) ISET Radès || Mon Compte</title>
    <!-- Include CSS and other dependencies here -->
</head>
<body>
    <!-- Registration form -->
    <form method="post" action="">
        <input type="text" name="stuname" placeholder="Nom de l'enseignant" required><br>
        <input type="email" name="stuemail" placeholder="Courriel de l'enseignant" required><br>
        <!-- Include other form fields here... -->
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <button type="submit" name="submit">S'inscrire</button>
    </form>
</body>
</html>
