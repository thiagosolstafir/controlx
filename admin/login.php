<?php session_start(); include "config.php";  $db = new medoo; ?>

<?php


if(isset($_GET['logar'])){
  $usuario = $_POST['usuario'];
  $senhaPost  = $_POST['senha'];
  $senha = md5($senhaPost);
  $verificar = $db->query("SELECT * FROM th_administradores WHERE usuario = '".$usuario."' AND '".$senha."' ")->fetchAll();


  if(count($verificar) == 1){
    $_SESSION['administrador_logado'] = true;
    if(empty($urlRedir)){
      echo "<script>location.href='".URL_ADMIN."/home'</script>";
      exit();
      //header("Location: ../minha-conta");
    }else{
      echo "<script>location.href='".URL_ADMIN."/".$urlRedir."'</script>";
      //header("Location:  ".URL_SITE."/".$urlRedir." ");
      exit();
    }
  } else {
    echo "<script>alert('Usuário ou senha inválida.')</script>";
    echo "<script>location.href='".URL_ADMIN."/login.php'; </script>";
    exit();
  }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    <?php
    echo $nomeSite = $db->get("th_configuracoes", "nome");
    ?>
  </title>

  <!-- BOOTSTRAP STYLES-->
  <link href="<?php echo URL_ADMIN; ?>/assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="<?php echo URL_ADMIN; ?>/assets/css/font-awesome.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <style> .btn-entrar{width: 100%;}.esqueceu{margin-top: 15px;}.nome-site{ color: #000; text-align: center; width: 100%; font-size: 24px; letter-spacing: 1px; font-weight: 900; text-transform: uppercase;} </style>

</head>
<body>
  <div class="container">
    <div class="row text-center " style="margin-top:100px;margin-bottom:30px;">
      <div class="col-md-12">
        <?php
        $dados = $db->select("th_configuracoes", "*");
        foreach ($dados as $dado) {
          $logo = $dado['logo'];
          $nome = $dado['nome'];
          if($logo){
            ?>
            <img src="<?php echo URL_ADMIN . "/uploads/" . $logo ?>" alt="" width="200" height="71" />
            <?php }else{ ?>
              <div class="nome-site"><?php echo $nome; ?></div>
              <?php } } ?>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Por favor, faça o login</h3>
                  </div>
                  <div class="panel-body">
                    <form action="login_admin/index.php" method="post" name="loginform"  id="loginform">
                      <fieldset>
                        <div class="form-group">
                          <input id="login_input_username" class="login_input form-control" type="text" name="usuario" required autofocus placeholder="Usuário" />
                        </div>
                        <div class="form-group">
                              <input id="login_input_password" class="login_input form-control" type="password" name="senha" autocomplete="off" required placeholder="Senha" />
                        </div>
                        <button type="submit" name="login" class="btn btn-lg btn-success btn-block">Entrar</button>

                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>



      </div>

    </body>
    </html>
