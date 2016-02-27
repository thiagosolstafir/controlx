<script type="text/javascript">
jQuery(document).on("xcrudafterrequest",function(event,container){
  if(Xcrud.current_task == 'save')
  {
    Xcrud.show_message(container,'Operação realizado com sucesso.','success');
  }
});
</script>

<div class="row">
  <div class="col-md-12">
    <h1 class="page-head-line">Notícias</h1>
  </div>
</div>
<?php
$_SESSION['sessao_categoria'] = "noticias";
$xcrud = Xcrud::get_instance();
$xcrud->unset_title();
$xcrud->unset_numbers();
$xcrud->unset_print();
$xcrud->unset_csv();
$xcrud->table('noticias');
$xcrud->button($_SESSION['url_site'].'/noticias/{id_noticia}','','','',array('target'=>'_blank'));
$xcrud->fields('id_categoria,id_administrador,titulo,texto,foto_principal');
$xcrud->columns('id_categoria,id_administrador,titulo');
$xcrud->label('id_administrador', 'Administrador');
$xcrud->label('id_categoria', 'Categoria');
$xcrud->column_cut(30,'title,description'); // separate columns
$xcrud->relation('id_administrador','th_administradores','id_administrador','nome');
$xcrud->relation('id_categoria','noticias_categoria','id_categoria','nome_categoria');
$xcrud->change_type('foto_principal', 'image', '', array(
  'path' => '../../uploads/',
  'manual_crop' => true,
  'thumbs' => array(array(
    'height' => 120,
    'width' => 120,
    'crop' => false,
    'marker' => '_th'))
  ));

  $xcrud->create_action('publish', 'publish_action_noticia');
  $xcrud->create_action('unpublish', 'unpublish_action_noticia');

  $xcrud->button('#', 'unpublished', 'icon-close glyphicon glyphicon-remove', 'xcrud-action',
  array(
    'data-task' => 'action',
    'data-action' => 'publish',
    'data-table' => 'noticias',
    'data-primary' => '{id_noticia}'),
    array(
      'ativo',
      '!=',
      '1')
    );
    $xcrud->button('#', 'published', 'icon-checkmark glyphicon glyphicon-ok', 'xcrud-action', array(
      'data-task' => 'action',
      'data-action' => 'unpublish',
      'data-table' => 'noticias',
      'data-primary' => '{id_noticia}'), array(
        'ativo',
        '=',
        '1'));

?>

<div class="container">

  <?php echo $xcrud->render(); ?>


</div>
