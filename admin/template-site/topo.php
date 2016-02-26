<?php
if(isset($_GET['sair'])){
  logOutUsuario();
}
?>

<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <?php
    $db = new medoo;
    $dados = $db->select("th_configuracoes", "*");
    foreach ($dados as $dado) {
      $logo = $dado['logo'];
      $nome = $dado['nome'];
      if($logo){
        ?>
        <a class="navbar-brand remove-padding-top" href="index.html"><img src="<?php echo URL_ADMIN . "/uploads/" . $logo ?>" alt="" width="200" height="71" /></a>
        <?php }else{ ?>
          <a class="navbar-brand" href="index.html"><?php echo $nome; ?></a>
          <?php } } ?>
        </div>

        <div class="header-right">

          <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
          <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
          <a href="login_admin/index.php?logout&hash=<?php echo time(); ?>" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

        </div>
      </nav>
