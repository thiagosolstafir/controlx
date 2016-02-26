<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
      <li>
        <div class="user-img-div">
          <a href="<?php echo URL_ADMIN;?>/administradores/<?php echo time(); ?>"><img src="<?php echo URL_SITE; ?>/uploads/sem-foto.png" class="img-thumbnail" /></a>

          <div class="inner-text">
            <?php echo $_SESSION['nome_administrador']; ?>
            <br />
            <small><?php echo data_extenso(); ?></small>
          </div>
        </div>

      </li>

      <?php
        $pageAction = segmento_url($_GET['p'], 1);
      ?>

      <li>
        <a href="<?php echo URL_ADMIN;?>/home" <?php if($pageAction == "home" OR $pageAction == ""){?> class="active-menu" <?php } ?>><i class="fa fa-dashboard "></i>Dashboard</a>
      </li>
      <li>
        <a href="<?php echo URL_ADMIN;?>/portfolios" <?php if($pageAction == "portfolios"){?> class="active-menu"  <?php } ?>><i class="fa fa-globe "></i>Portfolios</a>
      </li>
      <li>
        <a href="<?php echo URL_ADMIN;?>/noticias" <?php if($pageAction == "noticias"){?> class="active-menu"  <?php } ?>><i class="fa fa-newspaper-o"></i>Notícias</a>
      </li>
      <li>
        <a href="<?php echo URL_ADMIN;?>/administradores" <?php if($pageAction == "administradores"){?> class="active-menu"  <?php } ?>><i class="fa fa-users "></i>Administradores</a>
      </li>
      <li>
        <a href="<?php echo URL_ADMIN;?>/configuracoes" <?php if($pageAction == "configuracoes"){?> class="active-menu"  <?php } ?>><i class="fa fa-cog "></i>Configurações</a>
      </li>

    </ul>

  </div>

</nav>
