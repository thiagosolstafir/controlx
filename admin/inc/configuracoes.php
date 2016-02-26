<div class="row">
  <div class="col-md-12">
    <h1 class="page-head-line">CONFIGURAÇÕES DO SITE</h1>
  </div>
</div>

<?php

$xcrud = Xcrud::get_instance();
$xcrud->table('th_configuracoes');
$xcrud->unset_title();
$xcrud->unset_add();
$xcrud->unset_print();
$xcrud->unset_limitlist();
$xcrud->unset_view();
$xcrud->unset_remove();
$xcrud->unset_numbers();
$xcrud->unset_pagination();
$xcrud->unset_search();
$xcrud->unset_sortable();
$xcrud->unset_csv();
$xcrud->modal('logo');
$xcrud->columns('nome,email,logo');
$xcrud->validation_pattern('email','email');

$xcrud->column_class('logo','align-center');
$xcrud->change_type('logo', 'image', '',  array(
    'width' => 200,
    'height' => 200,
    'manual_crop' => true));
?>

        <div class="container">
          <?php echo $xcrud->render(); ?>
        </div>
        <script type="text/javascript">
        jQuery(document).on("xcrudafterrequest",function(event,container){
          if(Xcrud.current_task == 'save')
          {
            Xcrud.show_message(container,'Operação realizado com sucesso.','success');
          }
        });
        </script>
