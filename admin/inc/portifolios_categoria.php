<div class="row">
  <div class="col-md-12">
    <h1 class="page-head-line">CATEGORIA PORTIFLIOS</h1>
  </div>
</div>

<?php
$_SESSION['sessao_categoria'] = false;
$xcrud = Xcrud::get_instance();
$xcrud->table('portfolios_categoria');
$xcrud->unset_title();
$xcrud->unset_view();
$xcrud->unset_numbers();
$xcrud->unset_print();
$xcrud->unset_csv();
$xcrud->validation_required('nome_categoria');
?>


<div class="container">
  <?php  echo $xcrud->render(); ?>
</div>
<script type="text/javascript">
jQuery(document).on("xcrudafterrequest",function(event,container){
  if(Xcrud.current_task == 'save')
  {
    Xcrud.show_message(container,'Operação realizado com sucesso.','success');
  }
});
</script>
