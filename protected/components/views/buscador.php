<?php if($this->home): ?>
<div class="row"> 
<!--  <div class="span12 seleccionados">
    <p>
    <?php echo CHtml::link( 'Ver los Seleccionados para la Feria de las Flores 2013', array('/directorio/resultados'), array('class'=>'btn btn-large') ); ?>
    </p>    
  </div>
-->
<?php endif; ?>
<div <?php if($this->home) echo 'class="home"' ?> id="buscador">
  <?php $form = $this->beginWidget('CActiveForm', array(
      'action' => CHtml::normalizeUrl(Yii::app()->homeUrl.'directorio/busqueda'),
      'enableAjaxValidation'  =>true,
      'enableClientValidation'=>true,
      'id'                    =>'search-form',
      'method'                => 'get',          
  )); ?>
  <div class="row">
      <?php
      if($this->home):
      ?>
      <h2>Ingrese el nombre del artista que desee consultar</h2>
      <?php
        $placeholder = ""; 
      else:
        $placeholder = "Ingresa el nombre del artista que deseas consultar";
      endif;

      $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
          'name'         => 'artista',
          'model'        => new Perfiles, 
          'sourceUrl'    => CHtml::normalizeUrl(Yii::app()->homeUrl.'directorio/autocompletar'), 
          'options'      =>array(// additional javascript options for the autocomplete plugin
              'minLength'=> '2',
          ),
          'htmlOptions'  =>array(
              //'style'=>'height:20px;', 
			       "placeholder"=>$placeholder
          ),
      ));
      Yii::app()->clientScript->registerScript(
        'autocompleteselect', 
        '$( "#artista" ).on( 
          "autocompleteselect", 
          function( event, ui ) {
            //console.log(ui.item);
            window.location = "' . Yii::app()->homeUrl . '" + ui.item.slug;
            //$( "#search-form" ).submit();
          } 
        );', 
        CClientScript::POS_READY
      );
      
      ?>
      
       <?php echo CHtml::submitButton('Buscar', array("class"=>"btn btn-large")) ?>
  </div>
  <div class="row">
   
  </div>

  <?php $this->endWidget(); ?>
</div>