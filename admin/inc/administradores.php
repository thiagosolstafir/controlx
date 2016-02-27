
<div class="row">
  <div class="col-md-12">
    <h1 class="page-head-line">ADMINISTRADORES</h1>
  </div>
</div>

<?php
$_SESSION['sessao_categoria'] = false;
$xcrud = Xcrud::get_instance();
$xcrud->table('th_administradores');
$xcrud->unset_title();
$xcrud->unset_numbers();
$xcrud->unset_print();
$xcrud->unset_csv();
$xcrud->unset_remove(true,'usuario','=','admin');
$xcrud->unset_edit(true,'usuario','=','admin');
$xcrud->change_type('senha', 'password');
$xcrud->columns("foto,nome,usuario,email,ativo");
$xcrud->validation_pattern('email','email');
$xcrud->label('usuario', 'Usuário');
$xcrud->label('email', 'E-mail');
$xcrud->column_width('foto','54px');
$xcrud->change_type('ativo','select','', array('0'=>'Não','1'=>'Sim'));
$xcrud->column_class('foto','align-center');
$xcrud->change_type('foto', 'image', '',  array(
  'width' => 54,
  'height' => 54,
  'crop' => true,
  'manual_crop' => false));
  ?>

  <div class="container">
    <?php
    @$lk = segmento_url($_GET['p'], 2);
    if(!$lk){
      echo $xcrud->render();
    }else{
      echo $xcrud->render('edit', '2');
    }
    ?>
  </div>
  <script type="text/javascript">
  jQuery(document).on("xcrudafterrequest",function(event,container){
    if(Xcrud.current_task == 'save')
    {
      Xcrud.show_message(container,'Operação realizado com sucesso.','success');
    }
  });
  </script>
