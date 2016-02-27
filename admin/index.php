<?php
include "template-site/header.php";

$login = new Login();

if (!$login->isUserLoggedIn() == true) {

    echo "<script>location.href='login.php'</script>";
}


?>
<script src="http://cdn.zingchart.com/zingchart.min.js"></script>


<div id="wrapper">
  <?php include "template-site/topo.php"; ?>
  <!-- /. NAV TOP  -->
  <?php require_once "template-site/left-menu.php"; ?>
  <!-- /. NAV SIDE  -->
  <div id="page-wrapper">
    <div id="page-inner">
      <?php
      try
      {
        if (isset($_GET['p'])){
          carregarPagina($_GET['p']);
        }else{
          require_once 'inc/home.php';
        }
      }catch (Exception $e) {
        echo '<div id="erro404">' . $e->getMessage() . '</div>';
      }
      ?>
    </div>
    <!-- /. PAGE INNER  -->
  </div>
  <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<?php include "template-site/footer.php"; ?>
<!-- /. FOOTER  -->



</body>
</html>
