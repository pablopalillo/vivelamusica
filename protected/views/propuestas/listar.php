<div class="clearfix row-fluid">
    <div class="span12">
        <div id="admin-header" class="page-header">
            <h4>Listado de propuestas</h4>
        </div>      
    </div>
    <div class="span12">
    <?php
   $this->widget('zii.widgets.grid.CGridView', array(
         'dataProvider'=>$model->search(),
         'filter'=>$model,
         'columns'=>array(
              array(
                'name' => 'nombre',
                 'value' => 'CHtml::encode($data->nombre)',
              ),
              array(
                'name' => 'subgenero',
                'value' => 'CHtml::encode($data->subgenero)',
              ),          
              array(
                  'class' => 'CButtonColumn',
                  'template'=>'{detalle}', // botones a mostrar
                  'buttons'=>array(
                    'detalle' => array( //botón para la acción nueva
                      'label'=>'Ver detalles de la postulación', // titulo del enlace del botón nuevo
                      'imageUrl'=>Yii::app()->request->baseUrl.'/images/eye.png', //ruta icono para el botón
                      'url'=>'Yii::app()->createUrl("/propuestas/detalle?id=$data->perfiles_id" )', //url de la acción nueva
                    ),
                  ),
              ),         
         ),
         'pager'=>array('header'=>'Ir a la página','nextPageLabel'=>'Siguiente »','prevPageLabel'=>'« Anterior'),
         'summaryText'=>'',
         'itemsCssClass'=>'table table-bordered table-hover',
     ));

    ?>
    </div>
</div>
