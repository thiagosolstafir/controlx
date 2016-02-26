<div class="row">
  <div class="col-md-12">
    <h1 class="page-head-line">PORTFOLIO</h1>
  </div>
</div>

<?php
$_SESSION['sessao_categoria'] = "portifolios";
$xcrud = Xcrud::get_instance();
$xcrud->table('portfolios');
$xcrud->unset_title();
$xcrud->unset_numbers();
$xcrud->unset_print();
$xcrud->unset_csv();
$xcrud->relation('id_categoria','portfolios_categoria','id_categoria','nome_categoria');
$xcrud->label('id_categoria','Categoria', 'texto');
$xcrud->modal('imagem');
$xcrud->columns('nome,id_categoria,url');
$xcrud->button($_SESSION['url_site'].'/uploads/sites/{url}/home','','','',array('target'=>'_blank'));
$xcrud->unset_title();
$xcrud->change_type('ativo','select','', array('0'=>'Não','1'=>'Sim'));
$xcrud->create_action('publish', 'publish_action');
$xcrud->create_action('unpublish', 'unpublish_action');

$xcrud->button('#', 'unpublished', 'icon-close glyphicon glyphicon-remove', 'xcrud-action',
array(
  'data-task' => 'action',
  'data-action' => 'publish',
  'data-primary' => '{id}'),
  array(
    'ativo',
    '!=',
    '1')
  );
  $xcrud->button('#', 'published', 'icon-checkmark glyphicon glyphicon-ok', 'xcrud-action', array(
    'data-task' => 'action',
    'data-action' => 'unpublish',
    'data-primary' => '{id}'), array(
      'ativo',
      '=',
      '1'));

      $xcrud->change_type('imagem', 'image', '', array(
        'path' => '../../uploads/',
        'thumbs' => array(array(
          'height' => 200,
          'width' => 320,
          'crop' => true,
          'marker' => '_th'))
        ));
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
