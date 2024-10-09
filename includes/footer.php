<!--footer-->
<div class="footer">
    <!-- container -->
    <div class="container">
      <div class="col-md-6 footer-left">
        <ul>
          <li><a href="index.php">Acceuil</a></li>
          <li><a href="about.php">A propos</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="enseignant/login.php">Enseignant</a></li>
          <li><a href="etudiant/login.php">Etudiant</a></li>
        </ul>
       
      </div>
      <div class="col-md-3 footer-middle">
        <?php
$sql="SELECT * from tblpage where TypePage='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
        <h3>Address</h3>
        <div class="address">
          <p>L' ISET de Radès, Av. de France, Radès
          </p>
        </div>
        <div class="phone">
          <p><?php  echo ($row->NumeroMobile);?></p>
        </div>
      <?php $cnt=$cnt+1;}} ?></div>
      <div class="col-md-3 footer-right">
        <h3> Gestion (PFE) ISET Radès</h3>
        <p>Bienvenue sur notre plateforme de gestion de projets de fin d'études (PFE) de l'ISET de Radès ! Notre site offre aux étudiants un espace dédié pour soumettre et gérer leurs projets de fin d'études de manière efficace et transparente.</p>
      </div>
      <div class="clearfix"> </div> 
    </div>
    <!-- //container -->
  </div>
<!--/footer-->
<!--copy-rights-->
<div class="copyright">
    <!-- container -->
    <div class="container">
      <div class="copyright-left">
      <p>© <?php echo date('Y');?> Gestion (PFE) ISET Radès </p>
      </div>
      <div class="copyright-right">
        <ul>
          <li><a href="https://www.facebook.com/isetrades2018?locale=fr_FR" class="twitter facebook"> </a></li>
          <li><a href="http://www.isetr.rnu.tn/" class="twitter chrome"> </a></li>
          <li><a href="https://www.linkedin.com/school/iset-rades/?originalSubdomain=tn" class="twitter linkedin"> </a></li>
        </ul>
      </div>
      <div class="clearfix"> </div>
      
    </div>
    <!-- //container -->
    <!---->
<script type="text/javascript">
    $(document).ready(function() {
        /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
        */
    $().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!----> 
  </div>